<?php
namespace Bka2020\Custom;

/**
 * Custom
 * use it to write your custom functions.
 */
class Review
{
	public function register()
	{


		add_action( 'eventorganiser_created_event', array( $this, 'Bka2020_link_review' ), 10, 1 );
    // add_action( 'wp_ajax_Bka2020_load_more', array( $this, 'Bka2020_load_more' ) );
	}

  public function Bka2020_link_review($post_id)
	{

		// // first console log that we have created event
		// // add_post_meta( $post_id, 'review', $post_id, true );
		// // eventorganiser_update_event($post_id, $event_data, $post_data);
		//
		// // First we need to check if the current user is authorised to do this action.
		// if ( 'page' == $_POST['post_type'] ) {
		//  if ( ! current_user_can( 'edit_page', $post_id ) )
		// 		 return;
		// } else {
		//  if ( ! current_user_can( 'edit_post', $post_id ) )
		// 		 return;
		// }
		//
		// $mydata = 'something'; // Do something with $mydata
		//
		// update_post_meta( $post_id, 'review', $mydata );
	}
}
