<?php
$_SESSION['Errormsg']='';
?>

admin_new_member
member_grading_record
member_registration
dojo_admin
dojo_listing
historical_grading
grading_admin  // Furture Gradings
event_admin
member_documentation
dojo_documentation
    <form name="LAYOUTFORM" enctype="multipart/form-data" action="../scripts/generatedojodata.php" method="post">
    Dojo No Range
    Insurance Range
    Dojo Nos
    file
    <input type="text" id="FormsEditField1" name="Dojono1" size="7" maxlength="11" style="white-space: pre; width: 52px;">
    <input type="text" id="FormsEditField3" name="Insno1" size="7" maxlength="11" style="white-space: pre; width: 52px;">
    to
    <input type="submit" id="FormsButton1" name="BKArange" value="Add" style="height: 24px; width: 46px;">
    <input type="text" id="FormsEditField2" name="Dojono2" size="7" maxlength="10" style="white-space: pre; width: 52px;">
    <input type="submit" id="FormsButton2" name="BKArange" value="Add" style="height: 24px; width: 46px;">
    <input type="text" id="FormsEditField4" name="Insno2" size="7" maxlength="10" style="white-space: pre; width: 52px;">
    <textarea id="FormsMultiLine1" name="freeform" rows="4" cols="36" style="white-space: pre; width: 301px;"></textarea>
    <?php echo getSESSIONvar("BKANo"); ?>
    <input type="submit" id="FormsButton3" name="BKArange" value="Add" style="height: 24px; width: 46px;">

officers
individual_membership
logout


<?php
