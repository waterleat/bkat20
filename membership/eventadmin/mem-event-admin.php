<?php
/**
 * Detect plugin. For use on Front End only.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// check for plugin using plugin name
if (! is_plugin_active( 'bka2019ds/bka2019ds-plugin.php' ) ) {
    //plugin is not activated
    wp_redirect( esc_url( home_url( '/' ) ), 307 );
}
// session_start();
// include("functions.php");

// $num = check_login();
// if ($num != 1 || check_admin('j')!=1){
//   //not logged in
//   header("Location: my_account.php");
//   exit;
// }
$table_event = 'mem_event';
$table_ticket = 'mem_ticket';

$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

$bookeventsallQuery = "SELECT eventid,e.date,title,eventtype,bu,grading,gradingclose,gradingto,DATEDIFF(gradingclose,CURDATE()) AS GRADINGOPEN,DATE_FORMAT(gradingclose,'%d-%m-%Y') AS GDATE,DATE_FORMAT(e.date,'%d-%m-%Y') AS EDATE,display,DATEDIFF(date,CURDATE()) AS FUTURE FROM $table_event e ORDER BY e.date DESC";
$bookeventsall = $mydb->get_results($bookeventsallQuery, ARRAY_A);


$ticketsQuery = "SELECT eventid,ticketid, CONCAT(description,' GBP',price) AS DESCRIP,enddate,selection,number FROM $table_ticket ORDER BY price DESC";
$tickets = $mydb->get_results($ticketsQuery, ARRAY_A);
// $ticketsSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_tickets");
// $ticketsSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_tickets");
// if (!NOF_IsEmpty($ticketsSortOrder)) {
// if (strpos(strtolower($ticketsQuery), "order by") !== false) {
// $ticketsQuery = substr($ticketsQuery, 0, strpos(strtolower($ticketsQuery), "order by"));
// }
// $ticketsQuery .= " ORDER BY " . $ticketsSortOrder . " " . $ticketsSortDir;
// }
// $tickets = $NOF_DB_CONN->Execute($ticketsQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());
 ?><?php
// $eventmembersQuery = "SELECT mem_eventreg.BKANo AS BKAno,CONCAT_WS(' ',Forename,Surname) AS Name,ticketid,transaction,Membershipstatus,mem_eventreg.notes AS eNotes,DATEDIFF(ADDDATE(mem_member.dob,INTERVAL 18 YEAR),CURDATE()) AS JUNIOR FROM mem_eventreg JOIN mem_member on mem_eventreg.BKANo = mem_member.BKAno           ORDER BY ticketid,Surname  ";
// // NOF_PrepareSQLParameter($NOF_REQUEST->Session("pseminar"), true)
//
// $eventmembers = $mydb->get_results($eventmembersQuery, ARRAY_A);

// $eventmembersSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_eventmembers");
// $eventmembersSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_eventmembers");
// if (!NOF_IsEmpty($eventmembersSortOrder)) {
// if (strpos(strtolower($eventmembersQuery), "order by") !== false) {
// $eventmembersQuery = substr($eventmembersQuery, 0, strpos(strtolower($eventmembersQuery), "order by"));
// }
// $eventmembersQuery .= " ORDER BY " . $eventmembersSortOrder . " " . $eventmembersSortDir;
// }
// $eventmembers = $NOF_DB_CONN->Execute($eventmembersQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());
 ?>

<script type="text/javascript">
// function F_doLoaded() {
// 	document.main = new F_cMain();
// 	document.objectModel = new Object();
// 	F_OM('Layout','LayoutLYR', 'doc', '', new Array());
// 	F_OM('FormsButton8' , '', 'btn', 'Layout',new Array(
// 	'Clicked','Layout','Go To URL',F_Parm('URL','../html/add_event.php','Target Frame','This','Other Target',''),0),'LayoutRegion1FORM',0,'FormsButton8');
//
// 	F_pageLoaded('Layout');
// }

</script>


 <?php
 // $NOF_StartRow_eventmembers_Iterator = "" . $NOF_REQUEST->QueryString("NOF_StartRow_eventmembers_Iterator"); if (empty ($NOF_StartRow_eventmembers_Iterator)) { $NOF_StartRow_eventmembers_Iterator = 1; }$NOF_MaxVisibleRows_eventmembers_Iterator = 1000; ?>
 <script>
 // window.NOF_RSN_ARRAY['eventmembers_Iterator']=new RSNavigator('eventmembers_Iterator', <?php // echo $NOF_StartRow_eventmembers_Iterator; ?>, <?php// echo $NOF_MaxVisibleRows_eventmembers_Iterator; ?>,
 <?php // echo $eventmembers->RecordCount(); ?>
</script>

<h2 class="my-0 py-3 bg-gray-400 text-center">Event Administration</h2>

<div class="mb-2">
  <div class="ml-4 sm:ml-8 mt-4">
    <!-- <form id="eventSelect" action="../scripts/admineditevent.php" method="post"> -->
    <form id="adminEventSelect" method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
      <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'admin_event_select_nonce' )?>">
      <div class="flex">
        <h3 class="my-0 w-32">Select Event</h3>

        <select id="EventSelection" name="EventSelection" class="p-1 mr-3" >
          <?php
            // $bookeventsall->Move(0);
            echo "<option value=0>Select</option>";
            foreach ($bookeventsall as $bookevent) {
              echo '<option value="', $bookevent['eventid'], '"';
              // if ($bookeventsall->fields["eventid"]==$_SESSION['seminar']) echo 'Selected="Selected" ';
              echo  ">" . $bookevent["title"];
              if ($bookevent["FUTURE"]<0) {
                echo "(past)";
              } else if ($bookevent["display"]==0) {
                echo " (not online)";
              } else {
                echo " (bookable)";
              }
              echo "</option>";
            }
          ?>
        </select>

        <input type="submit" id="adminEventSelectLoad" name="EventSelection" value="Load" class="btn btn-blue ">
        <input type="button" id="FormsButton8" name="FormsButton8" value="Create/Edit Event" class="btn btn-blue ml-4">
      </div>
    </form>




    <table border="0" cellspacing="0" cellpadding="0" width="1003">
      <tr valign="top" align="left">
       <td height="18"></td>
       <td colspan="4" width="18"><!-- <img id="Connector1" height="18" width="18" src="../assets/images/Connector.gif" border="0" alt=""> --></td>
       <td colspan="4"></td>
      </tr>
      <tr valign="top" align="left">
       <td height="12" width="23"><img src="../assets/images/autogen/clearpixel.gif" width="23" height="1" border="0" alt=""></td>
       <td width="6"><img src="../assets/images/autogen/clearpixel.gif" width="6" height="1" border="0" alt=""></td>
       <td width="1"><img src="../assets/images/autogen/clearpixel.gif" width="1" height="1" border="0" alt=""></td>
       <td width="1"><img src="../assets/images/autogen/clearpixel.gif" width="1" height="1" border="0" alt=""></td>
       <td width="10"><img src="../assets/images/autogen/clearpixel.gif" width="10" height="1" border="0" alt=""></td>
       <td width="8"><img src="../assets/images/autogen/clearpixel.gif" width="8" height="1" border="0" alt=""></td>
       <td width="747"><img src="../assets/images/autogen/clearpixel.gif" width="747" height="1" border="0" alt=""></td>
       <td width="203"><img src="../assets/images/autogen/clearpixel.gif" width="203" height="1" border="0" alt=""></td>
       <td width="4"><img src="../assets/images/autogen/clearpixel.gif" width="4" height="1" border="0" alt=""></td>
      </tr>
      <tr valign="top" align="left">
       <td colspan="4" height="18"></td>
       <td colspan="2" width="18"><!-- <img id="Conditions1" height="18" width="18" src="../assets/images/If.gif" border="0" alt=""> -->
         <?php if (1)
         // if ( ( !NOF_IsEmpty ($NOF_REQUEST->Session("seminar"))) )
         { ?>
       </td>
       <td colspan="3"></td>
      </tr>
      <tr valign="top" align="left">
       <td colspan="9" height="2"></td>
      </tr>
      <tr valign="top" align="left">
       <td colspan="2" height="176"></td>
       <td colspan="6" width="970">
        <form name="LayoutRegion2FORM" action="../scripts/checkeventmember.php" method="post">
         <table border="0" cellspacing="0" cellpadding="0" width="109">
          <tr valign="top" align="left">
           <td width="109" id="Text7" class="TextObject">
            <p class="label" style="margin-bottom: 0px;">Add Applicant</p>
           </td>
          </tr>
         </table>
         <table border="0" cellspacing="0" cellpadding="0">
          <tr valign="top" align="left">
           <td height="1"></td>
          </tr>
          <tr valign="top" align="left">
           <td width="836">
            <table id="Table3" border="1" cellspacing="0" cellpadding="0" width="100%" style="height: 68px;">
             <tr style="height: 34px;">
              <td width="75" id="Cell5">
               <p class="label" style="margin-bottom: 0px;">BKA no</p>
              </td>
              <td align="center" width="103" id="Cell4">
               <p class="label" style="margin-bottom: 0px;">Ticket Required</p>
              </td>
              <td width="137" id="Cell3">
               <p class="label" style="margin-bottom: 0px;">Transaction ID</p>
              </td>
              <td width="104" id="Cell93">
               <p class="label" style="margin-bottom: 0px;">Payment</p>
              </td>
              <td width="190" id="Cell2">
               <p class="label" style="margin-bottom: 0px;">Name</p>
              </td>
              <td width="88" id="Cell1">
               <p class="label" style="margin-bottom: 0px;">Mem Status</p>
              </td>
              <td width="123" id="Cell99">
               <p class="label" style="margin-bottom: 0px;">DoB</p>
              </td>
             </tr>
             <tr style="height: 28px;">
              <td id="Cell29">
               <p class="Norm" style="margin-bottom: 0px;"><input type="text" id="FormsEditField2" name="BKAnum" size="7" maxlength="10" style="white-space: pre; width: 52px;" value="bkanum<?php // echo $_SESSION[result][0] ?>"></p>
              </td>
              <td align="left" id="Cell56">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                 <td align="left">
                  <select id="FormsComboBox1" name="GradeApplied" style="height: 24px;" >
                    <?php
                    echo "<option value=0>Please Select</option>";
                    foreach ($tickets as $ticket) {
                      if ($ticket["eventid"]=='seminar') {
                        echo '<option value="', $ticket['ticketid'], '">', $ticket['DESCRIP'], '</option>';
                      }
                    }
                    // while ( !$tickets->EOF ) {
                    // 		if ($tickets->fields["eventid"]==$_SESSION['seminar']) {
                    // 		echo "<option value=\"" . $tickets->fields["ticketid"]. "\">" . $tickets->fields["DESCRIP"]. "</option>";
                    // 		}
                    // 		$tickets->MoveNext();
                    // }
                    ?>
                  </select>
                 </td>
                </tr>
               </table>
              </td>
              <td align="left" id="Cell85">
               <p style="margin-bottom: 0px;"><input type="text" id="FormsEditField3" name="transaction" size="17" maxlength="20" style="white-space: pre; width: 132px;"></p>
              </td>
              <td id="Cell94">
               <p style="margin-bottom: 0px;">
                <select id="FormsComboBox2" name="paymenttype" style="height: 24px;">
                 <option value="Cash">Cash</option>
                 <option value="Cheque" selected="selected">Cheque</option>
                 <option value="SecureWeb">SecureWeb</option>
                 <option value="CreditCard">CreditCard</option>
                 <option value="Other">Other</option>
                </select>
               </p>
              </td>
              <td id="Cell30">
               <p class="Norm" style="margin-bottom: 0px;">1<?php // echo $_SESSION[result][1] ?></p>
              </td>
              <td id="Cell88">
               <p class="Norm12" style="margin-bottom: 0px;">2<?php // echo $_SESSION[result][2] ?></p>
              </td>
              <td id="Cell100">
               <p class="Norm12" style="margin-bottom: 0px;">3<?php // echo $_SESSION[result][3] ?></p>
              </td>
             </tr>
            </table>
           </td>
          </tr>
         </table>
         <table cellpadding="0" cellspacing="0" border="0" width="722">
          <tr valign="top" align="left">
           <td>
            <table border="0" cellspacing="0" cellpadding="0" width="485">
             <tr valign="top" align="left">
              <td height="4" width="20"><img src="../assets/images/autogen/clearpixel.gif" width="20" height="1" border="0" alt=""></td>
              <td width="58"><img src="../assets/images/autogen/clearpixel.gif" width="58" height="1" border="0" alt=""></td>
              <td></td>
              <td width="114"><img src="../assets/images/autogen/clearpixel.gif" width="114" height="1" border="0" alt=""></td>
              <td></td>
              <td width="44"><img src="../assets/images/autogen/clearpixel.gif" width="44" height="1" border="0" alt=""></td>
             </tr>
             <tr valign="top" align="left">
              <td colspan="4" height="1"></td>
              <td rowspan="2" width="123"><input type="submit" id="FormsButton3" name="Check" value="Add to Event" style="height: 24px; width: 123px;"></td>
              <td></td>
             </tr>
             <tr valign="top" align="left">
              <td colspan="2" height="23"></td>
              <td rowspan="2" width="126"><input type="submit" id="FormsButton4" name="Check" value="Check Status" style="height: 24px; width: 126px;"></td>
              <td></td>
              <td></td>
             </tr>
             <tr valign="top" align="left">
              <td colspan="2" height="1"></td>
              <td colspan="3"></td>
             </tr>
             <tr valign="top" align="left">
              <td colspan="6" height="6"></td>
             </tr>
             <tr valign="top" align="left">
              <td></td>
              <td colspan="5" width="465" id="Text2" class="TextObject">
               <p style="margin-bottom: 0px;"><span style="color: rgb(255,0,0);">error area<?php // echo $_SESSION[varerr] ?></span></p>
              </td>
             </tr>
            </table>
           </td>
           <td>
            <table border="0" cellspacing="0" cellpadding="0" width="237">
             <tr valign="top" align="left">
              <td height="27" width="188"><img src="../assets/images/autogen/clearpixel.gif" width="188" height="1" border="0" alt=""></td>
              <td></td>
              <td width="13"><img src="../assets/images/autogen/clearpixel.gif" width="13" height="1" border="0" alt=""></td>
              <td></td>
             </tr>
             <tr valign="top" align="left">
              <td height="2"></td>
              <td rowspan="2" width="18"><!-- <img id="Label1" height="18" width="18" src="../assets/images/Label.gif" border="0" alt=""> --><span class="Invisible">number?<?php // echo $tickets->fields["number"]; ?></span></td>
              <td colspan="2"></td>
             </tr>
             <tr valign="top" align="left">
              <td height="16"></td>
              <td></td>
              <td rowspan="2" width="18"><!-- <img id="Label5" height="18" width="18" src="../assets/images/Label.gif" border="0" alt=""> --><span class="Invisible">eventid?<?php // echo $bookeventsall->fields["eventid"]; ?></span></td>
             </tr>
             <tr valign="top" align="left">
              <td colspan="3" height="2"></td>
             </tr>
            </table>
           </td>
          </tr>
         </table>
        </form>
       </td>
      </tr>
    </table>

    <input type="text" id="numApplicants" name="" value="">
    <!-- <input type="text" id="numRegisters" name="" value=""> -->


    <h3 class="my-0" style="margin-bottom: 0px;">Registered Applicants</h3>
    <!-- <form id="adminEventApplicants" method="post" data-url="<?php // echo admin_url('/admin-ajax.php'); ?>">
      <input type="hidden" name="nonce" value="<?php // echo wp_create_nonce( 'admin_event_applicants_nonce' )?>">
      <input type="hidden" id="members" name="members" value="$gradingmembers"> -->

      <table id="applicantsTbl" border="1" cellspacing="0" cellpadding="0" width="100%" style="height: 34px;">
        <tr style="height: 30px;">
          <th class="label">BKA no</th>
          <th class="label">Ticket Type</th>
          <th class="label">Name</th>
          <th class="label">Transaction ID</th>
          <th class="label">Mem Status</th>
          <th class="label">Adult/Jr</th>
          <!-- <th class="label">Cancel</th> -->
          <th class="label">Notes</th>
        </tr>

        <?php // foreach ($eventmembers as $eventmember) { ?>

        <!-- <tr valign="top" align="left">

                  <td width="57" id="Cell38">
                   <p class="Norm"><?php//  echo $eventmember['BKAno'] ?></p>
                  </td>
                  <td width="89" id="Cell39">
                   <p class="Norm"><?php // echo $eventmember['ticketid'] ?></p>
                  </td>
                  <td width="201" id="Cell40">
                   <p class="Norm"><?php // echo $eventmember['Name'] ?></p>
                  </td>
                  <td width="120" id="Cell41">
                   <p class="Norm"><?php // echo $eventmember['transaction'] ?></p>
                  </td>
                  <td width="104" id="Cell90">
                   <p class="Norm12"><?php // echo $eventmember['Membershipstatus'] ?></p>
                  </td>
                  <td width="64" id="Cell96">
                    <p class="Norm12">
                    <?php
                      // if ($eventmember['JUNIOR']>0) {
                      // echo "Junior";
                      // } else {
                      // echo "Adult";
                      // }
                    ?>
                    </p>
                  </td>
                  <td width="55" id="Cell55">
                   <p style="margin-bottom: 0px;"><span style="font-size: 12px;"><a target="_self" href="javascript:openpopup_27b5('../html/remove_event_booking.php?mem=<?php // echo $eventmember['BKAno'].'&ticket='.$eventmember['ticketid'] ?>')">Remove</a></span></p>
                  </td>
                  <td width="282" id="Cell95">
                   <p style="margin-bottom: 0px;">
                     <input type="text" id="FormsEditField4" name="FormsEditField5[]" size="1" maxlength="20" class="Invisible" style="white-space: pre; width: 4px;" value="<?php // echo $eventmember['BKAno'],"=",$eventmember['ticketid'] ?>">
                     <input type="text" id="FormsEditField6" name="FormsEditField4[]" size="33" maxlength="79" class="Norm" style="white-space: pre; width: 260px;" value="<?php // echo $eventmember['eNotes']?>">
                   </p>
                  </td>
                 </tr> -->
      </table>


        <?php // } ?>

        <div class=" flex justify-around">
          <form class="" action="index.html" method="post">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'admin_event_export_applicants_nonce' )?>">
            <input type="hidden" name="eventid" id="exportCsvEventid" value="">
            <input type="submit" id="eventExportCsvBtn" name="FormsButton5" value="Export Data" class="btn btn-blue"></td>
          </form>
          <form  method="post" data-url="<?php  echo admin_url('/admin-ajax.php'); ?>">
            <input type="hidden" name="nonce" value="<?php  echo wp_create_nonce( 'admin_event_applicants_notes_nonce' )?>">
            <input type="hidden" id="" name="eventid" value="">
            <input type="submit" id="FormsButton9" name="FormsButton5" value="Save Notes" class="btn btn-blue"></td>

          </form>
        </div>

      <?php } ?>
  </div>
</div>
