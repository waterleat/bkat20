<?php

$memberInfo
$dojoInfo
$coachinfo
$membershipOptions

?>

<h2>Renew Membership</h2>

<?php
$kendoval = "None";$iaidoval = "None";$jodoval = "None"; $dojoconf=FALSE;
while ( !$dojos->EOF ) {
		if (strstr($dojos->fields["Bu"],"Kendo")!=FALSE) $kendoval = "Kendo";
		if (strstr($dojos->fields["Bu"],"Iaido")!=FALSE) $iaidoval = "Iaido";
		if (strstr($dojos->fields["Bu"],"Jodo")!=FALSE) $jodoval = "Jodo";
		if (($dojos->fields["Dojostatus"]=="Compliant")&&($dojos->fields["status"]=="Confirmed" || $dojos->fields["status"]=="Coach"  )) $dojoconf = TRUE;
?>

<p class="label" style="margin-bottom: 0px;">Current Details</p>

<p style="margin-bottom: 0px;">BKA Number</p>
<p style="margin-bottom: 0px;">Member Name</p>
<p style="margin-bottom: 0px;">Membership Type</p>
<p style="margin-bottom: 0px;">Status</p>
<p style="margin-bottom: 0px;">Expires</p>
<p style="margin-bottom: 0px;">Insurance Ref&nbsp; </p>
<p style="margin-bottom: 0px;">Coach Insurance </p>
<?php
if ($membercoach->fields["Insurance"]>0) {
echo $membercoach->fields["Insurance"];
} else {
echo "Not Insured";
}
?>
<?php
if ($membercoach->fields['Insurance']>0) {
echo $membercoach->fields['Renewaldue'];
} else {
echo "N/A";
}
?>&nbsp;</p>


<?php if ($kendoval=="Kendo")  {?><img id="Picture7" height="11" width="11" src="../assets/images/tick.jpg" border="0" alt="tick" title="tick"><?php } else {?>
<img id="Picture2" height="11" width="11" src="../assets/images/cross.jpg" border="0" alt="cross" title="cross" >
<?php } ?>Kebdo
<?php if ($iaidoval=="Iaido")  {?><img id="Picture4" height="11" width="11" src="../assets/images/tick.jpg" border="0" alt="tick" title="tick"><?php } else {?>
<img id="Picture2" height="11" width="11" src="../assets/images/cross.jpg" border="0" alt="cross" title="cross" >
<?php } ?>Iaido
<?php if ($jodoval=="Jodo")  {?><img id="Picture5" height="11" width="11" src="../assets/images/tick.jpg" border="0" alt="tick" title="tick"><?php } else {?>
<img id="Picture2" height="11" width="11" src="../assets/images/cross.jpg" border="0" alt="cross" title="cross" >
<?php } ?>Jodo

<p style="margin-bottom: 0px;">Dojo</p>
<p style="margin-bottom: 0px;">Arts Practiced</p>
<p style="margin-bottom: 0px;">Status</p>

<form name="LayoutRegion6FORM" enctype="multipart/form-data" action="../scripts/renewmember.php" method="post">
  <input type="hidden" id="Kendo" name="Kendo" value="<?php echo $kendoval?>">
  <input type="hidden" id="Iaido" name="Iaido" value="<?php echo $iaidoval ?>">
  <input type="hidden" id="Jodo" name="Jodo" value="<?php echo $jodoval ?>">
  <input type="hidden" id="Status" name="Status" value="<?php echo $member->fields['Membershipstatus'] ?>">
  <p class="label" style="margin-bottom: 0px;"><span style="font-size: 20px;">Purchase Options</span></p>
  <p style="margin-bottom: 0px;">Membership Type</p>
  <?php
  if (!$dojoconf && $member->fields['Membershipstatus']!='Applied') { ?>
    <select id="FormsComboBox2" name="FormsComboBox2" style="height: 24px;" disabled = "disabled">
      <option value=0>N/A: No dojo or dojo not compliant</option>
    </select>

  <?php } elseif (!isdue($member->fields['Renewaldue'])&& $member->fields['Membershiptype']!='Temporary') { ?>
    <select id="FormsComboBox2" name="FormsComboBox2" style="height: 24px;" disabled = "disabled">
      <option value=0>Membership is not due</option>
    </select>

  <?php } elseif (incart('INDIV','MEM-%',$_SESSION[BKANo])) { ?>
    <select id="FormsComboBox2" name="FormsComboBox2" style="height: 24px;" disabled = "disabled">
      <option value='None'>already in shopping cart</option>
    </select>

  <?php
  } else {
  ?>
   <select id="FormsComboBox2" name="FormsComboBox2" style="height: 24px;" >
    <?php
      $membershipoptions->Move(0);
      echo "<option value='None'>Please Select</option>";
      if ($member->fields['Membershipstatus']=='Applied') {
        echo "<option value='MEM-T'>Temporary</option>";
      }
      if ($dojoconf) {
        while ( !$membershipoptions->EOF ) {
          if (memconditions($membershipoptions->fields["Id"],$member->fields["dob"],$member->fields["Renewaldue"])) {
            echo "<option value=\"" . $membershipoptions->fields["Id"]. "\">" . $membershipoptions->fields["Class"]. "</option>";
          }
        $membershipoptions->MoveNext();
        }
      }
    ?>
    </select>
  <?php } ?>

  <?php if ($dojoconf) { ?>
  <img id="Picture10" height="17" width="23" src="../assets/images/Query.GIF" border="0" alt="Select membership type required.  Any Bu supplements and late charges will be added.  This can be seen in the Shopping Cart before purchase  is confirmed.  Student membership applicable to full time students only.  " title="Select membership type required.  Any Bu supplements and late charges will be added.  This can be seen in the Shopping Cart before purchase  is confirmed.  Student membership applicable to full time students only.  ">
  <?php } ?>
  <?php if (!$dojoconf) { ?>
  <img id="Picture12" height="17" width="23" src="../assets/images/Query.GIF" border="0" alt="You must be a confirmed member of a BKA affiliated dojo. If the box above lists no dojos then you need to link to the dojo on your membership page.  If the listing does not show Confirmed, you need to contact the dojo officals to accept your application. If the listing shows Confirmed then there may be a problem with the dojo's BKA affiliation." title="You must be a confirmed member of a BKA affiliated dojo. If the box above lists no dojos then you need to link to the dojo on your membership page.  If the listing does not show Confirmed, you need to contact the dojo officals to accept your application. If the listing shows Confirmed then there may be a problem with the dojo's BKA affiliation."><?php } ?>

  <?php if (iscoach($_SESSION[BKANo])) { ?>
    <p style="margin-bottom: 0px;">Coaching Indemnity</p>
  <?php } ?>

  <?php
  if (iscoach($_SESSION[BKANo])&& $dojoconf) {

    if (!isdue($membercoach->fields['Renewaldue'])) { ?>
    <select id="FormsComboBox3" name="FormsComboBox3" style="height: 24px;" disabled = "disabled">
      <option value=0>Renewal is not due</option>
    </select>

    <?php } elseif (incart('INDIV','COACH',$_SESSION[BKANo])) { ?>
    <select id="FormsComboBox3" name="FormsComboBox3" style="height: 24px;" disabled = "disabled">
      <option value=0>already in shopping cart</option>
    </select>

    <?php } else { ?>
      <select id="FormsComboBox3" name="FormsComboBox3" style="height: 24px;" >
        <option value=0>Coaching Insurance not required</option>
        <option value=1>Add Coaching Insurance</option>
      </select>
    <?php
    }
  }
  ?>
  <?php if (iscoach($_SESSION[BKANo])) { ?>
    <img id="Picture9" height="17" width="23" src="../assets/images/Query.GIF" border="0" alt="Tick if you require coaching insurance  and pay this privately. " title="Tick if you require coaching insurance  and pay this privately. ">
  <?php } ?>

  <p style="margin-bottom: 0px;">Bu Membership</p>

  <p style="text-align: right; margin-bottom: 0px;">Kendo</p>
  <?php
  if ($kendoval=="Kendo") { ?>
    <img id="Picture7" height="11" width="11" src="../assets/images/tick.jpg" border="0" alt="tick" title="tick" >
  <?php
  } else { ?><input type="checkbox" id="FormsCheckbox1" name="KendoCheckbox" value="Kendo" style="height: 13px; width: 13px;"><?php } ?>

  <p style="text-align: right; margin-bottom: 0px;">Iaido</p>
  <?php
  if ($iaidoval=="Iaido") { ?>
    <img id="Picture7" height="11" width="11" src="../assets/images/tick.jpg" border="0" alt="tick" title="tick" >
  <?php } else { ?>
    <input type="checkbox" id="FormsCheckbox2" name="IaidoCheckbox" value="Iaido" style="height: 13px; width: 13px;">
  <?php } ?>

  <p style="text-align: right; margin-bottom: 0px;">Jodo</p>
  <?php if ($jodoval=="Jodo") { ?>
    <img id="Picture7" height="11" width="11" src="../assets/images/tick.jpg" border="0" alt="tick" title="tick" >
  <?php } else { ?>
    <input type="checkbox" id="FormsCheckbox3" name="JodoCheckbox" value="Jodo" style="height: 13px; width: 13px;">
  <?php } ?>

  <img id="Picture11" height="17" width="23" src="../assets/images/Query.GIF" border="0" alt="Select Bu membership required.  You cannot deselect any Bu listed in your dojo affilaitaion above.  If you require to remove these you need to change this affiliation through the Individual Membership page.  Any Bu supplements  will be added.  This can be seen in the Shopping Cart before purchase  is confirmed.  " title="Select Bu membership required.  You cannot deselect any Bu listed in your dojo affilaitaion above.  If you require to remove these you need to change this affiliation through the Individual Membership page.  Any Bu supplements  will be added.  This can be seen in the Shopping Cart before purchase  is confirmed.  ">

  <input type="submit" id="FormsButton2" name="FormsButton2" value="Cancel" style="height: 24px; width: 72px;">
  <input type="submit" id="FormsButton1" name="FormsButton1" value="Renew" style="height: 24px; width: 72px;">
  <input type="button" id="FormsButton3" name="FormsButton3" value="View Cart" style="height: 24px; width: 93px;">
</form>

<?php echo $membershipoptions->fields["Type"]; ?>
<?php echo $membercoach->fields["Bu"]; ?>




<p style="margin-bottom: 0px;">Current Annual Membership Prices</p>
<?php echo $membershipoptions->fields["Class"]; ?>
<?php echo $membershipoptions->fields["Price"]; ?>
