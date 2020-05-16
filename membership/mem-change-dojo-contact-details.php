<?php
// $table_dojo = 'mem_dojo';
$table_dojo = 'dojo';

  if (isset($_GET['dojo'])) {
    $dojono = $_GET['dojo'];

    if (!is_numeric($dojono)){
    //   $_SESSION['dojono'] = $dojono;
    // }else{
      echo "Invalid parameter dojo non numeric";
      die();
    }
    $dojono = intval($dojono);
  } else {
    echo "Invalid parameter dojo not set";
    die();
  }

  $mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

  $dojoInfo = $mydb->get_row($mydb->prepare(
    "SELECT * FROM $table_dojo WHERE Dojono = %d",
    $dojono
  ), 'ARRAY_A');
  // var_dump($dojoInfo);

?>
<h2 class="mt-0 py-3 bg-gray-400 text-center">Change Dojo Contact Details</h2>
<form id ="changeDojoContact" class="p-2 xspl-6 md:pl-8" method="POST" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
  <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'dojo_contacts_nonce' )?>">
  <input type="hidden" id="dojono" name="dojono" value="<?php echo $dojono ?>">
  <div class="">
    <div class="flex px-4 mb-2">
      <label class="w-1/4"for="">Contact</label>
      <input type="text" name="contact" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" value="<?php echo $dojoInfo['ContactName'] ?>">
    </div>
    <div class="flex px-4 mb-2">
      <label class="w-1/4"for="">email</label>
      <input type="email" name="email" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" value="<?php echo $dojoInfo['ContactEmail'] ?>">
    </div>
    <div class="flex px-4 mb-2">
      <label class="w-1/4"for="">Phone</label>
      <input type="text" name="phone" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" value="<?php echo $dojoInfo['ContactPhone'] ?>">
    </div>
    <div class="flex px-4 mb-2">
      <label class="w-1/4"for="">Web</label>
      <input type="url" name="website" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" value="<?php echo esc_url($dojoInfo['Contactweb']) ?>">
    </div>
    <div class="flex px-4 mb-2">
      <label class="w-1/4"for="">Location</label>
      <input type="text" name="location" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" value="<?php echo $dojoInfo['Place']; ?>">
    </div>
    <div class="flex px-4 mb-2">
      <label class="w-1/4"for="">Notes</label>
      <textarea name="notes" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500"><?php echo $dojoInfo['Notes'] ?></textarea>
    </div>
    <div class="text-center">
      <small class="field-msg error js-contact-error">Missing a Contact name</small>
      <small class="field-msg error js-method-error">Missing a Contact phone number or valid email address</small>
      <small class="field-msg js-form-submission">Submission in progress, Please wait &hellip;</small>
      <small class="field-msg success js-form-success">Details Successfully submitted, thank you!</small>
      <small class="field-msg error js-form-error">Could not update database. Please try again.  If this error persists please contact the membership secretary</small>
    </div>

    <div class="flex justify-around py-4">
      <input type="button" id="dojoContactCancel" class="btn btn-blue" value="Cancel" onclick="history.go(-1)" >
      <input type="submit" id="dojoContactSave" class="btn btn-blue" value="Submit" data-url="<?php echo get_page_link(get_page_by_title( 'dojo details' )->ID ),'?dojo=', $dojono, '&record=1' ?>">
    </div>
  </div>
</form>
