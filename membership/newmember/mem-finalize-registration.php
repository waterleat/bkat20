<?php
$p=$_GET['a'];

$myfunc = new Inc\Base\MemberController;
$confirmed = $myfunc->confirmed($p);
?>


       <!-- <table id="NavigationBar3" border="0" cellspacing="0" cellpadding="0" width="145">
        <tr valign="top" align="left">
         <td width="145" height="57"><a href="../html/register.php" class="nof-navButtonAnchor" onmouseover="F_loadRollover('NavigationButton1','',0);F_roll('NavigationButton1',1)" onmouseout="F_roll('NavigationButton1',0)"><img id="NavigationButton1" name="NavigationButton1" height="57" width="145" src="../assets/images/autogen/Existing-BKA--Member-Register_Np_regular.png" onmouseover="F_loadRollover(this,'Existing-BKA--Member-Register_NRp_regularOver.png',0)" border="0" alt="Existing BKA Member Register" title="Existing BKA Member Register"></a></td>
        </tr>
        <tr valign="top" align="left">
         <td width="145" height="57"><a href="../html/new_member_register.php" class="nof-navButtonAnchor" onmouseover="F_loadRollover('NavigationButton2','',0);F_roll('NavigationButton2',1)" onmouseout="F_roll('NavigationButton2',0)"><img id="NavigationButton2" name="NavigationButton2" height="57" width="145" src="../assets/images/autogen/New-Member---Register_Np_regular.png" onmouseover="F_loadRollover(this,'New-Member---Register_NRp_regularOver.png',0)" border="0" alt="New Member Register" title="New Member Register"></a></td>
        </tr>
        <tr valign="top" align="left">
         <td width="145" height="57"><a href="../html/my_account.php" class="nof-navButtonAnchor" onmouseover="F_loadRollover('NavigationButton3','',0);F_roll('NavigationButton3',1)" onmouseout="F_roll('NavigationButton3',0)"><img id="NavigationButton3" name="NavigationButton3" height="57" width="145" src="../assets/images/autogen/My-Account_Np_regular.png" onmouseover="F_loadRollover(this,'My-Account_NRp_regularOver.png',0)" border="0" alt="My Account" title="My Account"></a></td>
        </tr>
       </table> -->
      <?php if ( ($confirmed >= "0") ) { ?>

       <p >Registration complete.&nbsp; Thank you.</p>
       <p>Next step is to login and provide some personal details.</p>
       <form name="LAYOUTFORM" enctype="application/x-www-form-urlencoded" action="../scripts/Readuser.php" method="post">
         <div class="flex pl-16">
           <label id="FormsFieldLabel1" class="w-32 font-bold">Username</label>
           <input type="text" id="FormsEditField1" name="user_name" size="17" maxlength="19" >
         </div>
         <div class="flex pl-16">
           <label id="FormsFieldLabel2" class="w-32 font-bold">Password</label>
           <input type="password" id="FormsEditField2" name="password" >
         </div>
         <div class="flex justify-around">
           <input type="button" id="" class="btn btn-blue cursor-pointer" name="" value="Cancel">
           <input type="submit" id="" class="btn btn-blue cursor-pointer" name="" value="Login">
         </div>
       <p style="margin-bottom: 0px;"><a href="../html/my_account.php">Login</a></p>

      <?php } else { ?>

       <p>Unable to validate registration. Please try again.</p>
       <p >If this condition continues please contact the administrator.</p>

      <p><a href="../html/register.php">Try Again</a></p>

    <?php } ?>
         <!-- <td width="31" id="Text5" class="TextObject Invisible" style="font-size: 9px; color: rgb(255,255,255); background-color: transparent;">
          <p class="Invisible" style="margin-bottom: 0px;"><?php // echo getURLvar("a"); ?><span class="Invisible"><span style="font-size: 9px;"></span></span><?php // echo $_POST['a']; ?></p>
         </td> -->
