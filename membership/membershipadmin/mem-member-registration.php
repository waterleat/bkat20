<?php
// check login admin

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
<table border="0" cellspacing="0" cellpadding="0" width="734">
 <tr valign="top" align="left">
  <td height="221" width="23"><img src="../assets/images/autogen/clearpixel.gif" width="23" height="1" border="0" alt=""></td>
  <td width="711">
   <form name="LayoutRegion3FORM" action="../scripts/memberregistration.php" method="post">
    <table cellpadding="0" cellspacing="0" border="0" width="650">
     <tr valign="top" align="left">
      <td>
       <table border="0" cellspacing="0" cellpadding="0" width="359">
        <tr valign="top" align="left">
         <td width="359" id="Text3" class="TextObject label" style="background-color: rgb(192,192,192);">
          <p style="text-align: center; margin-bottom: 0px;"><span style="font-size: 22px;">Member Registration Details</span></p>
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
            <option value="member_BKAno" <?php echo checkSelected3(getSESSIONvar("criteria"), member_BKAno, ' selected ') ?> >BKA No</option>
            <option value="member_Surname" <?php echo checkSelected3(getSESSIONvar("criteria"), member_Surname, ' selected ') ?> >Surname</option>
            <option value="register_User" <?php echo checkSelected3(getSESSIONvar("criteria"), register_User, ' selected ') ?> >Username</option>
            <option value="register_Email" <?php echo checkSelected3(getSESSIONvar("criteria"), register_Email, ' selected ') ?> >Email</option>
           </select>
           <input type="text" id="FormsEditField25" name="searchvalue" size="14" maxlength="14" style="white-space: pre; width: 108px;" value="<?php echo $_SESSION[searchvalue] ?>"><input type="submit" id="FormsButton6" name="Submit" value="Search" style="height: 24px; width: 73px;"></p>
         </td>
        </tr>
       </table>
      </td>
     </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" width="580">
     <tr valign="top" align="left">
      <td>
       <table border="0" cellspacing="0" cellpadding="0" width="107">
        <tr valign="top" align="left">
         <td height="11" width="10"><img src="../assets/images/autogen/clearpixel.gif" width="10" height="1" border="0" alt=""></td>
         <td width="2"><img src="../assets/images/autogen/clearpixel.gif" width="2" height="1" border="0" alt=""></td>
         <td width="74"><img src="../assets/images/autogen/clearpixel.gif" width="74" height="1" border="0" alt=""></td>
         <td width="20"><img src="../assets/images/autogen/clearpixel.gif" width="20" height="1" border="0" alt=""></td>
         <td width="1"><img src="../assets/images/autogen/clearpixel.gif" width="1" height="1" border="0" alt=""></td>
        </tr>
        <tr valign="top" align="left">
         <td height="25"></td>
         <td colspan="3" width="96" id="FormsFieldLabel31LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel31">Member No.</label></td>
         <td></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="5" height="2"></td>
        </tr>
        <tr valign="top" align="left">
         <td height="25"></td>
         <td colspan="2" width="76" id="FormsFieldLabel17LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel17">Name</label></td>
         <td colspan="2"></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="5" height="6"></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="2" height="25"></td>
         <td colspan="3" width="95" id="FormsFieldLabel38LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel38">Confirmed</label></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="5" height="2"></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="2" height="25"></td>
         <td colspan="3" width="95" id="FormsFieldLabel39LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel39">Guest</label></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="5" height="3"></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="2" height="25"></td>
         <td colspan="3" width="95" id="FormsFieldLabel40LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel40">PW reset flag</label></td>
        </tr>
       </table>
      </td>
      <td>
       <table cellpadding="0" cellspacing="0" border="0" width="334">
        <tr valign="top" align="left">
         <td>
          <table border="0" cellspacing="0" cellpadding="0" width="142">
           <tr valign="top" align="left">
            <td height="11" width="7"><img src="../assets/images/autogen/clearpixel.gif" width="7" height="1" border="0" alt=""></td>
            <td width="135"><img src="../assets/images/autogen/clearpixel.gif" width="135" height="1" border="0" alt=""></td>
           </tr>
           <tr valign="top" align="left">
            <td></td>
            <td width="135" id="Text14" class="TextObject Norm14">
             <p style="margin-bottom: 0px;"><?php echo $_SESSION[varr2] ?>&nbsp;</p>
            </td>
           </tr>
          </table>
         </td>
         <td>
          <table border="0" cellspacing="0" cellpadding="0" width="192">
           <tr valign="top" align="left">
            <td height="11" width="96"><img src="../assets/images/autogen/clearpixel.gif" width="96" height="1" border="0" alt=""></td>
            <td width="96"><img src="../assets/images/autogen/clearpixel.gif" width="96" height="1" border="0" alt=""></td>
           </tr>
           <tr valign="top" align="left">
            <td height="25"></td>
            <td width="96" id="FormsFieldLabel37LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel37">Username</label></td>
           </tr>
          </table>
         </td>
        </tr>
       </table>
       <table cellpadding="0" cellspacing="0" border="0" width="333">
        <tr valign="top" align="left">
         <td>
          <table border="0" cellspacing="0" cellpadding="0" width="225">
           <tr valign="top" align="left">
            <td height="2" width="7"><img src="../assets/images/autogen/clearpixel.gif" width="7" height="1" border="0" alt=""></td>
            <td width="218"><img src="../assets/images/autogen/clearpixel.gif" width="218" height="1" border="0" alt=""></td>
           </tr>
           <tr valign="top" align="left">
            <td></td>
            <td width="218" id="Text16" class="TextObject Norm14">
             <p style="margin-bottom: 0px;"><?php echo $_SESSION[varr1] ?>&nbsp;</p>
            </td>
           </tr>
          </table>
         </td>
         <td>
          <table border="0" cellspacing="0" cellpadding="0" width="108">
           <tr valign="top" align="left">
            <td height="3" width="12"><img src="../assets/images/autogen/clearpixel.gif" width="12" height="1" border="0" alt=""></td>
            <td width="96"><img src="../assets/images/autogen/clearpixel.gif" width="96" height="1" border="0" alt=""></td>
           </tr>
           <tr valign="top" align="left">
            <td height="25"></td>
            <td width="96" id="FormsFieldLabel19LYR" class="TextObject" style="border-left-style: none; border-top-style: none; border-right-style: none; border-bottom-style: none;"><label id="FormsFieldLabel19">Email </label></td>
           </tr>
          </table>
         </td>
        </tr>
       </table>
       <table border="0" cellspacing="0" cellpadding="0" width="303">
        <tr valign="top" align="left">
         <td height="3" width="14"><img src="../assets/images/autogen/clearpixel.gif" width="14" height="1" border="0" alt=""></td>
         <td></td>
         <td width="34"><img src="../assets/images/autogen/clearpixel.gif" width="34" height="1" border="0" alt=""></td>
         <td width="1"><img src="../assets/images/autogen/clearpixel.gif" width="1" height="1" border="0" alt=""></td>
         <td></td>
         <td width="80"><img src="../assets/images/autogen/clearpixel.gif" width="80" height="1" border="0" alt=""></td>
         <td width="7"><img src="../assets/images/autogen/clearpixel.gif" width="7" height="1" border="0" alt=""></td>
         <td></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="4" height="6"></td>
         <td rowspan="3" width="76"><input type="submit" id="FormsButton7" name="Submit" value="Confirm" style="height: 24px; width: 76px;"></td>
         <td colspan="3"></td>
        </tr>
        <tr valign="top" align="left">
         <td height="11"></td>
         <td width="11"><?php if ($_SESSION[varr5]==1)  {?><img id="Picture7" height="11" width="11" src="../assets/images/tick.jpg" border="0" alt="tick" title="tick"><?php } else if ($_SESSION[varr5]==0) {?>
<img id="Picture21" height="11" width="11" src="../assets/images/cross.jpg" border="0" alt="cross" title="cross" >
<?php } else { echo $_SESSION[varr5]; } ?></td>
         <td colspan="2"></td>
         <td colspan="3"></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="4" height="7"></td>
         <td colspan="3"></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="8" height="8"></td>
        </tr>
        <tr valign="top" align="left">
         <td height="11"></td>
         <td width="11"><?php if ($_SESSION[varr6]==1)  {?><img id="Picture8" height="11" width="11" src="../assets/images/tick.jpg" border="0" alt="tick" title="tick"><?php } else if ($_SESSION[varr6]==0) {?>
<img id="Picture21" height="11" width="11" src="../assets/images/cross.jpg" border="0" alt="cross" title="cross" >
<?php } else { echo $_SESSION[varr6]; } ?>
</td>
         <td colspan="6"></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="8" height="10"></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="3" height="6"></td>
         <td colspan="3" rowspan="4" width="157"><input type="submit" id="FormsButton8" name="Submit" value="Reset Password" style="height: 24px; width: 157px;"></td>
         <td></td>
         <td rowspan="3" width="80"><input type="text" id="FormsEditField26" name="password" size="10" maxlength="8" style="white-space: pre; width: 76px;" value="<?php if (empty($_SESSION[varr8])) {
echo 'password';
} else {
echo $_SESSION[varr8];
}
?>"></td>
        </tr>
        <tr valign="top" align="left">
         <td height="11"></td>
         <td width="11"><?php if ($_SESSION[varr7]==1)  {?><img id="Picture9" height="11" width="11" src="../assets/images/tick.jpg" border="0" alt="tick" title="tick"><?php } else if ($_SESSION[varr7]==0)  {?>
<img id="Picture21" height="11" width="11" src="../assets/images/cross.jpg" border="0" alt="cross" title="cross" >
<?php } else { echo $_SESSION[varr7]; }?></td>
         <td></td>
         <td></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="3" height="5"></td>
         <td></td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="3" height="2"></td>
         <td colspan="2"></td>
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
          <p style="margin-bottom: 0px;"><?php echo $_SESSION[varr3] ?>&nbsp;</p>
         </td>
        </tr>
        <tr valign="top" align="left">
         <td colspan="2" height="2"></td>
        </tr>
        <tr valign="top" align="left">
         <td></td>
         <td width="135" id="Text18" class="TextObject">
          <p style="margin-bottom: 0px;"><?php echo $_SESSION[varr4] ?>&nbsp;</p>
         </td>
        </tr>
       </table>
      </td>
     </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" width="570">
     <tr valign="top" align="left">
      <td>
       <table border="0" cellspacing="0" cellpadding="0" width="30">
        <tr valign="top" align="left">
         <td height="3" width="12"><img src="../assets/images/autogen/clearpixel.gif" width="12" height="1" border="0" alt=""></td>
         <td></td>
        </tr>
        <tr valign="top" align="left">
         <td height="18"></td>
         <td width="18"><!-- <img id="Connector1" height="18" width="18" src="../assets/images/Connector.gif" border="0" alt=""> --></td>
        </tr>
       </table>
      </td>
      <td>
       <table border="0" cellspacing="0" cellpadding="0" width="540">
        <tr valign="top" align="left">
         <td height="9" width="26"><img src="../assets/images/autogen/clearpixel.gif" width="26" height="1" border="0" alt=""></td>
         <td width="514"><img src="../assets/images/autogen/clearpixel.gif" width="514" height="1" border="0" alt=""></td>
        </tr>
        <tr valign="top" align="left">
         <td></td>
         <td width="514" id="Text8" class="TextObject">
          <p style="text-align: center; margin-bottom: 0px;"><span style="color: rgb(255,0,0);"><?php echo getSESSIONvar("varerr"); ?></span></p>
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
