<?php


//header("Location: my_account.php");
$_SESSION['dojoregion']=0;
$_SESSION['dojokendo']=0;
$_SESSION['dojoiaido']=0;
$_SESSION['dojojodo']=0;
$_SESSION['dojofilter']='';
//if (!isset($_SESSION[BKANo])) header("Location: my_account.php");
// if ($_SESSION['BKANo']>0) header("Location: individual_member.php");

?>



<h2 class=" my-0 py-2 text-center bg-gray-400">Guest Member Registration</h2>
<div id="LayoutLYR">
  <div class="flex flex-col md:flex-row">
    <div class="w-full lg:w-1/2 xl:w-2/5">

      <script type="text/javascript">
      <!--
      // function __fv1_LAYOUTFORM(form) {
      //  var args = {
      // "username":[["NOF_isRequired", [''], "this field is required ", "", ""]],
      // "email":[["NOF_isEmailAddress", [''], "this is not an email address", "", ""], ["NOF_isRequired", [''], "this field is required", "", ""]]
      //  };
      //  return NOF_validateForm(form, args, true, null,'Please correct the following errors:');
      // }
      //-->
      </script>
      <form id="newMemberRegister" class="py-4 lg:py-8 px-2 xs:px-8"  method="post" data-url="<?php echo admin_url('/admin-ajax.php');?>">
       <input type="hidden" id="regtype" name="regtype" value="Guest">
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

       </div>
       <p class="status" data-message="status"></p>
       <!-- <p id="errorMsg" class="error"></p> -->
       <div class="flex justify-around">
         <input type="button" id="FormsButton2" name="cancel" class="btn btn-blue cursor-pointer" value="Cancel">
         <input type="submit" id="newMemberRegisterSubmit" name="submit" class="btn btn-blue cursor-pointer" value="Register"  data-url="<?php echo get_page_link( get_page_by_title( 'new member' )->ID )?>">
       </div>

       <!-- <p style="text-align: center;"><span style="color: rgb(255,0,0);">Existing members with a BKA membership number do not use this form, regisiter<a href="../html/register.php"> here</a> instead.</span></p> -->
       <p class="text-center text-redFF">UK nationals &amp; residents must be members of the BKA and cannot book through here.&nbsp; Join <a href="../html/new_member_register.php">here</a></span></p>

       <p class="text-center">If you have any problems registering please contact the <a href="mailto:membership@britishkendoassociation.com">Membership Secretary</a>.</p>
     </form>
    </div>

    <div class="px-4 lg:px-0 w-full lg:w-1/2 xl:w-3/5">

      <h4 class="my-2 text-center">BKA on line Registration</h4>
      <p class="">Welcome to the BKA.&nbsp; From here you can register&nbsp; to enable you to be able to book BKA events on-line.&nbsp; There are 3 stages to this.</p>
      <p class="text-sm"><span class=" font-semibold">1 Register: </span>Complete the form on this page and register to use the on-line&nbsp; system. You will be sent an e-mail with a link to follow which will complete the registration.</p>
      <p class="text-sm"><span class=" font-semibold">2 Enter Your Details: </span>Once registered you will need to log in and enter your contact details and details of your National Membership.&nbsp; BKA events are open to practicing members from all EKF/FIK affiliated organisations.</p>
      <p class="text-sm">We request details of your current grades for information only.&nbsp; These are not validated and, if applying for a grading, you will need to send both a copy of your most recent menjo and a letter of authority from your National Organisation to support your application.&nbsp; These should be sent to the BKA Kendo / Iaido / Jodo grading officer.</p>
      <p class="text-sm"><span class=" font-semibold">3 Payment: </span>Upon completion of the details you will be directed to the booking page and secure payment pages where you can pay for event bookings using credit &amp; debit cards.&nbsp; If you do not complete the transaction, your details will be kept on record for 14 days and then deleted.</p>



    </div>
  </div>
</div>
