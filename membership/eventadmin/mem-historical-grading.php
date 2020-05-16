<?php// include_once("../scripts/datasource/recordset.php"); ?>
<?php
    // if (!checkSESSIONstart())
    //     session_start();
    // setSESSIONvar("NOFDataSourceBindingsPath", "binding80955.xml.php");
    // setSESSIONvar("NOFDataSourceConnectionsPath", "connection.xml.php");
    // setSESSIONvar("NOFDataSourceActionPath", "");
    // setSESSIONvar("NOFDataSourceScriptsPath", "../scripts/datasource/");
    // setSESSIONvar("NOFDataSourceRootPath", "../");
    // setSESSIONvar("NOFDataSourceLocale", "en");
    // setSESSIONvar("NOFDataSourcePublishMode", "Debug");
?>
<?php
// session_start();
// include("functions.php");
//
// $num = check_login();
// if ($num != 1 || check_admin('j')!=1){
// //not logged in
// header("Location: my_account.php");
// exit;
// }


?>
<?php
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
//  ?><?php
// $pgradingmembersQuery = "SELECT grade.BKANo AS BKAno,CONCAT_WS(' ',Forename,Surname) AS Name,grade.grade AS awarded, EKFno FROM grade JOIN member on grade.BKANo = member.BKAno LEFT JOIN grading ON grade.grading=grading.grading " . NOF_PrepareSQLParameter($NOF_REQUEST->Session("pgrading"), true) . " GROUP BY grade.BKANo ORDER BY awarded,dob DESC";
// $pgradingmembersSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_pgradingmembers");
// $pgradingmembersSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_pgradingmembers");
// if (!NOF_IsEmpty($pgradingmembersSortOrder)) {
// if (strpos(strtolower($pgradingmembersQuery), "order by") !== false) {
// $pgradingmembersQuery = substr($pgradingmembersQuery, 0, strpos(strtolower($pgradingmembersQuery), "order by"));
// }
// $pgradingmembersQuery .= " ORDER BY " . $pgradingmembersSortOrder . " " . $pgradingmembersSortDir;
// }
// $pgradingmembers = $NOF_DB_CONN->Execute($pgradingmembersQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());
 ?>
 <?php
 // $NOF_StartRow_pgradingmembers_Iterator = "" . $NOF_REQUEST->QueryString("NOF_StartRow_pgradingmembers_Iterator"); if (empty ($NOF_StartRow_pgradingmembers_Iterator)) { $NOF_StartRow_pgradingmembers_Iterator = 1; }$NOF_MaxVisibleRows_pgradingmembers_Iterator = 20; ?>
 <script>
 // window.NOF_RSN_ARRAY['pgradingmembers_Iterator']=new RSNavigator('pgradingmembers_Iterator', <?php // echo $NOF_StartRow_pgradingmembers_Iterator; ?>, <?php // echo $NOF_MaxVisibleRows_pgradingmembers_Iterator; ?>,<?php // echo $pgradingmembers->RecordCount(); ?>);
</script>
 <table cellpadding="0" cellspacing="0" border="0" width="986">
  <tr valign="top" align="left">
   <td>
    <table border="0" cellspacing="0" cellpadding="0" width="172">
     <tr valign="top" align="left">
      <td height="16" width="27"><img src="../assets/images/autogen/clearpixel.gif" width="27" height="1" border="0" alt=""></td>
      <td></td>
     </tr>
     <tr valign="top" align="left">
      <td height="798"></td>
      <td width="145">
      </td>
     </tr>
    </table>
   </td>
   <td>
    <table border="0" cellspacing="0" cellpadding="0" width="814">
     <tr valign="top" align="left">
      <td width="23" style="height:1px"><img src="../assets/images/autogen/clearpixel.gif" width="23" height="1" border="0" alt=""></td>
      <td width="17" style="height:1px"><img src="../assets/images/autogen/clearpixel.gif" width="17" height="1" border="0" alt=""></td>
      <td width="1" style="height:1px"><img src="../assets/images/autogen/clearpixel.gif" width="1" height="1" border="0" alt=""></td>
      <td width="773" style="height:1px"><img src="../assets/images/autogen/clearpixel.gif" width="773" height="1" border="0" alt=""></td>
     </tr>
     <tr valign="top" align="left">
      <td height="18"></td>
      <td colspan="2" width="18"><!-- <img id="Connector1" height="18" width="18" src="../assets/images/Connector.gif" border="0" alt=""> --></td>
      <td></td>
     </tr>
     <tr valign="top" align="left">
      <td colspan="2" height="162"></td>
      <td colspan="2" width="774">
       <form name="LayoutRegion1FORM" action="../scripts/pastgrading.php" method="post">
        <input type="hidden" id="dummy" name="dummy" value="<?php // echo getSESSIONvar("varerr"); ?>">
        <table cellpadding="0" cellspacing="0" border="0" width="478">
         <tr valign="top" align="left">
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="121">
            <tr valign="top" align="left">
             <td width="121" id="Text1" class="TextObject">
              <p style="margin-bottom: 0px;">Select Grading</p>
             </td>
            </tr>
           </table>
          </td>
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="357">
            <tr valign="top" align="left">
             <td height="24" width="7"><img src="../assets/images/autogen/clearpixel.gif" width="7" height="1" border="0" alt=""></td>
             <td width="27">
              <select id="ComboBox1" name="ComboBox1" style="height: 24px;" ><?php // $pevents->Move(0);
echo "<option value=0>Select</option>";
// while ( !$pevents->EOF ) {
// 		echo "<option value=\"" . $pevents->fields["grading"]. "\" ";
// 		if ($pevents->fields["grading"]==$_SESSION[pevent]) echo 'Selected="Selected" ';
// 		echo  ">" . $pevents->fields["EVENT"]. "</option>";
// 		$pevents->MoveNext();
// }
?>
              </select>
             </td>
             <td width="1"><img src="../assets/images/autogen/clearpixel.gif" width="1" height="1" border="0" alt=""></td>
             <td width="55"><input type="submit" id="FormsButton1" name="Action" value="Load" style="height: 24px; width: 55px;"></td>
             <td width="201"><img src="../assets/images/autogen/clearpixel.gif" width="201" height="1" border="0" alt=""></td>
             <td width="66"><input type="submit" id="FormsButton3" name="Action" value="Export" style="height: 24px; width: 66px;"></td>
            </tr>
           </table>
          </td>
         </tr>
        </table>
        <table cellpadding="0" cellspacing="0" border="0" width="651">
         <tr valign="top" align="left">
          <td>
           <table border="0" cellspacing="0" cellpadding="0" width="18">
            <tr valign="top" align="left">
             <td height="5"></td>
            </tr>
            <tr valign="top" align="left">
             <td height="18" width="18"><!-- <img id="Conditions3" height="18" width="18" src="../assets/images/If.gif" border="0" alt=""> --><?php // if ( ( !NOF_IsEmpty ($NOF_REQUEST->Session("pevent"))) ) { ?></td>
            </tr>
           </table>
          </td>
          <td>
           <table border="0" cellspacing="0" cellpadding="0">
            <tr valign="top" align="left">
             <td height="16" width="1"><img src="../assets/images/autogen/clearpixel.gif" width="1" height="1" border="0" alt=""></td>
             <td></td>
            </tr>
            <tr valign="top" align="left">
             <td></td>
             <td width="632">
              <table id="Table1" border="1" cellspacing="0" cellpadding="0" width="100%" style="height: 32px;">
               <tr style="height: 28px;">
                <th width="78" id="Cell1">
                 <p class="label" style="margin-bottom: 0px;">BKA no</p>
                </th>
                <th width="278" id="Cell2">
                 <p class="label" style="margin-bottom: 0px;">Name</p>
                </th>
                <th width="123" id="Cell13">
                 <p class="label" style="margin-bottom: 0px;">EKF No</p>
                </th>
                <th width="143" id="Cell5">
                 <p class="label" style="margin-bottom: 0px;">Awarded</p>
                </th>
               </tr>
              </table>
             </td>
            </tr>
           </table>
          </td>
         </tr>
        </table>
        <table border="0" cellspacing="0" cellpadding="0" width="38">
         <tr valign="top" align="left">
          <td height="1" width="20"><img src="../assets/images/autogen/clearpixel.gif" width="20" height="1" border="0" alt=""></td>
          <td></td>
         </tr>
         <tr valign="top" align="left">
          <td height="18"></td>
          <td width="18"><!-- <img id="Iterator2" height="18" width="18" src="../assets/images/RecordSetIterator.gif" border="0" alt=""> --><?php // $currentIterator = &$pgradingmembers; $pgradingmembers->Move($NOF_StartRow_pgradingmembers_Iterator - 1);$NOF_IterCounter_pgradingmembers_Iterator = 0; while (!$pgradingmembers->EOF && $NOF_IterCounter_pgradingmembers_Iterator++ < $NOF_MaxVisibleRows_pgradingmembers_Iterator) { ?></td>
         </tr>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
         <tr valign="top" align="left">
          <td width="20" style="height:1px"><img src="../assets/images/autogen/clearpixel.gif" width="20" height="1" border="0" alt=""></td>
          <td width="2" style="height:1px"><img src="../assets/images/autogen/clearpixel.gif" width="2" height="1" border="0" alt=""></td>
          <td style="height:1px"><img src="../assets/images/autogen/clearpixel.gif" width="18" height="1" border="0" alt=""></td>
          <td width="615" style="height:1px"><img src="../assets/images/autogen/clearpixel.gif" width="615" height="1" border="0" alt=""></td>
         </tr>
         <tr valign="top" align="left">
          <td height="13"></td>
          <td colspan="3" rowspan="2" width="635">
           <table id="Table2" border="0" cellspacing="0" cellpadding="0" width="100%" style="height: 23px;">
            <tr style="height: 28px;">
             <td width="96" id="Cell22">
              <p class="Norm" style="margin-bottom: 0px;"><?php // echo $pgradingmembers->fields['BKAno'] ?>&nbsp;</p>
             </td>
             <td width="276" id="Cell23">
              <p class="Norm" style="margin-bottom: 0px;"><?php // echo $pgradingmembers->fields['Name'] ?>&nbsp;</p>
             </td>
             <td width="128" id="Cell24">
              <p class="Norm" style="margin-bottom: 0px;"><?php // echo $pgradingmembers->fields['EKFno'] ?>&nbsp;</p>
             </td>
             <td width="135" id="Cell27">
              <p class="Norm" style="margin-bottom: 0px;"><?php // echo $pgradingmembers->fields['awarded'] ?>&nbsp;</p>
             </td>
            </tr>
           </table>
          </td>
         </tr>
         <tr valign="top" align="left">
          <td height="15"></td>
          <td rowspan="2" width="18"><!-- <img id="Iterator1" height="18" width="18" src="../assets/images/RecordSetIterator.gif" border="0" alt=""> --><?php // $currentIterator->MoveNext();} ?></td>
         </tr>
         <tr valign="top" align="left">
          <td colspan="2" height="3"></td>
          <td></td>
         </tr>
        </table>
        <table border="0" cellspacing="0" cellpadding="0" width="144">
         <tr valign="top" align="left">
          <td height="9" width="6"><img src="../assets/images/autogen/clearpixel.gif" width="6" height="1" border="0" alt=""></td>
          <td></td>
          <td width="51"><img src="../assets/images/autogen/clearpixel.gif" width="51" height="1" border="0" alt=""></td>
          <td></td>
          <td width="33"><img src="../assets/images/autogen/clearpixel.gif" width="33" height="1" border="0" alt=""></td>
          <td></td>
         </tr>
         <tr valign="top" align="left">
          <td colspan="3" height="12"></td>
          <td rowspan="2" width="18"><!-- <img id="Navigator1" height="18" width="18" src="../assets/images/RecordSetNavigator.gif" border="0" alt=""> --><table border="0" cellpadding="0" cellspacing="10"><tr><td nowrap><a href="javascript: GetRSN('pgradingmembers_Iterator').First();" target="_self"><font face="Arial" size="-1">|<</font></a></td><td nowrap><a href="javascript: GetRSN('pgradingmembers_Iterator').Previous();" target="_self"><font face="Arial" size="-1"><</font></a></td><td nowrap><a href="javascript: GetRSN('pgradingmembers_Iterator').Next();" target="_self"><font face="Arial" size="-1">></font></a></td><td nowrap><a href="javascript: GetRSN('pgradingmembers_Iterator').Last();" target="_self"><font face="Arial" size="-1">>|</font></a></td></tr></table></td>
          <td></td>
          <td rowspan="2" width="18"><!-- <img id="Label1" height="18" width="18" src="../assets/images/Label.gif" border="0" alt=""> --><span class="Invisible"><?php // echo $pevents->fields["grading"]; ?></span></td>
         </tr>
         <tr valign="top" align="left">
          <td height="6"></td>
          <td rowspan="2" width="18"><!-- <img id="Conditions1" height="18" width="18" src="../assets/images/If.gif" border="0" alt=""> --><?php // } ?></td>
          <td></td>
          <td></td>
         </tr>
         <tr valign="top" align="left">
          <td height="12"></td>
          <td colspan="4"></td>
         </tr>
        </table>
       </form>
      </td>
     </tr>
    </table>
   </td>
  </tr>
 </table>
