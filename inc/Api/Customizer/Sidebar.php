<?php
/**
 * Theme Customizer - Sidebar
 *
 * @package Bka2018
 */

namespace Bka2018\Api\Customizer;

use WP_Customize_Color_Control;
use Bka2018\Api\Customizer;

/**
 * Customizer class
 */
class Sidebar 
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register( $wp_customize ) 
	{
		$wp_customize->add_section( 'Bka2018_sidebar_section' , array(
			'title' => __( 'Sidebar', 'Bka2018' ),
			'description' => __( 'Customize the Sidebar' ),
			'priority' => 161
		) ); 

		$wp_customize->add_setting( 'Bka2018_sidebar_background_color' , array(
			'default' => '#ffffff',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'Bka2018_sidebar_background_color', array(
			'label' => __( 'Background Color', 'Bka2018' ),
			'section' => 'Bka2018_sidebar_section',
			'settings' => 'Bka2018_sidebar_background_color',
		) ) );

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'Bka2018_sidebar_background_color', array(
				'selector' => '#Bka2018-sidebar-control',
				'render_callback' => array( $this, 'output' ),
				'fallback_refresh' => true
			) );
		}
	}

	/**
	 * Generate inline CSS for customizer async reload
	 */
	public function output()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '#sidebar', 'background-color', 'Bka2018_sidebar_background_color' );
		echo '</style>';
	}
}