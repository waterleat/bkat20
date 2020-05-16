<?php
$foreName = ''; // $_SESSION['var1']
$surName = ''; // $_SESSION['var2']
$addr1 = ''; // $_SESSION['var3']
// $_SESSION['var4']
// $_SESSION['var5']
// $_SESSION['var6']
$country = ''; // $_SESSION['var7']
$postcode = ''; // $_SESSION['var8']
$email = ''; // $_SESSION['var9']
$phone = ''; // $_SESSION['var10']

$dob = ''; // $_SESSION['var11']
$gender = ''; // $_SESSION('var12');

$townBirth = ''; // $_SESSION['var21']
$countryBirth = ''; // $_SESSION['var22']
$nationality = ''; // $_SESSION['var23']

$membershiptype = ''; // $_SESSION("var13")
$pension = ''; // $_SESSION['var14']

$dojono=''; // $_SESSION('var18');
$dojopass = ''; // $_SESSION['var19']

$k = ''; // $_SESSION("var15")
$i = ''; // $_SESSION("var16")
$j = ''; // $_SESSION("var17")


$medical = ''; // $_SESSION('var20')

$error = ''; // $_SESSION("varerr")
?>


<h2 class="my-0 bg-gray-400 py-2 text-center">New Member Details</h2>
<div class="p-4 xs:pl-16 md:pl-4 flex flex-col md:flex-row">
  <div class="flex flex-col w-full md:w-1/2">

    <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
      <label id="FormsFieldLabel17" for="FormsEditField13" class="w-48 md:w-32 lg:w-48 ">Forename</label>
      <input type="text" id="FormsEditField13" name="Forename"  tabindex="1" onChange="" required class="p-1 border border-blue-500" value="<?php  ?>"> <!-- -->
    </div>
    <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
      <label id="FormsFieldLabel18" for="FormsEditField14" class="w-48 md:w-32 lg:w-48 ">Family Name</label>
      <input type="text" id="FormsEditField14" name="Surname" tabindex="2" onChange="" required class="p-1 border border-blue-500" value="<?php  ?>">
    </div>
    <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
      <label id="FormsFieldLabel13" for="FormsEditField9" class="w-48 md:w-32 lg:w-48 ">Address</label>
      <div class="flex flex-col">
        <input type="text" id="FormsEditField9" name="Address1" tabindex="3" onChange="" required class="p-1 border border-blue-500" value="<?php  ?>">
        <input type="text" id="FormsEditField10" name="Address2" tabindex="4" onChange="" class="mt-1 p-1 border border-blue-500" value="<?php  ?>">
        <input type="text" id="FormsEditField11" name="Address3" tabindex="5" onChange="" class="mt-1 p-1 border border-blue-500" value="<?php  ?>">
        <input type="text" id="FormsEditField1" name="Address4" tabindex="6" onChange="" class="mt-1 p-1 border border-blue-500" value="<?php  ?>">
      </div>
    </div>
    <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
      <label for="FormsEditField18" class="w-48 md:w-32 lg:w-48 ">Country</label>
      <input type="text" id="FormsEditField18" name="Address5" tabindex="7" onChange="" class="p-1 border border-blue-500" value="<?php  ?>">
    </div>
    <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
      <label id="FormsFieldLabel14" for="FormsEditField2" class="w-48 md:w-32 lg:w-48 ">Postcode</label>
      <input type="text" id="FormsEditField2" name="Postcode" tabindex="8" onChange="" required class="p-1 border border-blue-500" value="<?php  ?>">
    </div>
    <div class="flex pt-2 flex-wrap xs:flex-no-wrap ">
      <label id="FormsFieldLabel15" for="FormsEditField3" class="w-48 md:w-32 lg:w-48 ">email</label>
      <input type="email" id="FormsEditField3" name="email" tabindex="9" onChange="" required class="p-1 border border-blue-500" value="<?php  ?>">
    </div>
    <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
      <label id="FormsFieldLabel16" for="FormsEditField19" class="w-48 md:w-32 lg:w-48 ">Phone</label>
      <input type="text" id="FormsEditField19" name="Phone" tabindex="10" onChange="" class="p-1 border border-blue-500" value="<?php  ?>">
    </div>
  </div>

  <div class="w-full md:w-1/2 flex flex-col">
    <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
      <div class="w-48 flex">
        <label id="FormsFieldLabel19" class="">Date of Birth</label>
        <div class="">
          <img id="Picture5"  class="ml-2 inline" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/Query.GIF" border="0" alt="Enter in dd/mm/yyyy format" title="Enter in dd/mm/yyyy format">
        </div>
      </div>
      <input type="text" id="FormsEditField15" name="DoB" size="10"  tabindex="11" onChange="" required class="p-1 border border-blue-500 ui-widget-content ui-corner-all mydatepicker" value="<?php  ?>">
    </div>
    <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
    <label id="FormsFieldLabel21" class="w-48">Gender</label>
    <select id="FormsComboBox1" name="Gender" tabindex="12" class="p-1 border border-blue-500">
      <option value="Male" <?php selected($gender, 'Male' ) ?> >Male</option>
      <option value="Female" <?php selected($gender, 'Female' ) ?> >Female</option>
    </select>

  </div>
  <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
    <label class="w-48">Town of Birth</label>
    <input type="text" id="FormsEditField20" name="TownOB" tabindex="13" onChange="" required class="p-1 border border-blue-500" value="<?php  ?>">

  </div>
  <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
    <label class="w-48">Country of Birth</label>
    <input type="text" id="FormsEditField21" name="CountryOB" tabindex="14" onChange="" required class="p-1 border border-blue-500" value="<?php  ?>">

  </div>
  <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
    <label class="w-48">Nationality</label>
    <input type="text" id="FormsEditField22" name="Nationality" tabindex="15" onChange="" required class="p-1 border border-blue-500" value="<?php  ?>"></td>

  </div>
  <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
    <div class="flex w-48">
      <label id="FormsFieldLabel26" class="">Dojo</label>
      <div class="">
        <img id="Picture4"  class="ml-2 inline" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/Query.GIF" border="0" alt="Select dojo practiced at.  An email will be sent to the dojo to advise them of this.  Other dojo can be added later once membership is set up." title="Select dojo practiced at.  An email will be sent to the dojo to advise them of this.  Other dojo can be added later once membership is set up.">
      </div>
    </div>
    <select id="FormsComboBox3" name="Dojo" class="p-1 border border-blue-500">
      <?php
      foreach ($dojos as $dojo) {
      ?>
        <option id="" <?php selected($dojo['dojono'], $dojono) ?> value="<?php echo $dojo['Dojono']; ?>"><?php echo $dojo['DojoName']; ?></option>
      <?php } ?>
      <option value="0" <?php selected($dojono, '') ?> >Please select</option>
    </select>

  </div>
  <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
    <div class="flex w-48">
      <label id="FormsFieldLabel29" class="">Dojo Password</label>
      <div class="">
        <img id="Picture1" class="ml-2 inline" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/Query.GIF" border="0" alt="Required for any new member applying for any membership other than Temporary.  This password is obtained from the dojo leader." title="Required for any new member applying for any membership other than Temporary.  This password is obtained from the dojo leader.">
      </div>
    </div>
    <input type="text" id="FormsEditField17" name="DojoPassword"  tabindex="14" onChange="" class="p-1 border border-blue-500"  value="<?php echo $dojopass ?>">

  </div>
  <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
    <label id="FormsFieldLabel27" class="w-48">Arts Practiced</label>
    <div class="flex flex-col">
      <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
        <label id="FormsFieldLabel23" class="w-16">Kendo</label>
        <input type="checkbox" id="FormsCheckbox1" name="KendoCheckbox" tabindex="15" value="1" class="my-1" <?php selected($k, 1, ' checked ') ?> >
      </div>
      <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
        <label id="FormsFieldLabel24" class="w-16">Iaido</label>
        <input type="checkbox" id="FormsCheckbox2" name="IaidoCheckbox" tabindex="16" value="1" class="my-1" <?php selected($i, 1, ' checked ') ?> >
      </div>
      <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
        <label id="FormsFieldLabel25" class="w-16">Jodo</label>
        <input type="checkbox" id="FormsCheckbox3" name="JodoCheckbox" tabindex="17" value="1" class="my-1" <?php selected($j, 1, ' checked ') ?> >
      </div>
    </div>
  </div>


  <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
    <div class="flex w-48">
      <label id="FormsFieldLabel22" class="">Membership Type</label>
      <div class="">
        <img id="Picture2" class="ml-2 inline" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/Query.GIF" border="0" alt="Temporary : 3 months membership for beginners which can be applied for without dojo confirmation.   All other types require an affiliated dojo confirmation.  Associate Membership is for non-practicing members only.  " title="Temporary : 3 months membership for beginners which can be applied for without dojo confirmation.   All other types require an affiliated dojo confirmation.  Associate Membership is for non-practicing members only.  ">
      </div>
    </div>
    <select id="FormsComboBox2" name="Membertype" tabindex="18" class="p-1 border border-blue-500">
      <option value="Temporary" <?php selected($membershiptype, 'Temporary' ) ?> >Temporary</option>
      <option value="Full" <?php selected($membershiptype, 'Full' ) ?> >Full</option>
      <option value="Concessionary" <?php selected($membershiptype, 'Concessionary' ) ?> >Concessionary (65 & over)</option>
      <option value="Student" <?php selected($membershiptype, 'Student' ) ?> >Student (Full time)</option>
      <option value="Junior" <?php selected($membershiptype, 'Junior' ) ?> >Junior (Under 18)</option>
      <option value="Associate" <?php selected($membershiptype, 'Associate' ) ?> >Associate</option>
    </select>

    </div>
    <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
      <div class="flex w-48">
        <label id="FormsFieldLabel28" class="">Student / Pension no</label>
        <div class="">
          <img id="Picture3" class="ml-2 inline" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/Query.GIF" border="0" alt="Enter Student number or Pension as appropriate if applying for these membership classes.  Not required for all other membership types." title="Enter Student number or Pension as appropriate if applying for these membership classes.  Not required for all other membership types.">
        </div>
      </div>
      <input type="text" id="FormsEditField16" name="concessiondata"   tabindex="19" onChange="" class="p-1 border border-blue-500" value="<?php  ?>">

    </div>
    <div class="flex pt-2 flex-wrap xs:flex-no-wrap">
      <div class="flex w-48">
        <label id="FormsFieldLabel30">Medical notes</label>
        <div class="">
          <img id="Picture6" class="ml-2 inline" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/Query.GIF" border="0" alt="Please notify us of any pre-existing medical condition whic may affect your ability to train." title="Please notify us of any pre-existing medical condition whic may affect your ability to train.">
        </div>
      </div>
      <textarea id="FormsMultiLine1" name="Medical" rows="3" cols="62" tabindex="20" class="w-full p-1 border border-blue-500"><?php echo $medical; ?></textarea>
    </div>
  </div>
</div>
<div class="flex pt-2 justify-around">
  <input type="button" id="FormsButton4" name="Cancel" tabindex="21" value="Cancel" class="btn btn-blue">
  <input type="submit" id="FormsButton3" name="Submit" tabindex="22" value="Submit" class="btn btn-blue">

</div>
<p><span style="color: rgb(255,0,0);"><?php echo $error; ?></span></p>
