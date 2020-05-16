<?php
  // $id = getURLvar("id");
  // if ($id != "") {
  //     if (getURLvar("page") != "") setTwoDimensionsSESSIONvar($id, "page", getURLvar("page"));
  //     if (getURLvar("order") != "") setTwoDimensionsSESSIONvar($id, "order", getURLvar("order"));
  //     if (getURLvar("kind") != "") setTwoDimensionsSESSIONvar($id, "kind", getURLvar("kind"));
  // }

  // $num = check_login();
  // if ($num != 1 || check_admin('j')!=1){
  //   //not logged in
  //   header("Location: my_account.php");
  //   exit;
  // }

  // $peventsQuery = "SELECT grading,CONCAT_WS(' ',Bu,place,DATE_FORMAT(grading.date,'%d-%m-%Y')) AS EVENT FROM grading WHERE complete = 'Yes' ORDER BY date DESC ";
  // $peventsSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_pevents");
  // $peventsSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_pevents");
  // if (!NOF_IsEmpty($peventsSortOrder)) {
  // if (strpos(strtolower($peventsQuery), "order by") !== false) {
  // $peventsQuery = substr($peventsQuery, 0, strpos(strtolower($peventsQuery), "order by"));
  // }
  // $peventsQuery .= " ORDER BY " . $peventsSortOrder . " " . $peventsSortDir;
  // }
  // $pevents = $NOF_DB_CONN->Execute($peventsQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());


?>
<script type="text/javascript">
function F_doLoaded() {
// 	document.main = new F_cMain();
// 	document.objectModel = new Object();
// 	F_OM('Layout','LayoutLYR', 'doc', '', new Array());
// <?php // $NOFDataSourceRS88003->doReset("Table3");
//         while ($NOFDataSourceRS88003->hasNext("Table3")) {?>
// <?php // $NOFDataSourceRS88003->next("Table3");}?>
// 	F_OM('ComboBox1' , '', 'sel', 'Layout',new Array(
// 	'Change',F_functComboBox1Action0,'','',0,
// 	'Page Loaded',F_functComboBox1Action1,'','',0),'LayoutRegion4FORM',0,'ComboBox1');
//  	F_OM('Label1' , 'Label1LYR', 'img', 'Layout',null,'',0);
//
// 	F_OM('FormsFieldLabel1' , '', 'lyr', 'Layout',null,'LayoutRegion4FORM',0,'');
//
// 	F_OM('ComboBox2' , '', 'sel', 'Layout',null,'LayoutRegion4FORM',0,'Bu');
//
// 	F_OM('FormsFieldLabel5' , '', 'lyr', 'Layout',null,'LayoutRegion4FORM',0,'');
//
// 	F_OM('FormsEditField1' , '', 'tfd', 'Layout',null,'LayoutRegion4FORM',0,'Date');
//
// 	F_OM('FormsFieldLabel6' , '', 'lyr', 'Layout',null,'LayoutRegion4FORM',0,'');
//
// 	F_OM('FormsEditField2' , '', 'tfd', 'Layout',null,'LayoutRegion4FORM',0,'Place');
//
// 	F_OM('FormsFieldLabel7' , '', 'lyr', 'Layout',null,'LayoutRegion4FORM',0,'');
//
// 	F_OM('FormsEditField3' , '', 'tfd', 'Layout',null,'LayoutRegion4FORM',0,'Head');
//
// 	F_pageLoaded('Layout');
}
function F_functComboBox1Action0(params) {
if ( F_Action('ComboBox1','Get Selected Value','',0)  == 1) {
$("#ComboBox2").show();
$("#FormsEditField1").show();
$("#FormsEditField2").show();
$("#FormsEditField3").show();
$("#FormsFieldLabel1").show();
$("#FormsFieldLabel5").show();
$("#FormsFieldLabel6").show();
$("#FormsFieldLabel7").show();
 } else {
$("#ComboBox2").hide();
$("#FormsEditField1").hide();
$("#FormsEditField2").hide();
$("#FormsEditField3").hide();
$("#FormsFieldLabel1").hide();
$("#FormsFieldLabel5").hide();
$("#FormsFieldLabel6").hide();
$("#FormsFieldLabel7").hide();
}
}

function F_functComboBox1Action1(params) {
$("#ComboBox2").hide();
$("#FormsEditField1").hide();
$("#FormsEditField2").hide();
$("#FormsEditField3").hide();
$("#FormsFieldLabel1").hide();
$("#FormsFieldLabel5").hide();
$("#FormsFieldLabel6").hide();
$("#FormsFieldLabel7").hide();
}

</script>

<div id="LayoutLYR">
 <table cellpadding="0" cellspacing="0" border="0" width="1037">
  <tr valign="top" align="left">
   <td>
    <table border="0" cellspacing="0" cellpadding="0" width="172">
     <tr valign="top" align="left">
      <td height="16" width="27"><img src="../assets/images/autogen/clearpixel.gif" width="27" height="1" border="0" alt=""></td>
      <td></td>
     </tr>
     <tr valign="top" align="left">
      <td height="741"></td>
      <td width="145">
      </td>
     </tr>
    </table>
   </td>
   <td>
    <table border="0" cellspacing="0" cellpadding="0" width="865">
     <tr valign="top" align="left">
      <td height="153"></td>
      <td colspan="2" width="711">
       <form name="LayoutRegion3FORM" action="../scripts/indmembergrade.php" method="post">
        <table cellpadding="0" cellspacing="0" border="0" width="650">
         <tr valign="top" align="left">
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="359">
            <tr valign="top" align="left">
             <td width="359" id="Text3" class="TextObject label" style="background-color: rgb(192,192,192);">
              <p style="text-align: center; margin-bottom: 0px;"><span style="font-size: 22px;">Member Grading Details</span></p>
             </td>
            </tr>
           </table>
          </td>
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="291">
            <tr valign="top" align="left">
             <td width="291" id="Text9" class="TextObject label" style="background-color: rgb(192,192,192);">
              <p style="text-align: center; margin-bottom: 0px;">
               <select id="FormsComboBox5" name="criteria" style="height: 24px;">
                <option value="BKAno" <?php // echo checkSelected3(getSESSIONvar("criteria"), BKAno, ' selected ') ?> >BKA No</option>
                <option value="Forename" <?php // echo checkSelected3(getSESSIONvar("criteria"), Forename, ' selected ') ?> >Forename</option>
                <option value="Surname" <?php // echo checkSelected3(getSESSIONvar("criteria"), Surname, ' selected ') ?> >Surname</option>
               </select>
               <input type="text" id="FormsEditField25" name="searchvalue" size="14" maxlength="14" style="white-space: pre; width: 108px;" value="<?php // echo $_SESSION[searchvalue] ?>"><input type="submit" id="FormsButton6" name="Submit" value="Search" style="height: 24px; width: 73px;"></p>
             </td>
            </tr>
           </table>
          </td>
         </tr>
        </table>
        <table cellpadding="0" cellspacing="0" border="0" width="642">
         <tr valign="top" align="left">
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="106">
            <tr valign="top" align="left">
             <td height="11" width="10"><img src="../assets/images/autogen/clearpixel.gif" width="10" height="1" border="0" alt=""></td>
             <td width="76"><img src="../assets/images/autogen/clearpixel.gif" width="76" height="1" border="0" alt=""></td>
             <td width="20"><img src="../assets/images/autogen/clearpixel.gif" width="20" height="1" border="0" alt=""></td>
            </tr>
            <tr valign="top" align="left">
             <td height="25"></td>
             <td colspan="2" width="96" id="FormsFieldLabel31LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel31">Member No.</label></td>
            </tr>
            <tr valign="top" align="left">
             <td colspan="3" height="2"></td>
            </tr>
            <tr valign="top" align="left">
             <td height="25"></td>
             <td width="76" id="FormsFieldLabel17LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel17">Name</label></td>
             <td></td>
            </tr>
           </table>
          </td>
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="226">
            <tr valign="top" align="left">
             <td height="11" width="8"><img src="../assets/images/autogen/clearpixel.gif" width="8" height="1" border="0" alt=""></td>
             <td width="135"><img src="../assets/images/autogen/clearpixel.gif" width="135" height="1" border="0" alt=""></td>
             <td width="83"><img src="../assets/images/autogen/clearpixel.gif" width="83" height="1" border="0" alt=""></td>
            </tr>
            <tr valign="top" align="left">
             <td></td>
             <td width="135" id="Text14" class="TextObject Norm14">
              <p style="margin-bottom: 0px;"><?php // echo $_SESSION[var23] ?>&nbsp;</p>
             </td>
             <td></td>
            </tr>
            <tr valign="top" align="left">
             <td colspan="3" height="2"></td>
            </tr>
            <tr valign="top" align="left">
             <td></td>
             <td colspan="2" width="218" id="Text16" class="TextObject Norm14">
              <p style="margin-bottom: 0px;"><?php // echo $_SESSION[var1] ?>&nbsp;</p>
             </td>
            </tr>
           </table>
          </td>
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="109">
            <tr valign="top" align="left">
             <td height="11" width="12"><img src="../assets/images/autogen/clearpixel.gif" width="12" height="1" border="0" alt=""></td>
             <td width="1"><img src="../assets/images/autogen/clearpixel.gif" width="1" height="1" border="0" alt=""></td>
             <td width="95"><img src="../assets/images/autogen/clearpixel.gif" width="95" height="1" border="0" alt=""></td>
             <td width="1"><img src="../assets/images/autogen/clearpixel.gif" width="1" height="1" border="0" alt=""></td>
            </tr>
            <tr valign="top" align="left">
             <td colspan="2" height="25"></td>
             <td colspan="2" width="96" id="FormsFieldLabel37LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel37">EKF No.</label></td>
            </tr>
            <tr valign="top" align="left">
             <td colspan="4" height="3"></td>
            </tr>
            <tr valign="top" align="left">
             <td height="25"></td>
             <td colspan="2" width="96" id="FormsFieldLabel19LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel19">Date of Birth</label></td>
             <td></td>
            </tr>
           </table>
          </td>
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="139">
            <tr valign="top" align="left">
             <td height="12" width="4"><img src="../assets/images/autogen/clearpixel.gif" width="4" height="1" border="0" alt=""></td>
             <td width="135"><img src="../assets/images/autogen/clearpixel.gif" width="135" height="1" border="0" alt=""></td>
            </tr>
            <tr valign="top" align="left">
             <td></td>
             <td width="135" id="Text17" class="TextObject">
              <p style="margin-bottom: 0px;"><?php // echo $_SESSION[var24] ?>&nbsp;</p>
             </td>
            </tr>
            <tr valign="top" align="left">
             <td colspan="2" height="2"></td>
            </tr>
            <tr valign="top" align="left">
             <td></td>
             <td width="135" id="Text18" class="TextObject">
              <p style="margin-bottom: 0px;"><?php // echo $_SESSION[var11] ?>&nbsp;</p>
             </td>
            </tr>
           </table>
          </td>
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="62">
            <tr valign="top" align="left">
             <td height="13" width="14"><img src="../assets/images/autogen/clearpixel.gif" width="14" height="1" border="0" alt=""></td>
             <td width="48"><img src="../assets/images/autogen/clearpixel.gif" width="48" height="1" border="0" alt=""></td>
            </tr>
            <tr valign="top" align="left">
             <td></td>
             <td width="48" id="Text21" class="TextObject">
              <p style="margin-bottom: 0px;"><a target="_self" href="javascript:openpopup_9c21('../html/edit_ekf.php')">Edit</a></p>
             </td>
            </tr>
           </table>
          </td>
         </tr>
        </table>
        <table cellpadding="0" cellspacing="0" border="0" width="568">
         <tr valign="top" align="left">
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="29">
            <tr valign="top" align="left">
             <td height="1" width="11"><img src="../assets/images/autogen/clearpixel.gif" width="11" height="1" border="0" alt=""></td>
             <td></td>
            </tr>
            <tr valign="top" align="left">
             <td height="18"></td>
             <td width="18"><!-- <img id="Connector1" height="18" width="18" src="../assets/images/Connector.gif" border="0" alt=""> --></td>
            </tr>
           </table>
          </td>
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="539">
            <tr valign="top" align="left">
             <td height="18" width="25"><img src="../assets/images/autogen/clearpixel.gif" width="25" height="1" border="0" alt=""></td>
             <td width="514"><img src="../assets/images/autogen/clearpixel.gif" width="514" height="1" border="0" alt=""></td>
            </tr>
            <tr valign="top" align="left">
             <td></td>
             <td width="514" id="Text8" class="TextObject">
              <p style="text-align: center; margin-bottom: 0px;"><span style="color: rgb(255,0,0);"><?php // echo getSESSIONvar("varerr"); ?></span></p>
             </td>
            </tr>
           </table>
          </td>
         </tr>
        </table>
       </form>
      </td>
      <td></td>
     </tr>
     <tr valign="top" align="left">
      <td height="7" width="23"><img src="../assets/images/autogen/clearpixel.gif" width="23" height="1" border="0" alt=""></td>
      <td></td>
      <td width="62"><img src="../assets/images/autogen/clearpixel.gif" width="62" height="1" border="0" alt=""></td>
      <td width="131"><img src="../assets/images/autogen/clearpixel.gif" width="131" height="1" border="0" alt=""></td>
     </tr>
     <tr valign="top" align="left">
      <td height="92"></td>
      <td width="649">
       <table border="0" cellspacing="0" cellpadding="0" width="183">
        <tr valign="top" align="left">
         <td width="183" id="Text10" class="TextObject">
          <p class="label" style="margin-bottom: 0px;">Current Grade Records</p>
         </td>
        </tr>
       </table>
       <table border="0" cellspacing="0" cellpadding="0">
        <tr valign="top" align="left">
         <td height="1"></td>
        </tr>
        <tr valign="top" align="left">
         <td width="535">
          <table id="Table1" border="0" cellspacing="0" cellpadding="0" width="100%" style="height: 19px;">
           <tr style="height: 28px;">
            <th width="76" style="background-color: rgb(192,192,192);" id="Cell1">
             <p style="text-align: center; margin-bottom: 0px;">Bu</p>
            </th>
            <th width="192" style="background-color: rgb(192,192,192);" id="Cell2">
             <p style="text-align: center; margin-bottom: 0px;">Date</p>
            </th>
            <th width="124" style="background-color: rgb(192,192,192);" id="Cell3">
             <p style="text-align: center; margin-bottom: 0px;">Place</p>
            </th>
            <th width="143" style="background-color: rgb(192,192,192);" id="Cell4">
             <p style="text-align: center; margin-bottom: 0px;">Grade Awarded</p>
            </th>
           </tr>
          </table>
         </td>
        </tr>
       </table>
       <table border="0" cellspacing="0" cellpadding="0">
        <tr valign="top" align="left">
         <td height="3"></td>
        </tr>
        <tr valign="top" align="left">
         <td width="640">
          <table id="Table3" border="0" cellspacing="0" cellpadding="0" width="100%" style="height: 19px;">
           <?php
// $NOFDataSourceRS88003->doReset("Table3");
// while ($NOFDataSourceRS88003->hasNext("Table3")) {
?>
           <tr style="height: 29px;">
            <td width="77" id="Cell81">
             <p class="Norm14" style="text-align: center; margin-bottom: 0px;"><?php // echo $NOFDataSourceRS88003->getData("grade.Bu", "Table3"); ?></p>
            </td>
            <td width="203" id="Cell82">
             <p class="Norm14" style="text-align: center; margin-bottom: 0px;"><?php // echo $NOFDataSourceRS88003->getData("grading.date", "Table3"); ?></p>
            </td>
            <td width="122" id="Cell83">
             <p class="Norm14" style="text-align: center; margin-bottom: 0px;"><?php // echo $NOFDataSourceRS88003->getData("grading.place", "Table3"); ?></p>
            </td>
            <td width="135" id="Cell84">
             <p class="Norm14" style="text-align: center; margin-bottom: 0px;"><?php // echo $NOFDataSourceRS88003->getData("grade.grade", "Table3"); ?></p>
            </td>
            <td width="103" id="Cell85">
             <p style="text-align: center; margin-bottom: 0px;"><span style="font-size: 14px;"><a target="_self" href="javascript:openpopup_d297('../html/confirm_remove_grading.php?mem=<?php // echo getSESSIONvar('var23'); ?>&grading=<?php // echo $NOFDataSourceRS88003->getEncodedData('grade.grading', 'Table3'); ?>')">Delete</a></span></p>
            </td>
           </tr>
           <?php // $NOFDataSourceRS88003->next("Table3");} ?>
          </table>
         </td>
        </tr>
       </table>
      </td>
      <td colspan="2"></td>
     </tr>
     <tr valign="top" align="left">
      <td colspan="4" height="9"></td>
     </tr>
     <tr valign="top" align="left">
      <td height="242"></td>
      <td colspan="3" width="842">
       <script type="text/javascript">
       <!--
       function __fv1_LayoutRegion4FORM(form) {
       //  var args = {
       // "Date":[["NOF_isValidDate", ['DD/MM/YYYY'], "DD/MM/YYYY format", "", ""]]
       //  };
       //  return NOF_validateForm(form, args, true, null,'Please correct the following errors:');
       }
       //-->
       </script>
       <form name="LayoutRegion4FORM" action="../scripts/indnewgrading.php" method="post" onSubmit="return __fv1_LayoutRegion4FORM(this)">
        <table cellpadding="0" cellspacing="0" border="0" width="652">
         <tr valign="top" align="left">
          <td>
           <table cellpadding="0" cellspacing="0" border="0" width="397">
            <tr valign="top" align="left">
             <td>
              <table border="0" cellspacing="0" cellpadding="0" width="183">
               <tr valign="top" align="left">
                <td width="183" id="Text11" class="TextObject">
                 <p class="label" style="margin-bottom: 0px;">Add Grade Record</p>
                </td>
               </tr>
              </table>
              <table cellpadding="0" cellspacing="0" border="0" width="214">
               <tr valign="top" align="left">
                <td>
                 <table border="0" cellspacing="0" cellpadding="0" width="107">
                  <tr valign="top" align="left">
                   <td height="3" width="6"><img src="../assets/images/autogen/clearpixel.gif" width="6" height="1" border="0" alt=""></td>
                   <td width="101"><img src="../assets/images/autogen/clearpixel.gif" width="101" height="1" border="0" alt=""></td>
                  </tr>
                  <tr valign="top" align="left">
                   <td></td>
                   <td width="101" id="Text12" class="TextObject">
                    <p style="margin-bottom: 0px;">Grading Event</p>
                   </td>
                  </tr>
                 </table>
                </td>
                <td>
                 <table border="0" cellspacing="0" cellpadding="0" width="29">
                  <tr valign="top" align="left">
                   <td height="2" width="2"><img src="../assets/images/autogen/clearpixel.gif" width="2" height="1" border="0" alt=""></td>
                   <td></td>
                  </tr>
                  <tr valign="top" align="left">
                   <td height="24"></td>
                   <td width="27">
                    <select id="ComboBox1" name="ComboBox1" style="height: 24px;" ><?php // $pevents->Move(0);
echo "<option value=0>Select</option>";
echo "<option value=1>Unlisted - Add Details</option>";
// while ( !$pevents->EOF ) {
//    echo "<option value=\"" . $pevents->fields["grading"]. "\" ";
//    if ($pevents->fields["grading"]==$_SESSION['pevent']) echo 'Selected="Selected" ';
//    echo  ">" . $pevents->fields["EVENT"]. "</option>";
//    $pevents->MoveNext();
// }
?>
                    </select>
                   </td>
                  </tr>
                 </table>
                </td>
                <td>
                 <table border="0" cellspacing="0" cellpadding="0" width="78">
                  <tr valign="top" align="left">
                   <td height="3" width="29"><img src="../assets/images/autogen/clearpixel.gif" width="29" height="1" border="0" alt=""></td>
                   <td width="49"><img src="../assets/images/autogen/clearpixel.gif" width="49" height="1" border="0" alt=""></td>
                  </tr>
                  <tr valign="top" align="left">
                   <td></td>
                   <td width="49" id="Text13" class="TextObject">
                    <p style="margin-bottom: 0px;">Grade</p>
                   </td>
                  </tr>
                 </table>
                </td>
               </tr>
              </table>
             </td>
             <td>
              <table border="0" cellspacing="0" cellpadding="0" width="183">
               <tr valign="top" align="left">
                <td height="25" width="9"><img src="../assets/images/autogen/clearpixel.gif" width="9" height="1" border="0" alt=""></td>
                <td></td>
                <td width="21"><img src="../assets/images/autogen/clearpixel.gif" width="21" height="1" border="0" alt=""></td>
                <td></td>
               </tr>
               <tr valign="top" align="left">
                <td height="1"></td>
                <td rowspan="2" width="83">
                 <select id="FormsComboBox1" name="Grade" style="height: 24px;">
                  <option value="Ikkyu" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Ikkyu, ' selected ') ?> >Ikkyu</option>
                  <option value="Shodan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Shodan, ' selected ') ?> >Shodan</option>
                  <option value="Nidan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Nidan, ' selected ') ?> >Nidan</option>
                  <option value="Sandan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Sandan, ' selected ') ?> >Sandan</option>
                  <option value="Yondan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Yondan, ' selected ') ?> >Yondan</option>
                  <option value="Godan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Godan, ' selected ') ?> >Godan</option>
                  <option value="Rokudan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Rokudan, ' selected ') ?> >Rokudan</option>
                  <option value="Nanadan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Nanadan, ' selected ') ?> >Nanadan</option>
                 </select>
                </td>
                <td colspan="2"></td>
               </tr>
               <tr valign="top" align="left">
                <td height="23"></td>
                <td></td>
                <td rowspan="2" width="70"><input type="submit" id="FormsButton7" name="FormsButton7" value="Submit" style="height: 24px; width: 70px;"></td>
               </tr>
               <tr valign="top" align="left">
                <td colspan="3" height="1"></td>
               </tr>
              </table>
             </td>
            </tr>
           </table>
           <table border="0" cellspacing="0" cellpadding="0">
            <tr valign="top" align="left">
             <td height="10" width="10"><img src="../assets/images/autogen/clearpixel.gif" width="10" height="1" border="0" alt=""></td>
             <td></td>
            </tr>
            <tr valign="top" align="left">
             <td></td>
             <td width="476">
              <table id="Table4" border="0" cellspacing="0" cellpadding="0" width="100%" style="height: 148px;">
               <tr style="height: 37px;">
                <td width="110" id="Cell86">
                 <table width="46" border="0" cellspacing="0" cellpadding="0" align="left">
                  <tr>
                   <td class="TextObject Norm14" style="width: 46px;"><label id="FormsFieldLabel1" for="ComboBox1">Bu</label></td>
                  </tr>
                 </table>
                </td>
                <td width="132" id="Cell87">
                 <p style="margin-bottom: 0px;">
                  <select id="ComboBox2" name="Bu" style="height: 24px;">
                   <option value="Kendo">Kendo</option>
                   <option value="Iaido">Iaido</option>
                   <option value="Jodo">Jodo</option>
                  </select>
                 </p>
                </td>
                <td width="234" id="Cell94">
                 <table width="206" border="0" cellspacing="0" cellpadding="0" align="left">
                  <tr>
                   <td class="TextObject" style="width: 206px;">
                    <p style="text-align: center; margin-bottom: 0px;"><span style="color: rgb(255,0,0);"><?php // echo getURLvar("errmsg"); ?></span></p>
                   </td>
                  </tr>
                 </table>
                </td>
               </tr>
               <tr style="height: 37px;">
                <td id="Cell88">
                 <table width="40" border="0" cellspacing="0" cellpadding="0" align="left">
                  <tr>
                   <td class="TextObject" style="width: 40px;"><label id="FormsFieldLabel5" for="FormsEditField1">Date</label></td>
                  </tr>
                 </table>
                </td>
                <td id="Cell89">
                 <p style="margin-bottom: 0px;"><input type="text" id="FormsEditField1" name="Date" size="14" maxlength="14" onChange="__fv1_LayoutRegion4FORM(this.form)" style="white-space: pre; width: 108px;"></p>
                </td>
                <td id="Cell95">
                 <p style="margin-bottom: 0px;">&nbsp;</p>
                </td>
               </tr>
               <tr style="height: 37px;">
                <td id="Cell90">
                 <table width="53" border="0" cellspacing="0" cellpadding="0" align="left">
                  <tr>
                   <td class="TextObject" style="width: 53px;"><label id="FormsFieldLabel6" for="FormsEditField2">Place</label></td>
                  </tr>
                 </table>
                </td>
                <td id="Cell91">
                 <p style="margin-bottom: 0px;"><input type="text" id="FormsEditField2" name="Place" size="14" maxlength="14" onChange="__fv1_LayoutRegion4FORM(this.form)" style="white-space: pre; width: 108px;"></p>
                </td>
                <td id="Cell96">
                 <p style="margin-bottom: 0px;">&nbsp;</p>
                </td>
               </tr>
               <tr style="height: 37px;">
                <td id="Cell92">
                 <table width="96" border="0" cellspacing="0" cellpadding="0" align="left">
                  <tr>
                   <td class="TextObject" style="width: 96px;"><label id="FormsFieldLabel7" for="FormsEditField3">Panel Head</label></td>
                  </tr>
                 </table>
                </td>
                <td id="Cell93">
                 <p style="margin-bottom: 0px;"><input type="text" id="FormsEditField3" name="Head" size="14" maxlength="22" onChange="__fv1_LayoutRegion4FORM(this.form)" style="white-space: pre; width: 108px;"></p>
                </td>
                <td id="Cell97">
                 <p style="margin-bottom: 0px;">&nbsp;</p>
                </td>
               </tr>
              </table>
             </td>
            </tr>
           </table>
          </td>
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="166">
            <tr valign="top" align="left">
             <td height="206" width="148"><img src="../assets/images/autogen/clearpixel.gif" width="148" height="1" border="0" alt=""></td>
             <td></td>
            </tr>
            <tr valign="top" align="left">
             <td height="18"></td>
             <td width="18">
              <div id="Label1LYR"><!-- <img id="Label1" height="18" width="18" src="../assets/images/Label.gif" border="0" alt=""> --><span class="Invisible"><?php // echo $pevents->fields["grading"]; ?></span></div>
             </td>
            </tr>
           </table>
          </td>
         </tr>
        </table>
       </form>
      </td>
     </tr>
    </table>
   </td>
  </tr>
 </table>
</div>
