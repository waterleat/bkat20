<?php
// $num = check_login();
// if ($num != 1 || check_admin('j')!=1){
// //not logged in
// header("Location: my_account.php");
// exit;
//
// }
$table_grading = 'mem_grading';

$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

$selectedEvent = '';
$bu = 'Iaido';
$g =  'I170319A';


$events  = $mydb->get_results($mydb->prepare(
"SELECT grading,CONCAT_WS(' ',Bu,place,date) AS EVENT FROM $table_grading WHERE complete = %s ORDER BY date ASC", 'No'
), 'ARRAY_A');
// var_dump($events);

 ?>

<!-- 'Add grading','URL','../html/new_event.php' -->



<div id="LayoutLYR">
  <div class="w-full py-4 text-center bg-gray-400">
    <h2 class="text-2xl font-bold ">Grading Admin</h2>
  </div>

  <form id="gradingSelect" class="mx-4" method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
     <!-- action="../scripts/admingrading.php" method="post"> -->
    <input type="hidden" id="dummy" name="dummy" value="">
    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'admin_grading_select_nonce' )?>">

    <h3 class="text-xl font-bold " >Select Grading</h3>

    <select id="gradingEventSelector" name="gradingEventSelector" class="ml-2 mb-4 p-1 border border-blue">
      <option value="0">Select</option>
      <?php
      foreach ($events as $event) {
        echo "<option value=\"" . $event["grading"]. "\" ";
        if ($event["grading"]==$selectedEvent) echo 'Selected="Selected" ';
        echo  ">" . $event["EVENT"]. "</option>";
      }
      ?>
    </select>

    <div class="flex justify-around">
      <input type="submit" id="loadGradingData" class="btn btn-blue" name="Action" value="Load Data">
      <input type="button" id="createNewGrading" class="btn btn-blue" name="FormsButton8" value="Create New Grading">
    </div>

  </form>

  <?php
    // $gradingmembers = $mydb->get_results($mydb->prepare(
    //   "SELECT CONCAT_WS(' ',m.Forename,m.Surname) AS Name, m.dob, m.Membershipstatus,
    //   gr.BKANo, gr.grade AS gradeapplied, Pass, gr.Notes, g.date AS gdate
    //   FROM mem_member m
    //   INNER JOIN  mem_gradingreg gr on gr.BKANo = m.BKAno
    //   INNER JOIN mem_grading g ON gr.grading=g.grading
    //   where gr.grading = %s
    //   GROUP BY gr.BKANo,gradeapplied,Pass,gr.Notes,Name,m.dob,m.Membershipstatus,g.date
    //   ORDER BY gradeapplied, dob DESC",
    //   $g
    // ), ARRAY_A);
    // // var_dump($gradingmembers);
    //
    // $currentgrades  = $mydb->get_results($mydb->prepare(
    //   "SELECT BKANo, grade FROM mem_grade WHERE Bu = %s AND BKANo IN
    //   (SELECT BKANo FROM mem_gradingreg WHERE grading = %s)
    //   ORDER BY BKANo, grade DESC",
    //   $bu, $g
    // ), ARRAY_A);
    // $number = '';
    // $highestgrades = [];
    // foreach ($currentgrades as $grade) {
    //   if ($grade['BKANo'] <> $number) {
    //     // var_dump($grade['BKANo'], $grade['grade']);
    //     $number = $grade['BKANo'];
    //     $highestgrades[ $number] = $grade['grade'] ;
    //     // var_dump($highestgrades);
    //     // echo '<br>';
    //   }
    // }
    // foreach ($gradingmembers as $grader) {
    //   $number = $grader['BKANo'];
    //   if (array_key_exists($number, $highestgrades)) {
    //     $grader['curgrade'] = $highestgrades[$number];
    //   }else{
    //     $grader['curgrade'] = NULL;
    //   }
    //   // var_dump($grader);
    //   // echo '<br>';
    //   $graderslist[] = $grader;
    // }
    // // var_dump($graderslist);
    //



  ?>


  <form name="LayoutRegion2FORM" action="../scripts/checkgradingmember.php" method="post">
    <h3>Add Applicant</h3>
    <table id="Table8" border="1" cellspacing="0" cellpadding="0" width="100%" style="height: 23px;">
      <thead>
        <tr>
          <th>BKA no</th>
          <th>Grade App.</th>
          <th>Name</th>
          <th>DoB</th>
          <th>Mem Status</th>
          <th>Cur. Grade</th>
          <th>Awarded</th>
          <th>Join date</th>
        </tr>
      </thead>
      <tbody>
        <tr style="height: 28px;">
          <td width="63" id="Cell29">
            <p class="Norm" style="margin-bottom: 0px;"><input type="text" id="FormsEditField2" name="BKAnum" size="7" maxlength="10" style="white-space: pre; width: 52px;" value="<?php // echo $_SESSION[result][0] ?>"></p>
          </td>
          <td align="center" width="100" id="Cell56">
            <p style="margin-bottom: 0px;">
              <select id="FormsComboBox1" name="GradeApplied" style="height: 24px;">
                <option value="Ikkyu" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Ikkyu, ' selected ') ?> >Ikkyu</option>
                <option value="Shodan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Shodan, ' selected ') ?> >Shodan</option>
                <option value="Nidan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Nidan, ' selected ') ?> >Nidan</option>
                <option value="Sandan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Sandan, ' selected ') ?> >Sandan</option>
                <option value="Yondan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Yondan, ' selected ') ?> >Yondan</option>
                <option value="Godan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Godan, ' selected ') ?> >Godan</option>
                <option value="Rokudan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Rokudan, ' selected ') ?> >Rokudan</option>
                <option value="Nanadan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Nanadan, ' selected ') ?> >Nanadan</option>
                <option value="Hachidan" <?php // echo checkSelected3(getSESSIONvar("gradeappl"), Hachidan, ' selected ') ?> >Hachidan</option>
              </select>
            </p>
          </td>
          <td width="201" id="Cell30">
            <p class="Norm" style="margin-bottom: 0px;"><?php // echo $_SESSION[result][1] ?>&nbsp;name goes here</p>
          </td>
          <td width="76" id="Cell31">
            <p class="Norm" style="margin-bottom: 0px;"><?php // echo $_SESSION[result][2] ?>&nbsp;dob</p>
          </td>
          <td width="84" id="Cell32">
            <p class="Norm" style="margin-bottom: 0px;"><?php // echo $_SESSION[result][5] ?>&nbsp;status</p>
          </td>
          <td width="78" id="Cell33">
            <p class="Norm" style="color: rgb(0,0,0); margin-bottom: 0px;"><?php // echo $_SESSION[result][3] ?>curgade<span style="color: rgb(0,0,0);"></span>&nbsp;</p>
          </td>
          <td width="77" id="Cell34">
            <p class="Norm" style="margin-bottom: 0px;"><?php // echo $_SESSION[result][4] ?>at date<span style="color: rgb(255,0,0);"></span>&nbsp;</p>
          </td>
          <td width="72" id="Cell87">
            <p class="Norm" style="margin-bottom: 0px;"><?php // echo $_SESSION[result][7] ?>joined<span style="font-size: 12px;"></span>&nbsp;</p>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="flex flex-wrap">
      <div class="">
        <input type="submit" id="FormsButton4" name="Check" value="Check Status" style="height: 24px; width: 126px;"></td>
      </div>
      <div class="flex">
        <p class="" >Transaction</p>
        <input type="text" id="FormsEditField3" name="transaction" size="17" maxlength="20" style="white-space: pre; width: 132px;">
      </div>
      <div class="">
        <select id="FormsComboBox2" name="paymenttype" style="height: 24px;">
          <option value="Cash">Cash</option>
          <option value="Cheque" selected="selected">Cheque</option>
          <option value="SecureWeb">SecureWeb</option>
          <option value="CreditCard">CreditCard</option>
          <option value="Other">Other</option>
          <option value="No Payment">No Payment</option>
        </select>
      </div>
      <div class="">
        <p style="margin-bottom: 0px;"><span style="color: rgb(255,0,0);"><?php // echo $_SESSION[varerr] ?>error area</span>&nbsp;</p>
      </div>
      <div class="">
        <input type="submit" id="FormsButton3" name="Check" value="Add to Grading" style="height: 24px; width: 144px;">
      </div>
      <p style="margin-bottom: 0px;"><a target="_self" href="javascript:openpopup_10fe2('../html/grading_certificate.php?mem=<?php echo $_SESSION[result][0] ?>')">Certificate</a></p>
    </div>
  </form>




  <?php
  if ( 0 ) {
  ?>
  <form name="LayoutRegion2FORM" action="../scripts/checkgradingmember.php" method="post">
    <h3 class="text-xl font-bold ">Add Applicant</h3>
    <table class="w-full">
      <thead>
        <tr>
          <th>BKA no</th>
          <th>Grade App.</th>
          <th>Name</th>
          <th>DoB</th>
          <th>Mem Status</th>
          <th>Cur. Grade</th>
          <th>Awarded</th>
          <th>Join date</th>
          <th>Transaction</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <input class="w-16" type="text" id="FormsEditField2" name="BKAnum"  value="<?php // echo $grader['BKANo'] ?>">
          </td>
          <td>
            <select id="FormsComboBox1" name="GradeApplied" >
              <option value="Ikkyu" <?php // echo selected($grader['gradeapplied'], 'Ikkyu' ) ?> >Ikkyu</option>
              <option value="Shodan" <?php // echo selected($grader['gradeapplied'], 'Shodan' ) ?> >Shodan</option>
              <option value="Nidan" <?php // echo selected($grader['gradeapplied'], 'Nidan' ) ?> >Nidan</option>
              <option value="Sandan" <?php // echo selected($grader['gradeapplied'], 'Sandan' ) ?> >Sandan</option>
              <option value="Yondan" <?php // echo selected($grader['gradeapplied'], 'Yondan' ) ?> >Yondan</option>
              <option value="Godan" <?php // echo selected($grader['gradeapplied'], 'Godan' ) ?> >Godan</option>
              <option value="Rokudan" <?php // echo selected($grader['gradeapplied'], 'Rokudan' ) ?> >Rokudan</option>
              <option value="Nanadan" <?php // echo selected($grader['gradeapplied'], 'Nanadan' ) ?> >Nanadan</option>
              <option value="Hachidan" <?php // echo selected($grader['gradeapplied'], 'Hachidan' ) ?> >Hachidan</option>
            </select>
          </td>
          <td>
            <?php // echo $grader['Name'] ?>
          </td>
          <td>
            <?php // echo $grader['dob'] ?>
          </td>
          <td>
            <?php // echo $grader['Membershipstatus'] ?>
          </td>
          <td>
            <?php // echo $grader['curgrade'] ?>
          </td>
          <td>
            <?php // echo $grader['gdate'] ?>
          </td>
          <td>
            <?php // echo $grader[7] ?><span style="font-size: 12px;"></span>&nbsp;</p>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" id="FormsButton4" name="Check" value="Check Status">
          </td>
          <td>
            <select id="FormsComboBox2" name="paymenttype" style="height: 24px;">
              <option value="Cash">Cash</option>
              <option value="Cheque" selected="selected">Cheque</option>
              <option value="SecureWeb">SecureWeb</option>
              <option value="CreditCard">CreditCard</option>
              <option value="Other">Other</option>
              <option value="No Payment">No Payment</option>
            </select>
          </td>
          <td>
            <!-- <p class="label" >Transaction</p> -->


            <input type="text" id="FormsEditField3" name="transaction" size="17" maxlength="20">
          </td>
          <td>
            <p ><span style="color: rgb(255,0,0);"><?php // echo $_SESSION[varerr] ?></span>&nbsp;</p>
          </td>
          <td>
            <input type="submit" id="FormsButton3" name="Check" value="Add to Grading" style="height: 24px; width: 144px;">
            <!-- <span class="Invisible"><?php // echo $Events->fields["EVENT"]; ?></span> -->
          </td>
          <td>
            <p ><a target="_self" href="javascript:openpopup_10fe2('../html/grading_certificate.php?mem=<?php // echo $grader[0] ?>')">Certificate</a></p>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  <?php } ?>



  <?php
  // $dat = esc_html($graderslist[0]['gdate']);
  // $gdatearr = explode("-",esc_html($graderslist[0]['gdate']));
  // $gradingdate = mktime(0,0,0,$gdatearr[1],$gdatearr[0],$gdatearr[2]);
  // var_dump($gradingdate); echo '<br>';
  // var_dump(time()); echo '<br>';
  ?>
  <form id="gradingCandidatesFrm" class="ml-4" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
     <!-- action="../scripts/gradingresult.php" method="post"> -->
    <p>number of graders</p>
    <input id="numGraders" type="text" name="" value="">
    <input type="text" id="exportCsvGradingId" name="event" value="<?php // echo $selectedEvent ?>">
    <input type="hidden" id="date" name="date" value="<?php // echo $gradingdate ?>">
    <h3 class="text-xl font-bold " >Registered Applicants</h3>

    <table id="gradingCandidatesTbl" class="w-full">
      <thead>
        <tr>
          <th>BKA no</th>
          <th>Name</th>
          <th>DoB</th>
          <th>Mem Status</th>
          <th>Cur. Grade</th>
          <th>Grade App.</th>
          <th>Notes</th>
          <?php // if ($gradingdate > time()) { ?>
           <th>Pass/Fail</th>
          <?php // } ?>
          <th>Cancel / Edit</th>
        </tr>
      </thead>
      <tbody>
        <!-- <?php
      //    foreach ($graderslist as $grader) {
        ?>
        <tr>
          <td>
            <?php // echo esc_html($grader['BKANo']) ?>
          </td>
          <td>
            <?php // echo esc_html($grader['Name']) ?>
          </td>
          <td>
            <?php // echo esc_html($grader['dob']) ?>
          </td>
          <td>
            <?php // echo esc_html($grader['Membershipstatus']) ?>
          </td>
          <td>
            <?php // echo esc_html($grader['curgrade']) ?>
          </td>
          <td>
            <?php // echo esc_html($grader['gradeapplied']) ?>
          </td>
          <td>
            <input type="button" class="btn" data-url=" <?php // echo esc_url('../html/confirm_remove.php?mem=', $grader['BKANo']) ?>" value="Remove">
          </td>
          <?php
      //    if ( $gradingdate > time() ) { ?>
            <td>
              <select id=""  <?php // if ( $gradingdate > time() ) echo ' disabled' ?>>
                <option value="----"<?php // selected(esc_html($grader["Pass"]), "----") ?> >----</option>
                <option value="Pass"<?php // selected(esc_html($grader["Pass"]), "Pass") ?>>Pass</option>
                <option value="Fail"<?php // selected(esc_html($grader["Pass"]), "Fail") ?>>Fail</option>
              </select>
            </td>
          <?php // } ?>
        </tr>
        <tr>
          <td><?php // echo $grader['Notes']?></td>
        </tr> -->
        <?php // } ?>
      </tbody>
    </table>




    <input type="submit" id="export" name="export" value="Export Data" >
    <input type="submit" id="finalize" name="finalize" value="Finalise Grading" <?php // if ($gradingdate > time()) echo ' disabled ' ?> >
    <input type="submit" id="save" name="save" value="Save for later" >

  </form>


</div>
