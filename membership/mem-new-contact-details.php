<?php
  // $table_member = 'mem_member';
  $table_member = 'member';

  // check logged in
  $bkano = intval(esc_attr( get_the_author_meta( 'bkano', get_current_user_id() ) ));
  // var_dump($bkano);

  $mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

  $memberInfo =$mydb->get_row($mydb->prepare(
    "SELECT * FROM $table_member
    WHERE BKAno = %d",
    $bkano
  ),'ARRAY_A');
?>


<div class="text-center">
  <h3 class="m-0 py-3">Please Confirm Details</h3>
  <p>It is necessary that we keep accurate details of our members and are able to contact you. Please ensure the details below are correct.</p>
</div>

<div class="p-2">
  <form class="ml-6" action="#" method="POST">
    <div class="flex px-4 mb-2">
      <div class="w-1/4">
        <label for="address1">Address</label>
      </div>
      <div class="w-3/4 xs:w-3/5 sm:w-1/2 flex flex-col">
          <input id="address1" class="mb-2 p-1 border border-blue-500" type="text" name="Address1" value="<?php echo esc_html($memberInfo['Address1'])?>">
          <input class="mb-2 p-1 border border-blue-500" type="text" name="Address2" value="<?php echo esc_html($memberInfo['Address2'])?>">
          <input class="mb-2 p-1 border border-blue-500" type="text" name="Address3" value="<?php echo esc_html($memberInfo['Address3'])?>">
          <input class="mb-2 p-1 border border-blue-500" type="text" name="Address4" value="<?php echo esc_html($memberInfo['Address4'])?>">
      </div>
    </div>
    <div class="flex px-4 mb-2">
      <label class="w-1/4" for="country">Country</label>
      <input id="country" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" type="text" name="country" value="<?php echo esc_html($memberInfo['Address5'])?>">
    </div>
    <div class="flex px-4 mb-2">
      <label class="w-1/4" for="postcode">Postcode</label>
      <input id="postcode" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" type="text" name="postcode" value="<?php echo esc_html($memberInfo['Postcode'])?>">
    </div>
    <div class="flex px-4">
      <div class="w-1/4  ">
        <label class="" for="email">email</label>
        <img id="Picture10" height="17" width="23" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/Query.GIF" border="0" alt="The BKA will use this email address to contact you about your membership, on line transactions and other BKA related communications.  You can elect to not receive these other communications below.  The BKA will never provide your email to 3rd party s or use for non-BKA related business" title="The BKA will use this email address to contact you about your membership, on line transactions and other BKA related communications.  You can elect to not receive these other communications below.  The BKA will never provide your email to 3rd party s or use for non-BKA related business">
      </div>
      <input id="email" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" type="text" name="email" value="<?php echo esc_html($memberInfo['email'])?>">
    </div>
    <div class="flex px-4">
      <label class="w-1/4" for="emailUse">email use</label>
      <select id="emailUse" class="w-3/4 xs:w-3/5 sm:w-1/2 p-1 mb-2 mr-1 border border-blue-500" name="emailUse" >
        <option value="0" <?php  echo selected(esc_html($memberInfo['allowemail']), 0 ) ?> >Renewal & Payment contact only</option>
        <option value="1" <?php  echo selected(esc_html($memberInfo['allowemail']), 1 ) ?> >All BKA related communication</option>
      </select>
    </div>
    <div class="flex px-4">
      <label class="w-1/4" for="phone">Phone</label>
      <input id="phone" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" type="text" name="phone" value="<?php echo esc_html($memberInfo['phone'])?>">
    </div>
    <div class="flex px-4">
      <label class="w-1/4" for="renewalMethodCombo">Renewal Mode</label>
      <select id="renewalMethodCombo" class="w-3/4 xs:w-3/5 sm:w-1/2 p-1 mb-2 mr-1 border border-blue-500" name="renewalMethod" >
        <option value="electronic" <?php echo selected(esc_html($memberInfo['RenewalMethod']), 'electronic' ) ?> >electronic</option>
        <option value="paper" <?php  echo selected(esc_html($memberInfo['RenewalMethod']), 'paper' ) ?> >paper</option>
      </select>
    </div>

    <div class="ml-4 flex px-4 justify-center">
      <div class="flex flex-col xs:flex-row">
        <p class="mr-2 pb-1 xs:pb-2">I have read and accept the </p>
        <a class="pb-2 pt-1 xs:pt-2" target="_self" href="<?php site_url('/wp-content/uploads/2018/06/BKA-Privacy-Notice.pdf') ?>">BKA's Data Privacy Policy</a>
      </div>
      <input type="checkbox" class="my-auto ml-2  " id="FormsCheckbox1" name="formsCheckbox1">
    </div>

    <div class="flex justify-around py-4">
      <input type="button" id="contactDetailsCancel" class="btn btn-blue" name="cancel" value="Cancel" onclick="history.go(-1)" >
      <input type="submit" id="contactDetailsSave" class="btn btn-blue" name="save" value="Submit" >
    </div>

  </form>
</div>
