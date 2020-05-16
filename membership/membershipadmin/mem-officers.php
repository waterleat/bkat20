<?php
// include("functions.php");

// $num = check_login();
// if ($num != 1 || check_admin('x')!=1){
// //not logged in
// header("Location: my_account.php");
// exit;
// }
$table_member = 'mem_member';
$table_register = 'mem_register';

?>
<?php
$amemberQuery = "SELECT r.BKAno AS no,CONCAT_WS(' ',Forename,Surname) AS name,INSTR(AES_DECRYPT(confirm,user),'j')>0 AS expr1,INSTR(AES_DECRYPT(confirm,user),'x')>0 AS expr2 FROM $table_register r JOIN $table_member m ON r.BKAno=m.BKAno WHERE INSTR(AES_DECRYPT(confirm,user),'j')>0 OR INSTR(AES_DECRYPT(confirm,user),'x')>0";
// $amemberSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_amember");
// $amemberSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_amember");
// if (!NOF_IsEmpty($amemberSortOrder)) {
// if (strpos(strtolower($amemberQuery), "order by") !== false) {
// $amemberQuery = substr($amemberQuery, 0, strpos(strtolower($amemberQuery), "order by"));
// }
// $amemberQuery .= " ORDER BY " . $amemberSortOrder . " " . $amemberSortDir;
// }
// $amember = $NOF_DB_CONN->Execute($amemberQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());
$members = $wpdb->get_results($amemberQuery,ARRAY_A);
// var_dump($members);
 ?>

 <?php // $NOF_StartRow_amember_Iterator = "" . $NOF_REQUEST->QueryString("NOF_StartRow_amember_Iterator"); if (empty ($NOF_StartRow_amember_Iterator)) { $NOF_StartRow_amember_Iterator = 1; }$NOF_MaxVisibleRows_amember_Iterator = 25; ?>
 <script>
 // window.NOF_RSN_ARRAY['amember_Iterator']=new RSNavigator('amember_Iterator', <?php // echo $NOF_StartRow_amember_Iterator; ?>, <?php // echo $NOF_MaxVisibleRows_amember_Iterator; ?>,<?php // echo $amember->RecordCount(); ?>);</script>
 <form name="LAYOUTFORM" action="" method="post">
  <table cellpadding="0" cellspacing="0" border="0" width="671">
   <tr valign="top" align="left">
    <td>
     <table border="0" cellspacing="0" cellpadding="0" width="213">
      <tr valign="top" align="left">
       <td height="16" width="27"><img src="../assets/images/autogen/clearpixel.gif" width="27" height="1" border="0" alt=""></td>
       <td></td>
       <td width="23"><img src="../assets/images/autogen/clearpixel.gif" width="23" height="1" border="0" alt=""></td>
       <td rowspan="2" width="18"><!-- <img id="Connector1" height="18" width="18" src="../assets/images/Connector.gif" border="0" alt=""> --></td>
      </tr>
      <tr valign="top" align="left">
       <td height="2"></td>
       <td rowspan="2" width="145">
       </td>
       <td></td>
      </tr>
      <tr valign="top" align="left">
       <td height="796"></td>
       <td colspan="2"></td>
      </tr>
     </table>
    </td>
    <td>
     <table border="0" cellspacing="0" cellpadding="0">
      <tr valign="top" align="left">
       <td height="34" width="4"><img src="../assets/images/autogen/clearpixel.gif" width="4" height="1" border="0" alt=""></td>
       <td></td>
      </tr>
      <tr valign="top" align="left">
       <td></td>
       <td width="454">
        <table id="Table1" border="0" cellspacing="0" cellpadding="0" width="100%" style="height: 48px;">
         <tr style="height: 28px;">
          <td width="62" id="Cell1">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td width="114" id="Cell2">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td width="50" id="Cell5">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td width="74" id="Cell6">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td width="45" id="Cell7">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td width="45" id="Cell8">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td width="64" id="Cell9">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
         </tr>
         <tr style="height: 28px;">
          <td id="Cell10">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td id="Cell11">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td id="Cell14">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td id="Cell15">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td id="Cell16">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td id="Cell17">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
          <td id="Cell18">
           <p style="margin-bottom: 0px;">&nbsp;</p>
          </td>
         </tr>
        </table>
       </td>
      </tr>
     </table>
     <table border="0" cellspacing="0" cellpadding="0" width="22">
      <tr valign="top" align="left">
       <td height="1" width="4"><img src="../assets/images/autogen/clearpixel.gif" width="4" height="1" border="0" alt=""></td>
       <td></td>
      </tr>
      <tr valign="top" align="left">
       <td height="18"></td>
       <td width="18"><!-- <img id="Iterator1" height="18" width="18" src="../assets/images/RecordSetIterator.gif" border="0" alt=""> --><?php // $currentIterator = &$amember; $amember->Move($NOF_StartRow_amember_Iterator - 1);$NOF_IterCounter_amember_Iterator = 0; while (!$amember->EOF && $NOF_IterCounter_amember_Iterator++ < $NOF_MaxVisibleRows_amember_Iterator) {
         foreach ($members as $amember) {

         ?></td>
      </tr>
     </table>
     <table border="0" cellspacing="0" cellpadding="0">
      <tr valign="top" align="left">
       <td height="4" width="4"><img src="../assets/images/autogen/clearpixel.gif" width="4" height="1" border="0" alt=""></td>
       <td></td>
       <td width="435"><img src="../assets/images/autogen/clearpixel.gif" width="435" height="1" border="0" alt=""></td>
      </tr>
      <tr valign="top" align="left">
       <td height="25"></td>
       <td colspan="2" rowspan="2" width="453">
        <table id="Table2" border="0" cellspacing="0" cellpadding="0" width="100%" style="height: 23px;">
         <tr style="height: 28px;">
          <td width="59" id="Cell26">
           <p style="margin-bottom: 0px;"><?php  echo $amember['no'] ?>&nbsp;</p>
          </td>
          <td width="320" id="Cell27">
           <p style="margin-bottom: 0px;"><?php  echo $amember['name'] ?>&nbsp;</p>
          </td>
          <td width="41" id="Cell31">
           <p style="margin-bottom: 0px;">
             <input type="checkbox" id="FormsCheckbox4" name="FormsCheckbox2"   <?php if ($amember['expr1']) echo "checked='checked'" ?>  style="height: 13px; width: 13px;">&nbsp;</p>
          </td>
          <td width="33" id="Cell32">
           <p style="margin-bottom: 0px;"><input type="checkbox" id="FormsCheckbox5" name="FormsCheckbox3"   <?php if ($amember['expr2']) echo "checked='checked'" ?>  style="height: 13px; width: 13px;">&nbsp;</p>
          </td>
         </tr>
        </table>
       </td>
      </tr>
      <tr valign="top" align="left">
       <td height="3"></td>
       <td rowspan="2" width="18"><!-- <img id="Iterator2" height="18" width="18" src="../assets/images/RecordSetIterator.gif" border="0" alt=""> --><?php // $currentIterator->MoveNext();}
       }?></td>
      </tr>
      <tr valign="top" align="left">
       <td height="15"></td>
       <td></td>
      </tr>
     </table>
     <table border="0" cellspacing="0" cellpadding="0" width="451">
      <tr valign="top" align="left">
       <td height="14" width="360"><img src="../assets/images/autogen/clearpixel.gif" width="360" height="1" border="0" alt=""></td>
       <td width="91"><img src="../assets/images/autogen/clearpixel.gif" width="91" height="1" border="0" alt=""></td>
      </tr>
      <tr valign="top" align="left">
       <td></td>
       <td width="91" id="Text1" class="TextObject">
        <p class="Invisible" style="margin-bottom: 0px;"><?php // echo getSESSIONvar("BKANo"); ?></p>
       </td>
      </tr>
     </table>
    </td>
   </tr>
  </table>
 </form>
