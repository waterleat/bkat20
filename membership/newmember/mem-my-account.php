<?php // include_once("../scripts/datasource/recordset.php"); ?>
<?php
    // if (!checkSESSIONstart())
    //     session_start();
    // setSESSIONvar("NOFDataSourceBindingsPath", "binding14702.xml.php");
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
// //prevents caching
// header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
// header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
// header("Cache-Control: post-check=0, pre-check=0",false);
// session_cache_limiter();


?>
<?php
// $_SESSION[loginerr]="";
// $id = getURLvar("error");
// if (!empty($id)) {
// 	$_SESSION[loginerr]="Error in Login details provided";
// } else {
// 	$_SESSION[loginerr]="";
// }
// $_SESSION['Errormsg']=" ";
// $_SESSION[varerr]="";
// $_SESSION['dojoregion']=0;
// $_SESSION['dojokendo']=0;
// $_SESSION['dojoiaido']=0;
// $_SESSION['dojojodo']=0;
// $_SESSION['dojofilter']="";
?>
<style>
/* body { margin:0px; width: 742px; }
div#LayoutLYR { float:left; position:absolute; }
div#NavigationBar3LYR { position:absolute; top:15px; left:12px; width:145px; height:171px; z-index:1 }
div#FormsEditField1LYR { position:absolute; top:71px; left:339px; width:136px; height:22px; z-index:2 }
div#FormsFieldLabel1LYR { position:absolute; top:71px; left:241px; width:91px; height:25px; z-index:3 }
div#FormsFieldLabel2LYR { position:absolute; top:99px; left:241px; width:91px; height:25px; z-index:4 }
div#FormsEditField2LYR { position:absolute; top:99px; left:339px; width:136px; height:22px; z-index:5 }
div#Text2LYR { position:absolute; top:187px; left:290px; width:148px; height:25px; z-index:6 }
div#Text3LYR { position:absolute; top:37px; left:240px; width:235px; height:25px; z-index:7 }
div#Text4LYR { position:absolute; top:211px; left:290px; width:149px; height:25px; z-index:8 }
div#Text5LYR { position:absolute; top:145px; left:513px; width:196px; height:75px; z-index:9 }
div#FormsButton1LYR { position:absolute; top:127px; left:417px; width:58px; height:24px; z-index:10 }
div#Text6LYR { position:absolute; top:69px; left:515px; width:193px; height:50px; z-index:11 }
div#Text13LYR { position:absolute; top:162px; left:240px; width:235px; height:25px; z-index:12 }
div#Text14LYR { position:absolute; top:400px; left:438px; width:97px; height:21px; z-index:13 }
div#Text15LYR { position:absolute; top:323px; left:240px; width:398px; height:50px; z-index:14 }
div#Text16LYR { position:absolute; top:408px; left:583px; width:25px; height:25px; z-index:15 } */

</style>


 <div id="LayoutLYR">
  <form name="LAYOUTFORM" enctype="application/x-www-form-urlencoded" action="../scripts/Readuser.php" method="post">
   <div id="FormsEditField1LYR"><input type="text" id="FormsEditField1" name="user_name" size="17" maxlength="19" style="white-space: pre; width: 132px;"></div>
   <div id="FormsFieldLabel1LYR"><label id="FormsFieldLabel1"><b><span style="font-weight: bold;">Username</span></b></label></div>
   <div id="FormsFieldLabel2LYR"><label id="FormsFieldLabel2"><b><span style="font-weight: bold;">Password</span></b></label></div>
   <div id="FormsEditField2LYR"><input type="password" id="FormsEditField2" name="password" style="white-space: pre; width: 132px;"></div>
   <div id="Text2LYR" class="TextObject label">
    <p style="margin-bottom: 0px;"><a href="../html/get_password.php">Forgotten Password</a></p>
   </div>
   <div id="Text3LYR" class="TextObject label" style="text-align: center;">
    <p style="margin-bottom: 0px;">Existing Members</p>
   </div>
   <div id="Text4LYR" class="TextObject label">
    <p style="margin-bottom: 0px;"><a href="../html/get_username.php">Forgotten Username</a></p>
   </div>
   <div id="Text5LYR" class="TextObject label">
    <p style="text-align: center; margin-bottom: 0px;">Existing Members who have a BKA number but do not have a log in <a href="../html/register.php">Register Here</a></p>
   </div>
   <div id="FormsButton1LYR"><input type="submit" id="FormsButton1" name="FormsButton1" class="label" value="Login" style="height: 24px; width: 58px;"></div>
   <div id="Text6LYR" class="TextObject label">
    <p style="text-align: center; margin-bottom: 0px;"><a href="../html/new_member_register.php">New BKA</a> Members&nbsp; <a href="../html/new_member_register.php">Register &amp; Join Here</a></p>
   </div>
   <div id="Text13LYR" class="TextObject">
    <p style="text-align: center; margin-bottom: 0px;"><span style="color: rgb(255,0,0);"><?php // echo $_SESSION['loginerr']; ?></span>&nbsp;</p>
   </div>
   <div id="Text14LYR" class="TextObject Invisible">
    <p style="margin-bottom: 0px;"><?php // echo getURLvar("error"); ?></p>
   </div>
   <div id="Text15LYR" class="TextObject label"><?php
// if ($_SESSION['redirect']=="book_events.php") {
?>
    <p style="text-align: center; margin-bottom: 0px;"><a href="../html/guest_member_register.php">Members of non-UK EKF/IKF Affiliated organisations requiring to book BKA events Register Here</a></p>

<?php // } ?></div>
   <div id="Text16LYR" class="TextObject">
    <p style="margin-bottom: 0px;">&nbsp;</p>
   </div>
   <div id="NavigationBar3LYR" style="z-index: 1000">
    <ul id="NavigationBar3" style="z-index: 1000; display: none;">
     <li id="NavigationButton1"><a href="../html/dojo_listing.php" title="Dojo Listing">Dojo Listing</a></li>
     <li id="NavigationButton2"><a href="../html/new_member_register.php" title="New Member Register">New Member Register</a></li>
     <li id="NavigationButton3"><a href="../html/register.php" title="Existing BKA Member Register">Existing BKA Member Register</a></li>
    </ul>
   </div>
  </form>
 </div>
