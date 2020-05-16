<?php
//header("Location: my_account.php");
$_SESSION['dojoregion']=0;
$_SESSION['dojokendo']=0;
$_SESSION['dojoiaido']=0;
$_SESSION['dojojodo']=0;
$_SESSION['dojofilter']='';

?>
<p>
"Forename":[["NOF_isRequired", [''], "Forename field cannot be empty", "DefaultErrorLabelStyle", ""], ["NOF_isLengthInRange", ['1', '30'], "Maximum 30 characters please", "DefaultErrorLabelStyle", ""]],
"DoB":[["NOF_isRequired", [''], "Date of birth is required.", "DefaultErrorLabelStyle", ""], ["NOF_isValidDate", ['DD/MM/YYYY'], "Please use DD/MM/YYYY format", "DefaultErrorLabelStyle", ""]],
"Surname":[["NOF_isRequired", [''], "Family name field cannot be empty", "DefaultErrorLabelStyle", ""], ["NOF_isLengthInRange", ['1', '30'], "Maximum 30 characters please", "DefaultErrorLabelStyle", ""]],
"Address1":[["NOF_isRequired", [''], "Address is required", "DefaultErrorLabelStyle", ""], ["NOF_isLengthInRange", ['1', '30'], "Maximum 30 characters in any address line allowed", "DefaultErrorLabelStyle", ""]],
"Address2":[["NOF_isLengthInRange", ['0', '30'], "Maximum 30 characters in any address line", "", "DefaultErrorFieldStyle"]],
"Address3":[["NOF_isLengthInRange", ['0', '30'], "Maximum 30 characters in any address line", "", "DefaultErrorFieldStyle"]],
"Address4":[["NOF_isLengthInRange", ['0', '30'], "Maximum 30 characters in any address line", "", "DefaultErrorFieldStyle"]],
"Address5":[["NOF_isLengthInRange", ['0', '30'], "Maximum 30 characters in any address line", "", "DefaultErrorFieldStyle"]],
"Postcode":[["NOF_isRequired", [''], "Post Code is required", "", ""]],
"NatNo":[["NOF_isRequired", [''], "National Federation Membership number is required", "DefaultErrorLabelStyle", ""]],
"email":[["NOF_isEmailAddress", [''], "this is not an email address", "DefaultErrorLabelStyle", ""], ["NOF_isRequired", [''], "A valid email address is required", "DefaultErrorLabelStyle", ""]],
"Phone":[["NOF_isLengthInRange", ['0', '30'], "Maximum 30 characters in any address line", "", "DefaultErrorFieldStyle"]],
"TownOB":[["NOF_isRequired", [''], "Town of Birth is required", "DefaultErrorLabelStyle", ""], ["NOF_isLengthInRange", ['1', '30'], "Maximum 30 characters in any address line allowed", "DefaultErrorLabelStyle", ""]],
"CountryOB":[["NOF_isRequired", [''], "Country of Birth is required", "DefaultErrorLabelStyle", ""], ["NOF_isLengthInRange", ['1', '30'], "Maximum 30 characters in any address line allowed", "DefaultErrorLabelStyle", ""]],
"Nationality":[["NOF_isRequired", [''], "Nationality is required", "DefaultErrorLabelStyle", ""], ["NOF_isLengthInRange", ['1', '30'], "Maximum 30 characters in any address line allowed", "DefaultErrorLabelStyle", ""]]

"username":[["NOF_isRequired", [''], "this field is required ", "", ""]],
"email":[["NOF_isEmailAddress", [''], "this is not an email address", "", ""], ["NOF_isRequired", [''], "this field is required", "", ""]]
</p>

<h2 class="text-2xl font-bold ">Guest Member Registration</h2>
<form name="LAYOUTFORM" enctype="application/x-www-form-urlencoded" action="../scripts/newmemberregistration.php" method="post" onSubmit="return __fv1_LAYOUTFORM(this)">
  <input type="hidden" id="regtype" name="regtype" value="Guest">

Create Username
<input type="text" id="FormsEditField4" name="username" size="19" maxlength="19" onChange="__fv1_LAYOUTFORM(this.form)" required style="white-space: pre; width: 148px;">
Password
<input type="password" id="FormsEditField5" name="password1" style="white-space: pre; width: 132px;"></td>
Retype Password
<input type="password" id="FormsEditField6" name="password2" style="white-space: pre; width: 132px;">

Email
<input type="email" id="FormsEditField3" name="email" onChange="__fv1_LAYOUTFORM(this.form)" required style="white-space: pre; width: 196px;">

Copy the Validation Code
<input type="hidden" name="nof_componentId" value="1260973072988">
<input class='text' id='captcha' name='captcha' maxlength='5' value='' size='5'>


<input type="button" id="FormsButton2" name="Cancel" class="label" value="Cancel" style="height: 24px; width: 72px;">
<input type="submit" id="FormsButton1" name="Submit" class="label" value="Submit" style="height: 24px; width: 70px;">

<p style="text-align: center;"><span style="color: rgb(255,0,0);">Existing members with a BKA membership number do not use this form, regisiter<a href="../html/register.php"> here</a> instead.</span></p>
<p style="text-align: center; margin-bottom: 0px;"><span style="color: rgb(255,0,0);">UK nationals &amp; residents must be members of the BKA and cannot book through here.&nbsp; Join <a href="../html/new_member_register.php">here</a></span></p>


<p style="text-align: center; margin-bottom: 0px;">If you have any problems registering please contact the <a href="mailto:membership@britishkendoassociation.com">Membership Secretary</a>.&nbsp; </p>

<p><span style="font-size: 12px;">Welcome to the BKA.&nbsp; From here you can register&nbsp; to enable you to be able to book BKA events on-line.&nbsp; There are 3 stages to this. </span></p>
<p><span style="font-size: 12px;"><b><span style="font-weight: bold;">1 Register </span></b>Complete the form on this page and register to use the on-line&nbsp; system. You will be sent an e-mail with a link to follow which will complete the registration.</span></p>
<p><span style="font-size: 12px;"><b><span style="font-weight: bold;">2 Enter Your Details</span></b>: Once registered you will need to log in and enter your contact details and details of your National Membership.&nbsp; BKA events are open to practicing members from all EKF/FIK affiliated organisations.&nbsp; </span></p>
<p><span style="font-size: 12px;">We request details of your current grades for information only.&nbsp; These are not validated and, if applying for a grading, you will need to send both a copy of your most recent menjo and a letter of authority from your National Organisation to support your application.&nbsp; These&nbsp; should be sent to the BKA Kendo / Iaido&nbsp; / Jodo grading officer. </span></p>
<p><span style="font-size: 12px;"><b><span style="font-weight: bold;">3 Payment</span></b> Upon completion of the details you will be directed to the booking page and secure payment pages where you can pay for event bookings using credit &amp; debit cards.&nbsp;&nbsp; If you do not complete the transaction, your details will be kept on record for 14 days and then deleted. </span></p>
