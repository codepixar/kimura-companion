<?php
/*
 * Plugin Name:       Kimura Companion
 * Plugin URI:        https://spondonit.com/kimura-companion/
 * Description:       Kimura Companion is a companion plugin for Kimura theme.
 * Version:           1.0.
 * Author:            Spondonit
 * Author URI:        https://spondonit.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kimura-companion
 * Domain Path:       /languages
 */


if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( !defined( 'KIMURA_COMPANION_VERSION' ) ){
    define( 'KIMURA_COMPANION_VERSION', '1.1' );
}

// Define dir path constant
if( !defined( 'KIMURA_COMPANION_DIR_PATH' ) ){
    define( 'KIMURA_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( !defined( 'KIMURA_COMPANION_INC_DIR_PATH' ) ){
    define( 'KIMURA_COMPANION_INC_DIR_PATH', KIMURA_COMPANION_DIR_PATH.'inc/' );
}

// Define sidebar widgets dir path constant
if( !defined( 'KIMURA_COMPANION_SW_DIR_PATH' ) ){
    define( 'KIMURA_COMPANION_SW_DIR_PATH', KIMURA_COMPANION_INC_DIR_PATH.'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( !defined( 'KIMURA_COMPANION_EW_DIR_PATH' ) ){
    define( 'KIMURA_COMPANION_EW_DIR_PATH', KIMURA_COMPANION_INC_DIR_PATH.'elementor-widgets/' );
}

// Define demo data dir path constant
if( !defined( 'KIMURA_COMPANION_DEMO_DIR_PATH' ) ){
    define( 'KIMURA_COMPANION_DEMO_DIR_PATH', KIMURA_COMPANION_INC_DIR_PATH.'demo-data/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();



if( ( 'Kimura' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Kimura' == $is_parent->get( 'Name' ) ) ){
    require_once KIMURA_COMPANION_DIR_PATH . 'kimura-init.php';
}else{

    add_action( 'admin_notices', 'kimura_companion_admin_notice', 99 );
    function kimura_companion_admin_notice() {
        $url = 'https://spondonit.com/kimura-theme/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Kimura Companion</strong> plugin you have to also install the %1$sKimura Theme%2$s', 'kimura-companion' ), '<a href="'.esc_url( $url ).'" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}

?>