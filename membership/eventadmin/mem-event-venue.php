<?php
/**
 * Detect plugin. For use on Front End only.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// check for plugin using plugin name
if (! is_plugin_active( 'bkap20/bkap20-plugin.php' ) ) {
    //plugin is not activated
    wp_redirect( esc_url( home_url( '/' ) ), 307 );
}
// session_start();
// include("functions.php");

// $num = check_login();
// if ($num != 1 || check_admin('j')!=1){
//   //not logged in
//   header("Location: my_account.php");
//   exit;
// }
$table_event = 'event';
$table_ticket = 'ticket';

$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );
// need to access venue table, check eo_website and plugin
$bookeventsallQuery = "SELECT eventid,e.date,title,eventtype,bu,grading,gradingclose,gradingto,DATEDIFF(gradingclose,CURDATE()) AS GRADINGOPEN,DATE_FORMAT(gradingclose,'%d-%m-%Y') AS GDATE,DATE_FORMAT(e.date,'%d-%m-%Y') AS EDATE,display,DATEDIFF(date,CURDATE()) AS FUTURE FROM $table_event e ORDER BY e.date DESC";
$bookeventsall = $mydb->get_results($bookeventsallQuery, ARRAY_A);


?>



<h2 class="my-0 py-3 bg-gray-400 text-center">Event Venue members distribution</h2>

<div class="mb-2">
  <div class="mx-4 sm:mx-8 mt-4 py-6 bg-yellow-200">
    <!-- <form id="eventSelect" action="../scripts/admineditevent.php" method="post"> -->
    <form id="eventVenueSelect" method="post" class="px-4" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
      <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'event_venue_select_nonce' )?>">
      <div class="flex content-center flex-wrap">
        <h3 class="self-center my-0 w-32 ">Select Venue</h3>
        <!-- <div class="content-center">
        </div> -->
        <!-- <div class="content-center">
        </div> -->
        <select id="VenueSelection" name="VenueSelection" class="self-center p-1 mr-3 " >
          <?php
          $venues = eo_get_venues();
          if( $venues ){
            echo "<option value=0>Select</option>";
            foreach ($venues as $venue) {
              $venue_id =  $venue->term_id;
              echo '<option value="', $venue_id, '"';
              echo  ">" . esc_html($venue->name);
              echo "</option>";
            }
          }
          ?>
        </select>
        <div class="flex flex-col text-right pr-4">
          <label for="kendo">kendo <input type="checkbox" id="kendo" name="kendo" value="1"></label>
          <label for="iaido">iaido <input type="checkbox" id="iaido" name="iaido" value="1"></label>
          <label for="jodo">jodo <input type="checkbox" id="jodo" name="jodo" value="1"></label>
          <!-- <label for="all">all <input type="checkbox" id="all" name="all" value="1"></label> -->
        </div>

        <div class="flex flex-col text-right pr-4">
          <label for="male">Adults only<input type="radio" id="adult" name="ages" value="adult" checked></label>
          <label for="female">Adults + Juniors<input type="radio" id="all" name="ages" value="all"></label>
          <label for="other">Juniors only<input type="radio" id="junior" name="ages" value="junior"></label>
        </div>

        <input type="submit" id="eventVenueSelectLoad" name="VenueSelectionLoad" value="Load" class="self-center btn btn-blue ">

        <!-- <input type="hidden" name="venuelat" value="<?php // esc_html(eo_get_venue_lat($venue_id)) ?>">
        <input type="hidden" name="venuelng" value="<?php // esc_html(eo_get_venue_lng($venue_id)) ?>"> -->
        <!-- <input type="button" id="FormsButton8" name="FormsButton8" value="Create/Edit Event" class="btn btn-blue ml-4"> -->
      </div>

      <div class="text-center py-4">
        <small class="field-msg error js-venue-error">You have not selected a venue</small>
        <small class="field-msg error js-bu-error">You have not selected a bu filter</small>
        <small class="field-msg error js-location-error">Missing a venue location</small>
      </div>
    </form>

    <div class="p-4">
      <table id="memberDistribTbl" class="w-full md:w-1/2 border-2 border-gray-500 table-auto">
        <thead>
          <tr>
            <th>Bin floor</th>
            <th>Count</th>
            <th>Cumm.</th>
            <th>bar</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

    </div>

    <div class="bg-green-300">
      <?php
        // $venues = eo_get_venues();
        // if( $venues ){
        //   echo '<ul>';
        //   foreach($venues as $venue):
        //     // var_dump($venue);
        //     // die;
        //        $venue_id = (int) $venue->term_id;
        //             printf('<li> %s', esc_html($venue->name) . " " . esc_html(eo_get_venue_lat($venue_id)) . " , " . esc_html(eo_get_venue_lng($venue_id)), '</li>' );
        //   endforeach;
        //   echo '</ul>';
        // }
      ?>
    </div>




  </div>
</div>
