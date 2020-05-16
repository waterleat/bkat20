<?php
// $table_dojo = 'mem_dojo';
// $table_dojoaddress = 'mem_dojoaddress';
$table_dojo = 'dojo';
$table_dojoaddress = 'dojoaddress';

if (isset($_GET['dojo'])) {
  $dojono = $_GET['dojo'];

  if (!is_numeric($dojono)){
    echo "Invalid parameter dojo non numeric";
    die();
  }
  $dojono = intval($dojono);
}else{
  echo "Invalid parameter dojo not set";
  die();
}

$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );


if (isset($_GET['new'])) {
  $rec = intval($_GET['new']);
  $max = $rec-1;
  $newone = true;
  $return = intval($_GET['record']);
  $practice = '';
} else {
  $newone = false;
  if (isset($_GET['record'])) {
    $rec = intval($_GET['record']);
    if ($rec>1) {
      $prev = $rec-1;
    } else {
      $rec = 1;
      $prev = 1;
    }
  }else{
    $rec = 1;
    $prev = 1;
  }
  $practice = $mydb->get_results($mydb->prepare(
    "SELECT Dojono,Address1,Address2,Address3,Address4,Address5,Postcode,Practice,latitude,longitude,Priority
    FROM $table_dojoaddress WHERE Dojono = %d
    ORDER BY Priority ASC",
    $dojono
  ), 'ARRAY_A');
  // var_dump($practice);
  $max= count($practice);
  // var_dump($max);
}
// echo 'dojo<br />';
// var_dump($dojo);

// if (isset($_GET['record'])) {
//   // $_SESSION[rec] = $_GET['record'];
//   $rec = $_GET['record'];
//   if ($rec=='new') {
//     $rec = 1;
//     // $max = 1;
//     $newone = true;
//   }
// }else{
//   $rec=1;
// }

// if ($rec>1) {
//   $prev=$rec-1;
// } else {
//   $prev = 1;
// }

$next=$rec+1;

$dojoInfo = $mydb->get_row($mydb->prepare(
  "SELECT * FROM $table_dojo WHERE Dojono = %d",
  $dojono
), 'ARRAY_A');
// var_dump($dojoInfo);
// var_dump($practice[$rec-1]["Practice"]);

?>

<h2 class="mt-0 w-full py-3 text-center bg-gray-400"><?php echo (!$newone) ? 'Modify' : 'Add New' ?> Dojo Session Details</h2>
<div class="flex flex-col md:flex-row">
  <div class="w-full md:w-1/2 px-4">
    <!-- <form id="dojo-place" action="" method="post" data-url="<?php // echo admin_url('/admin-ajax.php');?>" > -->
    <!-- <form id="dojo-place" method="post" action="<?php // echo bloginfo('template_directory') ?>/scripts/readdojosessionform.php"> -->
    <form id="changeDojoSession"  method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
      <div >
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'dojo_sessions_nonce' )?>">

        <input type="hidden" id="record" name="record" value="<?php echo (!$newone) ? $rec : $max+1 ?>">
        <input type="hidden" id="dojono" name="dojono" value="<?php echo $dojono ?>">
        <input type="hidden" id="max" name="max" value="<?php echo $max ?>">
        <input type="hidden" id="place_Lat" class=" ml-3 border border-blue-500" name="latitude" value="<?php echo ((!$newone) && $practice) ? esc_html($practice[$rec-1]['latitude']) : 0; ?>" />
        <input type="hidden" id="place_Lng" class=" ml-3 border border-blue-500" name="longitude" value="<?php echo ((!$newone) && $practice) ? esc_html($practice[$rec-1]['longitude']) : 0; ?>" />
      </div>
      <div class="flex-col">
        <div class="flex">
          <div class="w-1/4"><h4 class="text-lg font-bold my-2 pl-3">Dojo <span class="hidden xs:inline text-base font-normal"><?php echo $dojono; ?></span></h4></div>
          <div class="w-3/4 ml-4">
            <p> <span class="text-lg font-bold"><?php echo esc_html($dojoInfo["DojoName"]); ?></span></p>
          </div>
        </div>
        <div class="flex">
          <div class="w-1/4"><h4 class="text-lg font-bold my-2 pl-3">Location</h4></div>
          <div class="w-3/4 ml-4"><p><?php echo (!$newone) ? $rec : $max+1 ?> of <?php echo ($max > 1) ? $max : '1' ?></p></div>
        </div>
        <?php if ($practice || $newone) { ?>
          <div class="flex">
            <div class="w-1/4">
              <h4 class="text-lg font-bold  pl-3">Address</h4>
              <input type="button" class="bg-red-light" name="geocode" value="GeoCode">
            </div>
            <div class="w-3/4 ml-4 flex flex-col">
              <input class="mt-3 p-1 border border-blue-500" type="text" value="<?php if (!$newone) echo esc_html($practice[$rec-1]["Address1"]); ?>"  id="address1" name="address1">
              <input class="mt-3 p-1 border border-blue-500" type="text" value="<?php if (!$newone) echo esc_html($practice[$rec-1]["Address2"]); ?>"  id="address2" name="address2">
              <input class="mt-3 p-1 border border-blue-500" type="text" value="<?php if (!$newone) echo esc_html($practice[$rec-1]["Address3"]); ?>"  id="address3" name="address3">
              <input class="mt-3 p-1 border border-blue-500" type="text" value="<?php if (!$newone) echo esc_html($practice[$rec-1]["Address4"]); ?>"  id="address4" name="address4">
              <input class="mt-3 p-1 border border-blue-500" type="text" value="<?php if (!$newone) echo esc_html($practice[$rec-1]["Address5"]); ?>"  id="address5" name="address5">
            </div>
          </div>
          <div class="flex">
            <div class="w-1/4"><h4 class="text-lg font-bold  pl-3">Postcode</h4></div>
            <div class="w-3/4 ml-4">
              <input id="postcode" class="mt-3 p-1 border border-blue-500" type="text" value="<?php if (!$newone) echo esc_html($practice[$rec-1]["Postcode"]); ?>"  id="postcode" name="postcode">
            </div>
          </div>
          <div class="flex">
            <div class="w-1/4">
              <h4 class="text-lg font-bold  pl-3">Practice Times</h4>
              <div class="label pl-3">
                <img id="Picture1" height="17" width="23" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/Query.GIF" border="0" alt="Max 80 characters." title="Max 80 characters.">
            </div>
            </div>
            <div class="w-3/4 ml-4 mt-3 justify-around">
              <textarea  rows="4"  id="practice" class="w-full p-1 border border-blue-500" name="practice"><?php if (!$newone) echo esc_html($practice[$rec-1]["Practice"]); ?></textarea>
            </div>
          </div>
        <?php } else { ?>
          <p class="my-8">This dojo does not have any places to practice at the moment</p>
        <?php } ?>
        <div class="flex my-4 text-center">
          <?php if (!$newone) { ?>
            <div class="w-32">
              <?php if ($rec>1) { ?>
                <input  type="button" id="dojoSessionPrev" name="prev" class="btn border-2 border-blue-500" data-url="<?php echo get_page_link( $post->ID ),'?dojo=', $dojono, '&record=', $prev ?>" value="Prev" >
              <?php } ?>
            </div>
            <div class="w-32">
              <?php if ($rec < $max) {?>
                <input  type="button" id="dojoSessionNext" name="next" class="btn border-2 border-blue-500" data-url="<?php echo get_page_link( $post->ID ),'?dojo=', $dojono, '&record=', $next ?>" value="Next" >
                <!-- <a id="dojoSessionNext" class="btn border-2 border-blue" href="<?php // get_page_link( $post->ID ).'?dojo='. $dojono. '&record='. $next ?>" >Next</a> -->
              <?php } ?>
            </div>
            <div class="w-32">
              <?php if ($rec>0 && $rec<=$max && $max>0) { ?>
                <input type="submit" id="dojoSessionDelete" name="delete" class="btn border-2 border-blue-500" value="Delete" data-url="<?php echo get_page_link( $post->ID ),'?dojo=', $dojono, '&record=', $prev ?>">
              <?php } ?>
            </div>
            <div class="w-32">
              <input type="button"  id="dojoSessionNew" name="new" class="btn border-2 border-blue-500" data-url="<?php echo get_page_link( $post->ID ),'?dojo=', $dojono, '&record=', $rec, '&new=', $max+1 ?>" value="New" >
            </div>
          <?php } ?>
        </div>
        <div class="text-center">
          <small class="field-msg js-form-submission">Submission in progress, Please wait &hellip;</small>
          <small class="field-msg success js-form-success">Details Successfully submitted, thank you!</small>
      		<small class="field-msg error js-form-error">Could not update database. Please try again.  If this error persists please contact the membership secretary</small>
        </div>
        <div class="flex justify-around py-4">

          <input type="button" id="dojoSessionClose" name="close" class="btn btn-blue" value="<?php echo (!$newone) ? 'Close' : 'Discard Changes' ?>" data-url="
          <?php if (!$newone){
            echo get_page_link( get_page_by_title( 'dojo details' )->ID ),'?dojo=', $dojono, '&record=1';
          } else {
            echo get_page_link( $post->ID ),'?dojo=', $dojono, '&record=', $return;
          } ?>">
          <input type="submit" id="dojoSessionSave" name="save" class="btn btn-blue" value="<?php echo (!$newone) ? 'Save' : 'Add New' ?>" data-url="<?php echo get_page_link( $post->ID ),'?dojo=', $dojono, '&record=', $rec ?>">

        </div>
      </div>
    </form>
  </div>

  <div class="w-full md:w-1/2">
    <div class="py-2 text-center">
      <small class="">
        Latitude/Longitude:
        <!-- <span id="place-latllng-text" data-eo-lat="0" data-eo-lng="0" contenteditable="true">0, 0</span> -->
        <span id="place-latllng-text"> 0, 0</span>
      </small>
    </div>

    <div id="map"class="h-128"></div>

  </div>
</div>
