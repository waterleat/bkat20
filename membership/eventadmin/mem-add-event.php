<?php
$table_event = 'mem_event';
$table_grading = 'mem_grading';
$table_gradingprices = 'mem_gradingprices';

$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

$eventsQuery = "SELECT grading,CONCAT_WS(' ',Bu,place,DATE_FORMAT(g.date,'%d-%m-%Y')) AS EVENT FROM $table_grading g WHERE complete = 'No' ORDER BY date ASC ";
$events = $mydb->get_results($eventsQuery, ARRAY_A);
// var_dump($events);

// $EventsSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_Events");
// $EventsSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_Events");
// if (!NOF_IsEmpty($EventsSortOrder)) {
// if (strpos(strtolower($EventsQuery), "order by") !== false) {
// $EventsQuery = substr($EventsQuery, 0, strpos(strtolower($EventsQuery), "order by"));
// }
// $EventsQuery .= " ORDER BY " . $EventsSortOrder . " " . $EventsSortDir;
// }
// $Events = $NOF_DB_CONN->Execute($EventsQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());

$bookeventsallQuery = "SELECT eventid,e.date,title,eventtype,bu,grading,gradingclose,gradingto,DATEDIFF(gradingclose,CURDATE()) AS GRADINGOPEN,DATE_FORMAT(gradingclose,'%d-%m-%Y') AS GDATE,DATE_FORMAT(e.date,'%d-%m-%Y') AS EDATE,display,DATEDIFF(date,CURDATE()) AS FUTURE FROM $table_event e ORDER BY e.date DESC";
$bookeventsall = $mydb->get_results($bookeventsallQuery, ARRAY_A);
// echo '<br>';
// var_dump($bookeventsall);

// $bookeventsallSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_bookeventsall");
// $bookeventsallSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_bookeventsall");
// if (!NOF_IsEmpty($bookeventsallSortOrder)) {
// if (strpos(strtolower($bookeventsallQuery), "order by") !== false) {
// $bookeventsallQuery = substr($bookeventsallQuery, 0, strpos(strtolower($bookeventsallQuery), "order by"));
// }
// $bookeventsallQuery .= " ORDER BY " . $bookeventsallSortOrder . " " . $bookeventsallSortDir;
// }
// $bookeventsall = $NOF_DB_CONN->Execute($bookeventsallQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());

$gradeticketsQuery = "SELECT grade, CONCAT(description,' GBP',price) AS DESCRIP FROM $table_gradingprices";
$gradeTickets = $mydb->get_results($gradeticketsQuery, ARRAY_A);
// echo '<br>';
// var_dump($gradeTickets);

// $gradeticketsSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_gradetickets");
// $gradeticketsSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_gradetickets");
// if (!NOF_IsEmpty($gradeticketsSortOrder)) {
// if (strpos(strtolower($gradeticketsQuery), "order by") !== false) {
// $gradeticketsQuery = substr($gradeticketsQuery, 0, strpos(strtolower($gradeticketsQuery), "order by"));
// }
// $gradeticketsQuery .= " ORDER BY " . $gradeticketsSortOrder . " " . $gradeticketsSortDir;
// }
// $gradetickets = $NOF_DB_CONN->Execute($gradeticketsQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());


// $e = 'I040819';
// $ticketlistQuery = $mydb->prepare("SELECT eventid,ticketid,description,price,DATE_FORMAT(enddate,'%%d-%%m-%%Y') AS AVAIL,selection,number FROM mem_ticket WHERE eventid = %s ORDER BY enddate ASC, ticketid DESC",  $e);
// $ticketlist = $mydb->get_results($ticketlistQuery, ARRAY_A);
// echo '<br>';
// var_dump($ticketlist);

// $ticketlistQuery = "SELECT eventid,ticketid,description,price,DATE_FORMAT(enddate,'%d-%m-%Y') AS AVAIL,selection,number FROM ticket WHERE eventid = " .  NOF_PrepareSQLParameter($NOF_REQUEST->Session("seminar"), false) . " ORDER BY selection ASC";
// $ticketlistSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_ticketlist");
// $ticketlistSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_ticketlist");
// if (!NOF_IsEmpty($ticketlistSortOrder)) {
// if (strpos(strtolower($ticketlistQuery), "order by") !== false) {
// $ticketlistQuery = substr($ticketlistQuery, 0, strpos(strtolower($ticketlistQuery), "order by"));
// }
// $ticketlistQuery .= " ORDER BY " . $ticketlistSortOrder . " " . $ticketlistSortDir;
// }
// $ticketlist = $NOF_DB_CONN->Execute($ticketlistQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());


// $thiseventQuery = $mydb->prepare("SELECT eventid,DATE_FORMAT(e.date,'%%d/%%m/%%Y') AS EDATE,brief,title,eventtype,bu,grading,DATE_FORMAT(gradingclose,'%%d/%%m/%%Y') AS GDATE,gradingto,display,bkaonly FROM mem_event e WHERE eventid = %s", $e);
// $thisevent = $mydb->get_row($thiseventQuery, ARRAY_A);
// // echo '<br>';
// // var_dump($thisevent);

// $thiseventQuery = "SELECT eventid,DATE_FORMAT(event.date,'%d/%m/%Y') AS EDATE,brief,title,eventtype,bu,grading,DATE_FORMAT(gradingclose,'%d/%m/%Y') AS GDATE,gradingto,display,bkaonly FROM event WHERE eventid = " .  NOF_PrepareSQLParameter($NOF_REQUEST->Session("seminar"), false) . "";
// $thiseventSortOrder = $NOF_REQUEST->QueryString("NOF_SORT_ORDER_thisevent");
// $thiseventSortDir = $NOF_REQUEST->QueryString("NOF_SORT_DIR_thisevent");
// if (!NOF_IsEmpty($thiseventSortOrder)) {
// if (strpos(strtolower($thiseventQuery), "order by") !== false) {
// $thiseventQuery = substr($thiseventQuery, 0, strpos(strtolower($thiseventQuery), "order by"));
// }
// $thiseventQuery .= " ORDER BY " . $thiseventSortOrder . " " . $thiseventSortDir;
// }
// $thisevent = $NOF_DB_CONN->Execute($thiseventQuery) or die("Query failed: " . $NOF_DB_CONN->ErrorMsg());


?>


<script type="text/javascript">
// function F_doLoaded() {
// 	document.main = new F_cMain();
// 	document.objectModel = new Object();
// 	F_OM('Layout','LayoutLYR', 'doc', '', new Array());
// 	F_OM('FormsButton12' , '', 'btn', 'Layout',new Array(
// 	'Clicked','Layout','Open Window',F_Parm('name','addpopup','URL','../html/add_ticket.php','width',360,'height',300,'top',300,'left',300,'toolbar','no','menubar','no','location','no','status','no','resizable','no','directories','no','scrollbars','no'),0),'LayoutRegion1FORM',0,'FormsButton12');
//
// 	F_OM('FormsButton9' , '', 'btn', 'Layout',new Array(
// 	'Clicked',F_functFormsButton9Action0,'','',0),'LayoutRegion4FORM',0,'FormsButton9');
//  	F_OM('FormsButton10' , '', 'btn', 'Layout',new Array(
// 	'Clicked','Layout','Open Window',F_Parm('name','eventpop','URL','../html/new_event.php','width',360,'height',300,'top',300,'left',300,'toolbar','no','menubar','no','location','no','status','no','resizable','no','directories','no','scrollbars','no'),0),'LayoutRegion4FORM',0,'FormsButton10');
//  	F_OM('FormsButton11' , '', 'btn', 'Layout',new Array(
// 	'Clicked','Layout','Open Window',F_Parm('name','Purge Event','URL','../html/purge__event.php?desc=<?php // echo urlencode($thissevent['title']); ?>', 'width',360,'height',300,'top',300,'left',300,'toolbar','no','menubar','no','location','no','status','no','resizable','no','directories','no','scrollbars','no'),0),'LayoutRegion4FORM',0,'FormsButton11');
//
// 	F_pageLoaded('Layout');
// }
// function F_functFormsButton9Action0(params) {
// history.back();
// }



</script>



<div id="LayoutLYR">
  <h2 class=" mt-0 w-full py-4 text-center bg-gray-400">Event Management</h2>
  <div class="ml-4 sm:ml-8 mt-4">
    <!-- <form id="eventSelect" action="../scripts/admineditevent.php" method="post"> -->
    <form id="eventSelect" method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
      <h3 class="">Select Event</h3>

      <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'event_select_nonce' )?>">

      <select id="EventSelection" name="EventSelection" class="p-1 border border-blue-500" >
        <?php
          echo '<option value=0>Select</option>';
          echo '<option value="New"';
          // if ($_SESSION[seminar]=='New') echo 'Selected="Selected" ';
          echo '>Add New Event</option>';
          foreach ( $bookeventsall as $bookevent ) {
            echo '<option value="', $bookevent["eventid"], '" ';
            // if ($bookevent["eventid"]==$_SESSION[seminar]) echo 'Selected="Selected" ';
            echo  '>', $bookevent["title"];
            if ($bookevent["FUTURE"]<0) {
              echo ' (past)';
            } else if ($bookevent["display"]==0) {
              echo ' (not online)';
            } else {
              echo ' (bookable)';
            }
            echo '</option>';
          }
        ?>
      </select>
      <input type="submit" id="eventSelectLoad" name="Action" value="Load" class="btn btn-blue">
    </form>

      <?php
        // if ( ( !NOF_IsEmpty ($NOF_REQUEST->Session("seminar"))) ) {
        if (1) {
      ?>

    <form id="eventDetails" name="" method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
      <h3 class="text-xl font-bold ">Event Details</h3>
      <?php
      $myformat = 'd/m/Y';
      $start = new DateTime("NOW");
      ?>
      <input type="text" id="start-date" class="ui-widget-content ui-corner-all mydatepicker" name="eo_input[StartDate]" size="10" maxlength="10" value="<?php echo $start->format($myformat); ?>"/>

      <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'event_details_nonce' )?>">
      <input type="text" id="eventid" name="eventid" value="">
      <input type="text" id="grading" name="grading" value="">
      <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-3/4">
          <div class="flex py-2">
            <label id="FormsFieldLabel8" for="eventtypeCombo" class="w-32">Event Type</label>
            <select id="eventtypeCombo" name="eventtype" class="p-1 border border-blue-500" >
              <option value=>Select</option>
              <option value="Seminar" <?php // selected($thisevent["eventtype"], "Seminar") ?>>Seminar</option>
              <option value="Grading" <?php // selected($thisevent["eventtype"], "Grading") ?>>Grading</option>
              <option value="Taikai" <?php // selected($thisevent["eventtype"], "Taikai") ?>>Taikai</option>
              <option value="Course" <?php // selected($thisevent["eventtype"], "Course") ?>>Course</option>
              <option value="Other" <?php // selected($thisevent["eventtype"], "Other") ?>>Other</option>
            </select>
          </div>
          <small class="mr-4 field-msg error js-type-error text-center">You must choose a type for the event</small>
          <div class="flex py-2">
            <label id="FormsFieldLabel7" for="buCombo" class="w-32">Bu</label>
            <select id="buCombo" name="bu" class="p-1 border border-blue-500"  >
              <option value=>Select</option>
              <option value="Nonbu" <?php // selected($thisevent["bu"], "Nonbu") ?>>Non Bu</option>
              <option value="Kendo" <?php // selected($thisevent["bu"], "Kendo") ?>>Kendo</option>
              <option value="Iaido" <?php // selected($thisevent["bu"], "Iaido") ?>>Iaido</option>
              <option value="Jodo"  <?php // selected($thisevent["bu"], "Jodo") ?>>Jodo</option>
            </select>
          </div>
          <small class="mr-4 field-msg error js-bu-error text-center">You must choose a bu for the event</small>
          <div class="flex py-2">
            <label id="FormsFieldLabel1" for="shortname" class="w-32">Short Name </label>
            <input type="text" id="shortname" name="brief" class="p-1 border border-blue-500"  size="16" value="<?php // echo $thisevent["brief"];?>">
          </div>
          <small class="mr-4 field-msg error js-brief-error text-center">You must include a short name for the event</small>
          <div class="flex flex-col md:flex-row py-2">
            <label id="FormsFieldLabel2" for="verbosename" class="w-32">Verbose Name </label>
            <input type="text" id="verbosename" name="title" class="md:w-3/4 p-1 border border-blue-500"  value="<?php // echo $thisevent["title"];?>">
          </div>
          <small class="mr-4 field-msg error js-verbose-error text-center">You must include a description of the event</small>
          <div class="flex py-2 flex-wrap">
            <label id="FormsFieldLabel3" for="eventdate" class="w-32">Date of Event</label>
            <input type="text" id="eventdate" name="date" size="16" class="p-1 border border-blue-500 ui-widget-content ui-corner-all mydatepicker"  value="<?php // echo $thisevent["EDATE"];?>">
          </div>
          <small class="mr-4 field-msg error js-edate-error text-center">You must choose a date for the event</small>
          <div class="flex flex-col xs:flex-row">
            <div class="w-full xs:w-1/2  py-2 text-center">
              <label id="FormsFieldLabel9" for="displayCheckbox" class="w-48">Display for bookings</label>
              <input type="checkbox" id="displayCheckbox" name="display" class="inline my-auto mx-2 p-1" value="1" <?php // checked($thisevent["display"], 1)?>>
            </div>
            <div class="w-full xs:w-1/2  py-2 text-center">
              <label id="FormsFieldLabel10" for="bkaonlyCheckbox" class="w-48">BKA Members only</label></td>
              <input type="checkbox" id="bkaonlyCheckbox" name="bkaonly" class="inline my-auto mx-2 p-1" value="1" <?php // checked($thisevent["bkaonly"], 1)?>>
            </div>
          </div>
          <div class="flex flex-col xs:flex-row py-2">
            <label id="FormsFieldLabel4" for="gradingName" class="w-32">Grading Link</label>
            <select id="gradingName" name="gradingName" class="p-1 border border-blue-500" >
              <?php
              echo '<option value="None">No Grading</option>';
              foreach ($events as $event) {
                echo '<option value="', $event["grading"], '" ';
                // echo '<option value="', $event["grading"], '" ', selected($event["grading"], $thisevent["grading"]);
                echo '>', $event["EVENT"]. "</option>";
              }
              ?>
            </select>
          </div>
          <div class="flex py-2">
            <label id="FormsFieldLabel5" for="gradingtoCombo" class="w-32">Grading to</label>
            <select id="gradingtoCombo" name="gradingto" class="p-1 border border-blue-500" >
              <?php
              foreach ( $gradeTickets as $gradeTicket ) {
                echo '<option value="', $gradeTicket['grade'], '" ' ;
                // echo '<option value="', $gradeTicket['grade'], '" ', selected($gradeTicket['grade'], $thisevent['gradingto']) ;
                echo ">" . $gradeTicket['grade']. "</option>";
              }
              ?>
            </select>
          </div>
          <div class="flex py-2 flex-wrap">
            <label id="FormsFieldLabel6" for="gradingclosedate" class="w-48">Grading Appl. End date</label>
            <input type="text" id="gradingclosedate" name="gradingclose" size="11" maxlength="15" class="p-1 border border-blue-500 ui-widget-content ui-corner-all mydatepicker" value="<?php // echo $thisevent["GDATE"];?>">
          </div>
        </div>
        <!-- <div class=" flex flex-col xs:flex-row justify-around sm:hidden">
          <input type="button" id="eventDelete" name="FormsButton11" value="Delete this Event" class="btn btn-blue mt-4">
          <input type="button" id="eventCreateGrading" name="FormsButton10" value="Create New Grading" class="btn btn-blue mt-4">
        </div>
        <div class="w-full flex flex-row justify-around sm:hidden mt-4">
          <input type="button" id="eventCancel" name="FormsButton9" value="Cancel" class="btn btn-blue">
          <input type="submit" id="eventSave" name="Action" value="Save" class="btn btn-blue">
        </div> -->
        <div class=" w-full lg:w-1/4 flex flex-row lg:flex-col flex-wrap pt-2 justify-center lg:justify-around">
          <div class="text-center w-full xs:w-1/2 lg:w-full mb-4 lg:mb-0">
            <input type="button" id="eventDelete" name="FormsButton11" value="Delete this Event" class="btn btn-blue">
          </div>
          <div class="text-center w-full xs:w-1/2 lg:w-full mb-4 lg:mb-0">
            <input type="button" id="eventCreateGrading" name="FormsButton10" value="Create New Grading" class="btn btn-blue">
          </div>
          <div class="text-center w-full xs:w-1/2 lg:w-full mb-4 lg:mb-0">
            <input type="button" id="eventCancel" name="FormsButton9" value="Cancel" class="btn btn-blue">
          </div>
          <div class="text-center w-full xs:w-1/2 lg:w-full mb-4 lg:mb-0">
            <input type="submit" id="eventSave" name="Action" value="Save" class="btn btn-blue">
          </div>
        </div>
      </div>
      <input type="text" id="numTickets" name="" value="">
      <input type="text" id="numRegisters" name="" value="">
    </form>



    <h3>Tickets Available</h3>

      <form name="LayoutRegion1FORM" action="../scripts/eventexport.php" method="post">

        <table id="tickets" border="1" cellspacing="0" cellpadding="0" width="100%" style="height: 25px;">
          <tr >
            <th>Ticket ID</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price (GBP)</th>
            <th>Available To</th>
            <th>Max No</th>
            <!-- <th>
              <input type="button" id="FormsButton12" name="FormsButton12" value="Add " style="height: 24px; width: 51px;">
            </th> -->
          </tr>

              <?php
              // foreach ($ticketlist as $ticket) {
              ?>

             <!-- <tr >
              <td >
               <p><?php // echo $ticket['ticketid'] ?>&nbsp;</p>
              </td>
              <td >
               <p><?php // echo $ticket['selection'] ?>&nbsp;</p>
              </td>
              <td >
               <p><?php // echo $ticket['description'] ?>&nbsp;</p>
              </td>
              <td >
               <p><?php // echo $ticket['price'] ?>&nbsp;</p>
              </td>
              <td>
               <p><?php // echo $ticket['AVAIL'] ?>&nbsp;</p>
              </td>
              <td >
               <p ><span style="font-size: 12px;"><?php // echo $ticket['number'] ?></span>&nbsp;</p>
              </td>
              <td >
               <p ><span style="font-size: 12px;">
                 <a target="_self" href="javascript:openpopup_d297('../html/remove_ticket.php?ticketid=<?php echo urlencode($ticket['ticketid']) ?>')">Remove</a> /
                 <a target="_self" href="javascript:openpopup_9c21('../html/add_ticket.php?id=<?php echo urlencode($ticket['ticketid']);?>')">Edit</a></span></p>
              </td>
             </tr> -->
           <?php // } ?>
        </table>
      <table>
        <tr valign="top" align="left">
          <td rowspan="2" width="18"><!-- <img id="Label5" height="18" width="18" src="../assets/images/Label.gif" border="0" alt=""> --><span class="Invisible"><?php // echo $thisevent["bu"]; ?></span></td>
          <td rowspan="2" width="18"><!-- <img id="Label2" height="18" width="18" src="../assets/images/Label.gif" border="0" alt=""> --><span class="Invisible"><?php // echo $ticketlist["number"]; ?></span></td>
          <td rowspan="2" width="18"><!-- <img id="Label1" height="18" width="18" src="../assets/images/Label.gif" border="0" alt=""> --><span class="Invisible"><?php // echo $gradetickets["grade"]; ?></span></td>
          <td rowspan="2" width="18"><!-- <img id="Label6" height="18" width="18" src="../assets/images/Label.gif" border="0" alt=""> --><span class="Invisible"><?php // echo $events["grading"]; ?></span></td>
          <td rowspan="2" width="18"><!-- <img id="Label3" height="18" width="18" src="../assets/images/Label.gif" border="0" alt=""> --><span class="Invisible"><?php // echo $bookeventsall->fields["eventid"]; ?></span></td>
        </tr>

      </table>
    </form>


    <?php } ?>
  </div>
</div>



<div id="myModal" class="popup">
  <!-- Modal content -->
  <div class="popup-content">
    <div class="popup-header">
      <span id="end" class="end">X</span>
      <!-- <h2>Header</h2> -->
      <h2 class="text-center py-2 ">Create New Grading</h2>
    </div>
    <div class="popup-body flex flex-col p-8">
      <div class="">

        <form id="createGrading" method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'create_grading_nonce' )?>">
          <div id="LayoutRegion1LYR" class="pl-8">
            <div class="flex py-2">
              <label class="w-32 " for="gradingBu">Bu</label>
              <select id="gradingBu" name="bu" class="p-1 border border-blue-500">
                <option value="">Select</option>
                <option value="Kendo">Kendo</option>
                <option value="Iaido">Iaido</option>
                <option value="Jodo">Jodo</option>
              </select>
              <small class="mr-4 field-msg error js-gbu-error">You must choose a bu for the grading</small>
            </div>
            <div class="flex py-2">
              <label class="w-32 " for="gradingDate">Date</label>
              <input type="text" id="gradingDate" name="gdate" size="14" maxlength="14" required class="p-1 ui-widget-content ui-corner-all mydatepicker border border-blue-500 ">
              <small class="mr-4 field-msg error js-gdate-error">You must enter a valid date for the grading</small>
            </div>
            <div class="flex py-2">
              <label class="w-32 " for="gradingPlace">Place</label>
              <input type="text" id="gradingPlace" name="Place" size="14" maxlength="20" required class="p-1 border border-blue-500 rounded">
              <small class="mr-4 field-msg error js-gplace-error">You must enter the location of the grading</small>
            </div>
            <div class="flex py-2">
              <label class="w-32 " for="gradingHead">Head of Panel</label>
              <input type="text" id="gradingHead" name="Head" size="14" maxlength="20" class="p-1 border border-blue-500 rounded">
            </div>

            <div class="flex justify-around mb-4">
              <input type="button" id="createGradingCancel" name="cancel" tabindex="3" class="btn btn-blue" value="Cancel">
              <input type="submit" id="createGradingSave" name="save" tabindex="4" class="btn btn-blue" value="Save">
            </div>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

<div id="myModal2" class="popup">
  <!-- Modal content -->
  <div class="popup-content">
    <div class="popup-header">
      <span id="end2" class="end">X</span>
      <!-- <h2>Header</h2> -->
      <h2 class="text-center py-2 ">Deletete This Event</h2>
    </div>
    <div class="popup-body flex flex-col p-8">
      <div class="">

        <form id="eventDeletePopup" method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'delete_event_nonce' )?>">
          <div id="" class="pl-8">
            <div class="flex py-2">
              <label class="w-32 text-semibold" for="delEventBu">Bu</label>
              <input type="text" id="delEventBu" name="delebu" disabled class="">
            </div>
            <div class="flex py-2">
              <label class="w-32 text-semibold" for="delEventDate">Event Date</label>
              <input type="text" id="delEventDate" name="deledate" disabled class="">
              <!-- <small class="mr-4 field-msg error js-gdate-error">You must enter a valid date for the grading</small> -->
            </div>
            <div class="flex py-2">
              <label class="w-32 text-semibold" for="delEventTitle">Event Title</label>
              <input type="text" id="delEventTitle" name="deletitle" disabled class="">
            </div>
          </div>
          <p class="text-center">This will delete the event listing, the tickets for the event and any members&#8217; bookings.</p>
          <p class="text-center"><span style="color: rgb(255,0,0);">This is not reversable!!</span></p>

          <div class="flex justify-around mb-4">
            <input type="button" id="cancelEventDelete" name="cancel" tabindex="3" class="btn btn-blue" value="Cancel">
            <input type="submit" id="proceedEventDelete" name="save" tabindex="4" class="btn btn-blue" value="Delete">
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
