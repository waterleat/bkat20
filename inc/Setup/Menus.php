<?php

namespace Bka2020\Setup;

/**
 * Menus
 */
class Menus
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action( 'after_setup_theme', array( $this, 'menus' ) );
    }

    public function menus()
    {
        /*
            Register all your menus here
        */
        register_nav_menus(array(
            'primary' => esc_html__( 'Primary', 'Bka2020' ),
            'primary2' => esc_html__( 'Primary2', 'Bka2020' ),
            // 'login' => esc_html__( 'Login', 'Bka2020' ),
            'kendo1' => esc_html__( 'Kendo1', 'Bka2020' ),
            'kendo2' => esc_html__( 'Kendo2', 'Bka2020' ),
            'iaido1' => esc_html__( 'Iaido1', 'Bka2020' ),
            'iaido2' => esc_html__( 'Iaido2', 'Bka2020' ),
            'jodo1' => esc_html__( 'Jodo1', 'Bka2020' ),
            'jodo2' => esc_html__( 'Jodo2', 'Bka2020' ),
            'cs0' => esc_html__( 'Central Services 0', 'Bka2020' ),
            'cs1' => esc_html__( 'Central Services 1', 'Bka2020' ),
            'cs2' => esc_html__( 'Central Services 2', 'Bka2020' ),
            'buAdmin' => esc_html__( 'Bu Officers', 'Bka2020' ),
            'membershipAdmin' => esc_html__( 'Membership Officers', 'Bka2020' ),
        ));
    }
}
