<?php
// $table_member = 'mem_member';
// $table_memberdojo = 'mem_memberdojo';
// $table_dojo = 'mem_dojo';
// $table_coaches = 'mem_coaches';
// $table_grade = 'mem_grade';
// $table_grading = 'mem_grading';
$table_member = 'member';
$table_memberdojo = 'memberdojo';
$table_dojo = 'dojo';
$table_coaches = 'coaches';
$table_grade = 'grade';
$table_grading = 'grading';

// if (!is_user_logged_in()) {
//   header('Location: localhost:8080/');
//   die();
// }
/**
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bka2018
 */
 $mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );


  // $bkano = 7763;// 12138;
  $bkano = esc_attr( get_the_author_meta( 'bkano', get_current_user_id() ) );
  if (is_numeric($bkano)) {
    $bkano = intval($bkano);
  }else{
    wp_redirect(WP_SITEURL,301);
  }
  // check logged in
  // Check update
// get_header();
  function isdueYMD($dat)
  {
    //currently yy-mm-dd
  	$datearr = explode("-",$dat);
     	$dat1mo   = mktime(0,0,0,$datearr[1]-1,$datearr[2],$datearr[0]);
  // echo $datearr[0],$datearr[1],$datearr[2],$dat1mo," ",time();
  //die();
  	return ($dat1mo <= time());
  }

  function isdueDMY($dat)
  {
    //for date format dd-mm-yy
  	$datearr = explode("-",$dat);
     	$dat1mo   = mktime(0,0,0,$datearr[1]-1,$datearr[0],$datearr[2]);
  //echo $datearr[0],$datearr[1],$datearr[2],$dat1mo," ",time();
  //die();
  	return ($dat1mo <= time());
  }

  // member
  // $memberQuery = "SELECT Surname,Forename,Address1,Address2,Address3,Address4,Address5,Postcode,email,phone,DATE_FORMAT(dob,'%d-%m-%Y') AS dob,kendo,iaido,jodo,sex,Membershiptype,Membershipstatus,DATE_FORMAT(Joindate,'%d-%m-%Y') AS Joindate,Insurance,EKFno,Medicalnotes,Notes,BKAno,DATE_FORMAT(Renewaldue,'%d-%m-%Y') AS Renewaldue,DATE_FORMAT(Renewed,'%d-%m-%Y') AS Renewed, PlaceOB,CountryOB,Nationality FROM member WHERE BKAno = :bkano";
  // $memberQuery = "SELECT * FROM mem_member WHERE BKAno = :bkano";
  // $mq = $pdo->prepare($memberQuery);
  // $mq->execute( [':bkano'=>$bkano] );
  // $memberInfo = $mq->fetch();

  $memberInfo =$mydb->get_row($mydb->prepare(
    "SELECT * FROM $table_member
    WHERE BKAno = %d",
    $bkano
  ),'ARRAY_A');
  // // $_SESSION[dojosession] = $dojoInfo;
  // var_dump($memberInfo);
  // echo '<br />';
  // echo '<br />';

  // dojos
  $dojoInfo = $mydb->get_results($mydb->prepare(
    "SELECT Dojono,DojoName,kendo,iaido,jodo,Bu,status,Dojostatus
    FROM $table_dojo d
    JOIN $table_memberdojo md
    ON d.Dojono = md.dojo
    WHERE Memberno = %d",
    $bkano
  ),'ARRAY_A');

  // $dojosQuery = "SELECT Dojono,DojoName,Memberno,Dojo,Bu,status,Dojostatus  FROM mem_dojo JOIN mem_memberdojo ON mem_dojo.Dojono = mem_memberdojo.dojo  WHERE Memberno = :bkano";
  // $dq = $pdo->prepare($dojosQuery);
  // $dq->execute( [':bkano'=>$bkano] );
  // $dojoInfo = $dq->fetchAll();
  // $_SESSION[dojosession] = $dojoInfo;
  // var_dump($dojoInfo);
  // echo '<br />';

  // coaches
  $kcl=$icl=$jcl='';
  $coachInfo = $mydb->get_results($mydb->prepare(
    "SELECT BKANo,Bu,Level, Awarded,Certificate,Renewed, Renewaldue,Insurance,PaidByDojo
    FROM $table_coaches
    WHERE BKANo = %d",
    $bkano
  ),'ARRAY_A');
// var_dump($coachInfo);
  // // ,DATE_FORMAT(Renewed,'%d-%m-%Y') AS Renewed
  // $membercoachQuery = "SELECT BKANo,Bu,Level,DATE_FORMAT(Awarded,'%d-%m-%Y') AS Awarded,Certificate,Renewed, Renewaldue,Insurance,PaidByDojo FROM mem_coaches WHERE BKANo = :bkano";
  // $mcq = $pdo->prepare($membercoachQuery);
  // $mcq->execute( [':bkano'=>$bkano] );
  // $coachInfo = $mcq->fetchAll();
  // $_SESSION[coachInfo] = $coachInfo;
  // if ($coachInfo) {
    foreach ($coachInfo as $coach) {
      if ($coach['Bu']=='Kendo') {
        $kcl = $coach['Level'];
      }
      if ($coach['Bu']=='Iaido') {
        $icl = $coach['Level'];
      }
      if ($coach['Bu']=='Jodo') {
        $jcl = $coach['Level'];
      }
    }
  // }
  // var_dump($coachInfo);
  // echo '<br />';
  // echo '<br /> insurance: ', $coachInfo[0]['Insurance'];
  // echo '<br /> renewal: ', $coachInfo[0]['Renewaldue'];
  // echo '<br />';

  // grades
  $kg=$ig=$jg='';
  $gradeInfo = $mydb->get_results($mydb->prepare(
    "SELECT g.Bu, g.grade, gg.date, gg.place
    FROM $table_grade g
    INNER JOIN $table_grading gg ON g.grading = gg.grading
    WHERE g.BKAno = %d
    ORDER BY gg.date ASC",
    $bkano
  ),'ARRAY_A' );
  // var_dump($gradeInfo);

  // $gradeQuery = "SELECT mem_grade.Bu, mem_grade.grade, mem_grading.date, mem_grading.place FROM mem_grade INNER JOIN mem_grading ON mem_grade.grading = mem_grading.grading WHERE BKAno= :bkano ORDER BY mem_grading.date";
  // // $gradeQuery = "SELECT Bu, grade, date, place FROM grade INNER JOIN grading WHERE BKAno= :bkano ORDER BY grading";
  // $gq = $pdo->prepare($gradeQuery);
  // $gq->execute( [':bkano'=>$bkano] );
  // $gradeInfo = $gq->fetchAll();
  // $_SESSION['gradeInfo'] = $gradeInfo;
  // var_dump($gradeInfo);

  foreach ($gradeInfo as $grade) {
    if ($grade['Bu']=='Kendo') {
      $kg = $grade['grade'];
    }
    if ($grade['Bu']=='Iaido') {
      $ig = $grade['grade'];
    }
    if ($grade['Bu']=='Jodo') {
      $jg = $grade['grade'];
    }
  }

  // echo '<br />kendo: '.$kg;
  // echo '<br />Iaido: '.$ig;
  // echo '<br />Jodo: '.$jg;

?>


<div id="indMember" class="bg-blue-100 px-1 sm:px-4 md:px-8 pb-4">

  <h2 class="m-0 p-3 ">BKA Number: <?php echo esc_html($memberInfo['BKAno']) ?></h2>
  <div class="flex flex-col md:flex-row mb-2">
    <div class="mt-2 w-full md:w-1/2 flex-col">
      <h4 class="bg-gray-400 w-full m-0 p-2">Contact Details</h4>
      <div class="flex ">
        <div class="w-1/3 font-bold"><p>Forename</p></div>
        <div class="w-2/3"><p><?php echo esc_html($memberInfo['Forename']) ?></p></div>
      </div>
      <div class="flex ">
        <div class="w-1/3 font-bold"><p>Surname</p></div>
        <div class="w-2/3"><p><?php echo esc_html($memberInfo['Surname']) ?></p></div>
      </div>
      <div class="flex ">
        <div class="w-1/3 font-bold"><p>Address</p></div>
        <div class="w-2/3"><p><?php echo esc_html($memberInfo['Address1']) ?></p>
          <p class="pt-0"><?php echo esc_html($memberInfo['Address2']) ?></p>
          <p class="pt-0"><?php echo esc_html($memberInfo['Address3']) ?></p>
          <p class="pt-0"><?php echo esc_html($memberInfo['Address4']) ?></p></div>
      </div>
      <div class="flex ">
        <div class="w-1/3 font-bold"><p>Country</p></div>
        <div class="w-2/3"><p><?php echo esc_html($memberInfo['Address5']) ?></p></div>
      </div>
      <div class="flex ">
        <div class="w-1/3 font-bold"><p>Postcode</p></div>
        <div class="w-2/3"><p><?php echo esc_html($memberInfo['Postcode']) ?></p></div>
      </div>
      <div class="flex ">
        <div class="w-1/3 font-bold"><p>Email</p></div>
        <div class="w-2/3"><p><?php echo esc_html($memberInfo['email']) ?></p></div>
      </div>
      <div class="flex ">
        <div class="w-1/3 font-bold"><p>Phone</p></div>
        <div class="w-2/3"><p><?php echo esc_html($memberInfo['phone']) ?></p></div>
      </div>
      <div class="text-center">
        <p><a target="_self" href="<?php echo  get_page_link( get_page_by_title( 'new contact details' )->ID )?>">Update Contact Details</a></p>
      </div>
    </div>


    <div class="mt-2 w-full md:w-1/2 flex-col">
      <h4 class="bg-gray-400 w-full m-0 p-2">Personal & Membership Details</h4>
      <div class="">
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Membership Type</p></div>
          <div class="w-1/2"><p><?php echo esc_html($memberInfo['Membershiptype']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Status</p></div>
          <div class="w-1/2"><p><?php echo esc_html($memberInfo['Membershipstatus']) ?>
            <?php if ($memberInfo['Membershipstatus']=="Confirmed" && $memberInfo['Membershiptype']<>"Guest" ) { ?><br />
             <a target="_self" href="<?php echo  get_page_link( get_page_by_title( 'membership confirmation' )->ID )?>">Print Certificate</a>
             <?php }?></p>
          </div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Expires</p></div>
          <div class="w-1/2"><p class=""><?php echo date_format(date_create($memberInfo['Renewaldue']),'d-M-Y')?>
            <?php if ((isdueYMD($memberInfo['Renewaldue']) && $memberInfo['Membershiptype']<>"Guest") || $memberInfo['Membershiptype']=="Temporary") { ?><br />
            <a href="<?php echo  get_page_link( get_page_by_title('renew membership')->ID )?>"><span class="text-red-500 font-semibold">Renew Membership</span></a>
            <?php }?></p>
          </div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Renewal Mode</p></div>
          <div class="w-1/2"><p><?php echo esc_html($memberInfo['RenewalMethod']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Insurance Ref</p></div>
          <div class="w-1/2"><p><?php echo esc_html($memberInfo['Insurance']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Date of Birth</p></div>
          <div class="w-1/2"><p><?php echo date_format(date_create($memberInfo['dob']),'d-M-Y') ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Place of Birth</p></div>
          <div class="w-1/2"><p><?php echo esc_html($memberInfo['PlaceOB']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Country of Birth</p></div>
          <div class="w-1/2"><p><?php echo esc_html($memberInfo['CountryOB']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Nationality</p></div>
          <div class="w-1/2"><p><?php echo esc_html($memberInfo['Nationality']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Gender</p></div>
          <div class="w-1/2"><p><?php echo esc_html($memberInfo['sex']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Member Since</p></div>
          <div class="w-1/2"><p><?php echo date_format(date_create($memberInfo['Joindate']),'d-M-Y') ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>EKF No:</p></div>
          <div class="w-1/2"><p><?php echo esc_html($memberInfo['EKFno']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Coach Insurance</p></div>
          <div class="w-1/2"><p><?php if ($coachInfo) { echo esc_html($coachInfo[0]['Insurance']); } else { echo 'Not Insured' ;} ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/2 font-bold"><p>Due</p></div>
          <div class="w-1/2"><p><?php if ($coachInfo) { echo date_format(date_create($coachInfo[0]['Renewaldue']),'d-M-Y');} else { echo 'N/A' ;}?>
            <?php if ($coachInfo && isdueYMD($coachInfo[0]['Renewaldue']) ) { ?><br />
            <a href="<?php echo  get_page_link( get_page_by_title('renew membership')->ID )?>"><span class="text-red-500 font-semibold">Coach Insurance</span></a>
            <?php } ?> </p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <h4 class="bg-gray-400 w-full m-0 p-2">Bu and Dojo Membership Details</h4>
  <div class="flex flex-col md:flex-row">
    <div class="w-full md:w-2/5 flex-col">
      <div class="flex ">
        <div class="w-1/3 font-bold"><p>Practice</p></div>
        <div class="w-1/3 font-bold"><p>Current Grade</p></div>
        <div class="w-1/3 font-bold"><p>Coach Level</p></div>
      </div>
      <div class="flex ">
        <div class="w-1/3"><p><?php if ($memberInfo['kendo'])  {?>
          <img id="ky" class="inline" height="11" width="11" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/tick.jpg" border="0" alt="tick" title="tick">
          <?php } else {?>
          <img id="kn" class="inline" height="11" width="11" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/cross.jpg" border="0" alt="cross" title="cross" >
          <?php } ?>Kendo</p>
        </div>
        <div class="w-1/3"><p><?php echo $kg ?></p></div>
        <div class="w-1/3"><p><?php echo $kcl ?></p></div>
      </div>
      <div class="flex ">
        <div class="w-1/3"><p><?php if ($memberInfo['iaido'])  {?>
          <img id="iy" class="inline" height="11" width="11" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/tick.jpg" border="0" alt="tick" title="tick">
          <?php } else {?>
          <img id="in" class="inline" height="11" width="11" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/cross.jpg" border="0" alt="cross" title="cross" >
          <?php } ?>Iaido</p>
        </div>
        <div class="w-1/3"><p><?php echo $ig ?></p></div>
        <div class="w-1/3"><p><?php echo $icl ?></p></div>
      </div>
      <div class="flex ">
        <div class="w-1/3"><p><?php if ($memberInfo['jodo'])  {?>
          <img id="jy" class="inline" height="11" width="11" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/tick.jpg" border="0" alt="tick" title="tick">
          <?php } else {?>
          <img id="jn" class="inline" height="11" width="11" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/cross.jpg" border="0" alt="cross" title="cross" >
          <?php } ?>Jodo</p>
        </div>
        <div class="w-1/3"><p><?php echo $jg ?></p></div>
        <div class="w-1/3"><p><?php echo $jcl ?></p></div>
      </div>
      <div class="w-full text-center">
        <?php if ($memberInfo['Membershiptype']<>"Guest" ) { ?>
        <p><a target="_self" href="<?php echo  get_page_link( get_page_by_title('grading history')->ID )?>">Grading History</a></p>
        <?php }?>
      </div>
    </div>

    <div class="w-full md:w-3/5 flex-col">
      <div class="flex ">
        <div class="w-1/3 font-bold"><p>Dojo</p></div>
        <div class="w-1/3 font-bold"><p>Arts Practiced</p></div>
        <div class="w-1/3 font-bold"><p>Status</p></div>
      </div>
      <!-- // loop through dojo name arts and status -->
      <?php
      // var_dump($dojoInfo);
      foreach ($dojoInfo as $onedojo){
        // var_dump($onedojo);
        ?>
        <div class="flex ">
          <div class="w-1/3 ">
            <p><a target="_self" href="<?php echo  get_page_link( get_page_by_title( 'dojo details' )->ID ),'?dojo=', esc_html($onedojo['Dojono']) ?>"><?php echo esc_html($onedojo['DojoName']) ?></a></p>
          </div>
          <div class="w-1/3 "><p><?php echo esc_html($onedojo['Bu']) ?></p></div>
          <div class="w-1/3 flex justify-between">
            <div class="">
              <p><?php echo esc_html($onedojo['status']) ?></p>
            </div>
            <div class="">
              <form class="pt-2 xs:mr-2 sm:mr-4 inline-block">
                <input type="hidden" name="dojoNo" value="<?php echo esc_html($onedojo['Dojono']) ?>">
                <input type="hidden" name="dojoName" value="<?php echo esc_html($onedojo['DojoName']) ?>">
                <input type="hidden" name="kendo" value="<?php echo esc_html($onedojo['kendo']) ?>">
                <input type="hidden" name="iaido" value="<?php echo esc_html($onedojo['iaido']) ?>">
                <input type="hidden" name="jodo" value="<?php echo esc_html($onedojo['jodo']) ?>">
                <input type="hidden" name="bu" value="<?php echo esc_html($onedojo['Bu']) ?>">
                <input type="hidden" name="status" value="<?php echo esc_html($onedojo['status']) ?>">
                <img id="Picture6" class="inline h-3 w-3 cursor-pointer modifyDojo"  src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/change.GIF" border="0" alt="Change arts" title="Change arts">
                <img id="Picture8" class="inline h-3 w-3 cursor-pointer removeDojo" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/cross.jpg" border="0" alt="remove dojo" title="remove dojo">
              </form>
            </div>

          </div>
        </div>
        <?php
      } ?>

      <div class="mt-4 text-center">
        <?php if ($memberInfo['Membershiptype']<>"Guest" ) { ?>
          <p class="label" style="margin-bottom: 0px;"><a href="<?php echo  get_page_link( get_page_by_title('dojo listing')->ID ) ?>">Add Dojo</a></p>
        <?php }?>
      </div>
    </div>
  </div>
</div>


<div id="myModal" class="popup">
  <!-- Modal content -->
  <div class="popup-content">
    <div class="popup-header">
       <span id="end" class="end">×</span>

       <h2 id="modalTitle" class="text-2xl font-bold py-2 bg-gray-400">Modify Dojo Member Status</h2>
    </div>
    <div class="popup-body flex flex-col">
      <div class="flex pt-2">
        <p class="w-32">Member</p>
        <p id="personName"><?php echo esc_html($memberInfo['Forename']), ' ', esc_html($memberInfo['Surname']) ?></p>
      </div>

      <div class="flex pb-2">
        <p class="w-32">Dojo</p>
        <p id="Dojo"></p>
      </div>
      <form id="membersDojos"  method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'm_r_dojo_member_nonce' )?>">
        <input type="hidden" name="bkano" value="<?php echo $bkano ?>">
        <div id="artsDiv" class="hidden">
          <div class="flex pb-2">
            <p class="w-32">Arts Practiced</p>
            <select id="arts" name="Bubox">
            </select>
          </div>
        </div>
        <div id="modalText" class="flex flex-col">
        </div>
        <div class="text-center">
          <small class="field-msg js-form-submission">Submission in progress, Please wait &hellip;</small>
          <small class="field-msg success js-form-success">Details Successfully submitted, thank you!</small>
          <small class="field-msg error js-form-error">Could not update database. Please try again.  If this error persists please contact the membership secretary</small>
        </div>
        <div class="m-2 flex justify-around">
          <input type="button" id="cancelDojo" name="Cancel" tabindex="3" class="btn btn-blue cursor-pointer" value="Cancel">
          <input type="submit" id="saveDojo" name="FormsButton1" tabindex="4" class="btn btn-blue cursor-pointer" value="Submit" data-url="<?php echo get_page_link( $post->ID ) ?>">
        </div>
      </form>
    </div>
  </div>
</div>

<?php
