<?php
/**
 * Callbacks for Settings API
 *
 * @package Bka2018
 */

namespace Bka2018\Api\Callbacks;

/**
 * Settings API Callbacks Class
 */
class SettingsCallback
{
	public function admin_index()
	{
		return require_once( get_template_directory() . '/views/admin/index.php' );
	}

	public function admin_faq()
	{
		echo '<div class="wrap"><h1 class="text-4xl font-bold">FAQ Page</h1></div>';
	}

	public function Bka2018_options_group( $input )
	{
		return $input;
	}

	public function Bka2018_admin_index()
	{
		echo 'Customize this Theme Settings section and add description and instructions';
	}

	public function first_name()
	{
		$first_name = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="'.$first_name.'" placeholder="First Name" />';
	}
}
