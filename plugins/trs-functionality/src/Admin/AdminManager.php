<?php
namespace TRS_Functionality\Admin;

/**
 * Handles general administrative tasks and customizations.
 */
class AdminManager {

    /**
     * The plugin basename, used for update checks.
     * @var string
     */
    protected $plugin_basename;

    /**
     * Constructor.
     *
     * @param string $plugin_basename The basename of the main plugin file.
     */
    public function __construct( $plugin_basename ) {
        $this->plugin_basename = $plugin_basename;
    }

    /**
     * Prevents the plugin from showing up in WordPress.org update checks.
     *
     * @param array $r Request arguments.
     * @param string $url Request URL.
     * @return array Modified request arguments.
     */
    public function hide_plugin_from_updates( $r, $url ) {
        if ( 0 !== strpos( $url, 'http://api.wordpress.org/plugins/update-check' ) ) {
            return $r; // Not a plugin update request. Bail immediately.
        }

        $plugins = unserialize( $r['body']['plugins'] );
        unset( $plugins->plugins[ $this->plugin_basename ] );
        unset( $plugins->active[ array_search( $this->plugin_basename, $plugins->active ) ] );
        $r['body']['plugins'] = serialize( $plugins );
        return $r;
    }

    /**
     * Hides core update notices for all users except Administrators.
     */
    public function hide_update_notice_nonadmins() {
        if ( ! current_user_can( 'update_core' ) ) {
            remove_action( 'admin_notices', 'update_nag', 3 );
        }
    }

    /**
     * Removes unused menu items from the admin dashboard.
     */
    public function remove_menus() {
        global $menu;
        $restricted = array(
            // Example:
            // __('Dashboard'), __('Posts'), __('Media'), __('Pages'), __('Appearance'),
            // __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins')
        );
        end( $menu );
        while ( prev( $menu ) ) {
            $value = explode( ' ', $menu[ key( $menu ) ][0] );
            if ( in_array( $value[0] != null ? $value[0] : '', $restricted, true ) ) {
                unset( $menu[ key( $menu ) ] );
            }
        }
    }

    /**
     * Removes unnecessary sub-menu links.
     */
    public function remove_submenus() {
        remove_submenu_page( 'themes.php', 'theme-editor.php' );
        remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
    }

    /**
     * Changes post update messages to be post type-specific.
     *
     * @param array $messages Existing messages.
     * @return array Modified messages.
     */
    public function set_updated_messages( $messages ) {
        global $post, $post_ID;

        $post_type = get_post_type( $post_ID );
        $obj = get_post_type_object( $post_type );

        if ( ! $obj || ! isset( $obj->labels->singular_name ) ) {
            return $messages; // Return original messages if post type object or singular name is missing
        }

        $singular = $obj->labels->singular_name;

        $messages[$post_type] = array(
            0 => '', // Unused. Messages start at index 1.
            1 => sprintf( __( '%s updated. <a href="%s">View %s</a>', TRS_FUNCTIONALITY_TEXT_DOMAIN ), $singular, esc_url( get_permalink( $post_ID ) ), strtolower( $singular ) ),
            2 => __( 'Custom field updated.', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            3 => __( 'Custom field deleted.', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            4 => sprintf( __( '%s updated.', TRS_FUNCTIONALITY_TEXT_DOMAIN ), $singular ),
            5 => isset( $_GET['revision'] ) ? sprintf( __( '%s restored to revision from %s', TRS_FUNCTIONALITY_TEXT_DOMAIN ), $singular, wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6 => sprintf( __( '%s published. <a href="%s">View %s</a>', TRS_FUNCTIONALITY_TEXT_DOMAIN ), $singular, esc_url( get_permalink( $post_ID ) ), strtolower( $singular ) ),
            7 => sprintf( __( '%s saved.', TRS_FUNCTIONALITY_TEXT_DOMAIN ), $singular ),
            8 => sprintf( __( '%s submitted. <a target="_blank" href="%s">Preview %s</a>', TRS_FUNCTIONALITY_TEXT_DOMAIN ), $singular, esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ), strtolower( $singular ) ),
            9 => sprintf( __( '%s scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview %3$s</a>', TRS_FUNCTIONALITY_TEXT_DOMAIN ), $singular, date_i18n( __( 'M j, Y @ G:i', TRS_FUNCTIONALITY_TEXT_DOMAIN ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ), strtolower( $singular ) ),
            10 => sprintf( __( '%s draft updated. <a target="_blank" href="%s">Preview %s</a>', TRS_FUNCTIONALITY_TEXT_DOMAIN ), $singular, esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ), strtolower( $singular ) ),
        );

        return $messages;
    }
}