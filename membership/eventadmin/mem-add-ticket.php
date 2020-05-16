<?php

// $num = check_login();
// if ($num != 1 || check_admin('j')!=1){
// //not logged in
// header("Location: my_account.php");
// exit;
// }

?>

<?php
$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );


$thisticketQuery = "SELECT eventid,ticketid,description,price,DATE_FORMAT(enddate,'%d/%m/%Y')AS EDATE,selection,number FROM ticket WHERE eventid = " .  NOF_PrepareSQLParameter($NOF_REQUEST->Session("seminar"), false) . " AND ticketid = " .  NOF_PrepareSQLParameter($NOF_REQUEST->QueryString("id"), false) . "";
$thisticketSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_thisticket");
$thisticketSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_thisticket");
if (!NOF_IsEmpty($thisticketSortOrder)) {
if (strpos(strtolower($thisticketQuery), "order by") !== false) {
$thisticketQuery = substr($thisticketQuery, 0, strpos(strtolower($thisticketQuery), "order by"));
}
$thisticketQuery .= " ORDER BY " . $thisticketSortOrder . " " . $thisticketSortDir;
}
$thisticket = $NOF_DB_CONN->Execute($thisticketQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());
 ?>
<script type="text/javascript">
function F_doLoaded() {
	document.main = new F_cMain();
	document.objectModel = new Object();
	F_OM('Layout','LayoutLYR', 'doc', '', new Array());
	F_OM('LayoutRegion1' , 'LayoutRegion1LYR', 'lyr', 'Layout',null,'',0);

		F_OM('FormsButton2' , '', 'btn', 'LayoutRegion1',new Array(
		'Clicked','Layout','Close','',0),'LayoutRegion1FORM',0,'Cancel');
 		F_OM('FormsButton1' , '', 'btn', 'LayoutRegion1',new Array(
		'Clicked',F_functFormsButton1Action0,'','',0,
		'Clicked','Layout','Delay',F_Parm('action','','delay',5,'continuous',false),0),'LayoutRegion1FORM',0,'Submit');
 		F_OM('Table9' , 'Table9LYR', 'lyr', 'LayoutRegion1',null,'',0);

	F_pageLoaded('Layout');
}

function F_functFormsButton1Action0(params) {
  window.opener.location.reload();
}
</script>


<style type="text/css">
.DefaultErrorFieldStyle {
	background-color: rgb(255,0,0);
}.DefaultErrorLabelStyle {
	background-color: rgb(255,0,0);
}</style>
<!-- <style type="text/css" title="NOF_STYLE_SHEET">

div#LayoutLYR { }
div#LayoutRegion1LYR { position:relative; top:0; left:0; width:367px; height:290px; z-index:1; }
div#FormsButton2LYR { position:absolute; top:226px; left:73px; width:72px; height:24px; z-index:1 }
div#FormsButton1LYR { position:absolute; top:226px; left:224px; width:70px; height:24px; z-index:2 }
div#Text3LYR { position:absolute; top:0px; left:0px; width:366px; height:25px; z-index:3 }
div#Table9LYR { position:absolute; top:41px; left:7px; width:349px; height:168px; z-index:4 }
div#Connector1LYR { position:absolute; top:18px; left:0px; width:18px; height:18px; z-index:5 }

</style>

<script type="text/javascript" src="./add_ticket_nof.js">
</script> -->


 <!-- <div id="LayoutLYR">
  <table border="0" cellspacing="0" cellpadding="0" width="367">
   <tr valign="top" align="left">
    <td height="290" width="367">
     <div id="LayoutRegion1LYR"> -->
      <!-- <script type="text/javascript">

      function __fv1_LayoutRegion1FORM(form) {
       var args = {
      "ticketid":[["NOF_isRequired", [''], "ticket id is required", "", ""]],
      "TextBox1":[["NOF_isRequired", [''], "description is required", "", ""]],
      "price":[["NOF_isRequired", [''], "this field is required", "", ""], ["NOF_isInRange", ['0.00', '999.99', '1'], "the number entered is not in the specified interval", "", ""]],
      "edate":[["NOF_isValidDate", ['DD-MM-YYYY'], "Date format required is DD-MM-YYYY", "", ""]]
       };
       return NOF_validateForm(form, args, true, null,'Please correct the following errors:');
      }

      </script> -->

<div class="">
  <p>Create New Ticket Type</p>
  <form id="Table9LYR" name="LayoutRegion1FORM" action="../scripts/adminaddticket.php" method="post" onSubmit="return __fv1_LayoutRegion1FORM(this)">

    <div>
      <label id="FormsFieldLabel5" class="font-bold">Ticket ID</label>
      <input type="text" id="FormsEditField1" name="ticketid" size="10" maxlength="10" onChange="__fv1_LayoutRegion1FORM(this.form)" required style="white-space: pre; width: 76px;" value=<?php echo getURLvar("id"); ?>>
    </div>
    <div class="">
      <label id="FormsFieldLabel9" class="font-bold">Description</label>
      <input type="text" value="<?php echo $thisticket->fields["description"]; ?>" size="29" maxlength="30" id="desc" name="desc">
    </div>
    <div class="">
      <label id="FormsFieldLabel10"><b><span style="font-weight: bold;">Group</span></b></label>
      <select id="FormsComboBox2" name="tickettype" style="height: 24px;" >
        <option value="ATTENDANCE"<?php if ($thisticket->fields['selection']=="ATTENDANCE") echo 'Selected="Selected" ';?>>ATTENDANCE</option>
        <option value="OPTIONS"<?php if ($thisticket->fields['selection']=="OPTIONS") echo 'Selected="Selected" ';?>>OPTIONS</option>
      </select>
    </div>
    <div class="">
      <label id="FormsFieldLabel6"><b><span style="font-weight: bold;">Price (GBP)</span></b></label>
      <input type="text" id="FormsEditField2" name="price" size="11" maxlength="6" onChange="__fv1_LayoutRegion1FORM(this.form)" required style="white-space: pre; width: 84px;" value=<?php echo $thisticket->fields["price"]; ?>>
    </div>
    <div class="">
      <label id="FormsFieldLabel7"><b><span style="font-weight: bold;">Last Date</span></b></label>
      <input type="text" id="FormsEditField3" name="edate" size="11" maxlength="10" onChange="__fv1_LayoutRegion1FORM(this.form)" style="white-space: pre; width: 84px;" value=<?php echo $thisticket->fields["EDATE"]; ?>>
    </div>
    <div class="">
      <label id="FormsFieldLabel1"><b><span style="font-weight: bold;">Number </span></b></label>
      <input type="text" id="FormsEditField6" name="number" size="11" maxlength="5" onChange="__fv1_LayoutRegion1FORM(this.form)" style="white-space: pre; width: 84px;" value=<?php echo $thisticket->fields["number"]; ?>>
    </div>

    <div class="">
      <input type="button" id="FormsButton2" name="Cancel" tabindex="3" class="label" value="Cancel" style="height: 24px; width: 72px;">
      <input type="submit" id="FormsButton1" name="Submit" tabindex="4" class="label" value="Submit" style="height: 24px; width: 70px;">
    </div>

  </form>
</div>
