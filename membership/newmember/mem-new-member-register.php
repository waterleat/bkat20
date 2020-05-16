<?php
// needs to be acessible while not logged in
$_SESSION['dojoregion']=0;
$_SESSION['dojokendo']=0;
$_SESSION['dojoiaido']=0;
$_SESSION['dojojodo']=0;
$_SESSION['dojofilter']='';
//if (!isset($_SESSION[BKANo])) header("Location: my_account.php");
//if ($_SESSION[BKANo]>0) header("Location: individual_member.php");

?>
  <!-- <script type="text/javascript">

  // function __fv1_LAYOUTFORM(form) {
  //  var args = {
  // "username":[["NOF_isRequired", [''], "this field is required ", "", ""]],
  // "email":[["NOF_isEmailAddress", [''], "this is not an email address", "", ""], ["NOF_isRequired", [''], "this field is required", "", ""]]
  //  };
  //  return NOF_validateForm(form, args, true, null,'Please correct the following errors:');
  // }

  </script> -->

<!-- <div class="flex flex-col"> -->
  <!-- <a href="../html/dojo_listing.php" class="nof-navButtonAnchor" onmouseover="F_loadRollover('NavigationButton1','',0);F_roll('NavigationButton1',1)" onmouseout="F_roll('NavigationButton1',0)"><img id="NavigationButton1" name="NavigationButton1" height="57" width="145" src="../assets/images/autogen/Dojo-Listing_Np_regular.png" onmouseover="F_loadRollover(this,'Dojo-Listing_NRp_regularOver.png',0)" border="0" alt="Dojo Listing" title="Dojo Listing">Dojo Listing</a>
  <a href="../html/register.php" class="nof-navButtonAnchor" onmouseover="F_loadRollover('NavigationButton3','',0);F_roll('NavigationButton3',1)" onmouseout="F_roll('NavigationButton3',0)"><img id="NavigationButton3" name="NavigationButton3" height="57" width="145" src="../assets/images/autogen/Existing-BKA---Member-Register_Np_regular.png" onmouseover="F_loadRollover(this,'Existing-BKA---Member-Register_NRp_regularOver.png',0)" border="0" alt="Existing BKA Member Register" title="Existing BKA Member Register">Existing BKA Member Register</a> -->
<!-- </div> -->

<h2 class=" my-0 py-2 text-center bg-gray-400">New Member Registration</h2>
<div id="LayoutLYR">
  <div class="flex flex-col md:flex-row">
    <div class="w-full lg:w-1/2 xl:w-2/5">
      <form id="newMemberRegister" class="py-4 lg:py-8 px-2 xs:px-8"  method="post" data-url="<?php echo admin_url('/admin-ajax.php');?>">
        <input type="hidden" id="regtype" name="regtype" value="New">
        <input type="hidden" name="action" value="register_new_member">
        <?php wp_nonce_field( 'new-member-register-nonce', 'nonce' ); ?>

        <div class="flex pt-2">
          <label id="FormsFieldLabel4" class="w-48 font-semibold" for="usernameInput">Create Username</label>
          <input type="text" id="usernameInput" name="username" class="p-1 border border-blue-500">
        </div>
        <div class="flex pt-2">
          <label id="FormsFieldLabel5" class="w-48 font-semibold" for="pass1Input">Password</label>
          <input type="password" id="pass1Input" name="password1" class="p-1 border border-blue-500">
        </div>
        <div class="flex pt-2">
          <label id="FormsFieldLabel6" class="w-48 font-semibold" for="pass2Input">Retype Password</label>
          <input type="password" id="pass2Input" name="password2" class="p-1 border border-blue-500">
        </div>
        <div class="flex pt-2">
          <label id="FormsFieldLabel3" class="w-48 font-semibold" for="emailInput">Email</label>
          <input type="email" id="emailInput" name="email"  class="p-1 border border-blue-500" aria-live="polite">
        </div>

        <div class="flex pt-2">
          <label id="FormsFieldLabel8" class="w-48 font-semibold" for="captcha">Validation Code</label>
          <input class="text p-1 border border-blue-500" id="captcha" name="captcha" maxlength="5" value="" size="5" >
          <?php
          // $properties = new NOF_CaptchaProperties();
          // $imageChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
          //
          // $properties->imageChars  	= nof_captcha_randomChars($imageChars, 5);
          // $properties->spaceInner  	= 0;
          // $properties->bgColor     	= "ffffff";
          // $properties->fgColors    	= Array("000000");
          // $properties->spaceTop    	= 10;
          // $properties->spaceBottom 	= 10;
          // $properties->spaceLeft   	= 0;
          // $properties->spaceRight  	= 0;
          // $properties->charFontDir 	= "charsmap/zebra";
          //
          // SetSessionVariable("nof_1260973072988_CaptchSettings", serialize($properties));
          ?>
          <!-- <img alt='' src='../scripts/NOF_CaptchaBMP.class.php?cid=1260973072988&amp;ft=<?php // echo time();?>'> -->
        </div>
        <p class="status" data-message="status"></p>
        <!-- <p id="errorMsg" class="error"></p> -->
        <div class="flex justify-around">
          <input type="button" id="FormsButton2" name="cancel" class="btn btn-blue cursor-pointer" value="Cancel">
          <input type="submit" id="newMemberRegisterSubmit" name="submit" class="btn btn-blue cursor-pointer" value="Register"  data-url="<?php echo get_page_link( get_page_by_title( 'new member' )->ID )?>">
        </div>
        <!-- <p class="text-center text-red-500">Existing members with a BKA membership number do not use this form, register<a href="<?php // echo get_page_link( get_page_by_title( 'bka register' )->ID )?>"> here</a> instead.</p> -->

        <p class="text-center">If you have any problems registering please contact the <a href="mailto:membership@britishkendoassociation.com">Membership Secretary</a>.</p>
      </form>
    </div>

    <div class="px-4 lg:px-0 w-full lg:w-1/2 xl:w-3/5">

      <h4 class="my-2 text-center">Joining the BKA on line</h4>

      <p class="">Welcome to the BKA.&nbsp; From here you can register and join.&nbsp; There are 3 stages to this.&nbsp; A description of membership types and fee structure can be found <a href="http://britishkendoassociation.com/join/">here</a></p>
      <p class="text-sm"><span class=" font-semibold">1 Register: </span>Complete the form on this page and register to use the on-line membership system. You will be sent an e-mail with a link to follow which will complete the registration.</p>
      <p class="text-sm"><span class=" font-semibold">2 Enter Your Details: </span>Once registered you will need to log in and enter your contact details and the type of membership you require.&nbsp; The BKA requires all members to be practicing members at BKA affiliated dojos.&nbsp; You will need to fill out the details of the dojo you are joining.&nbsp; The dojo is required to confirm your membership.&nbsp; There are 2 ways this can happen.</p>
      <ul class="px-8 list-disc text-sm">
        <li>You can join as a temporary member and an email is sent to the dojo to confirm membership.&nbsp; When the dojo confirms membership you can upgrade your membership to full membership.</li>
        <li>Your dojo can give you a preset password which you enter.&nbsp; Only if this password is entered can you select a membership type other than temporary.</li>
      </ul>
      <p class="text-sm"><span class=" font-semibold">3 Payment: </span>Upon completion of the details you will be directed to the secure payment pages where you can pay for your membership using credit &amp; debit cards.&nbsp;&nbsp; If you do not complete the transaction, your details will be kept on record for 14 days and then deleted.</span></p>
      <p class="text-sm">You will be sent confirmation of your membership by mail.</p>


    </div>
  </div>
</div>
