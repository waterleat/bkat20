<?php
// $table_member = 'mem_member';
// $table_memberdojo = 'mem_memberdojo';
// $table_grade = 'mem_grade';
// $table_grading = 'mem_grading';
$table_member = 'member';
$table_memberdojo = 'memberdojo';
$table_grade = 'grade';
$table_grading = 'grading';

if (isset($_GET['dojo'])) {
  $dojono = $_GET['dojo'];

  if (!is_numeric($dojono)){
  //   $_SESSION['dojono'] = $dojono;
  // }else{
    echo "Invalid parameter dojo non numeric";
    die();
  }
  $dojono = intval($dojono);
} else {
  echo "Invalid parameter dojo not set";
  die();
}

$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

$membersQuery = $mydb->get_results($mydb->prepare(
  // "SELECT Memberno,Forename,Surname,Membershiptype,Membershipstatus,Renewaldue,status,Insurance,
  //   k.bu AS kendo, k.grade AS KGRADE, x.date, i.bu AS iaido, i.grade AS IGRADE, y.date, j.bu AS jodo, j.grade AS JGRADE, z.date
  //   FROM mem_member JOIN mem_memberdojo ON BKAno = Memberno
  //   LEFT JOIN (SELECT * FROM mem_grade WHERE bu = 'Kendo' ) AS k ON k.BKAno = Memberno
  //   LEFT JOIN (SELECT * FROM mem_grading ORDER BY date) AS x ON x.grading = k.grading
  //   LEFT JOIN (SELECT * FROM mem_grade WHERE bu = 'Iaido' ) AS i ON i.BKAno = Memberno
  //   LEFT JOIN (SELECT * FROM mem_grading ORDER BY date) AS y ON y.grading = i.grading
  //   LEFT JOIN (SELECT * FROM mem_grade WHERE bu = 'Jodo'  ) as j ON j.BKAno = Memberno
  //   LEFT JOIN (SELECT * FROM mem_grading ORDER BY date) AS z ON z.grading = j.grading
  //   WHERE Dojo = %d
  //   ORDER BY Membershipstatus,Memberno ASC, x.date DESC, y.date DESC, z.date DESC",


  // "SELECT ms.Memberno, m.iaido, ggi.date As idate, m.jodo, ggj.date as jdate, m.kendo, ggk.date as kdate, g.grade, g.grading, m.Forename,m.Surname,m.Membershiptype,m.Membershipstatus,m.Renewaldue,ms.status,m.Insurance FROM mem_grade g
  // LEFT JOIN (SELECT gg.grading, gg.date , gg.Bu FROM mem_grading gg WHERE gg.Bu='Iaido' ) AS ggi ON g.grading=ggi.grading
  // LEFT JOIN (SELECT gg2.grading, gg2.date , gg2.Bu FROM mem_grading gg2 WHERE gg2.Bu='Jodo'  ) AS ggj ON g.grading=ggj.grading
  // LEFT JOIN (SELECT gg3.grading, gg3.date , gg3.Bu FROM mem_grading gg3 WHERE gg3.Bu='Kendo' ) AS ggk ON g.grading=ggk.grading
  // LEFT JOIN (SELECT BKAno,Forename,Surname,Membershiptype,Membershipstatus,Renewaldue,Insurance,kendo,iaido,jodo FROM mem_member) AS m ON m.BKAno=g.BKANo
  // LEFT JOIN (SELECT status, Memberno FROM mem_memberdojo  WHERE Dojo=%d ) AS ms ON g.BKANo=ms.Memberno
  // WHERE g.BKANo IN (SELECT md.Memberno FROM mem_memberdojo md WHERE md.Dojo=%d)
  // ORDER BY g.BKANo, ggi.date ASC, ggj.date ASC, ggk.date ASC",
  "SELECT md.Memberno,
  gg.date As date,
  m.iaido, m.jodo, m.kendo,
  g.grade, g.Bu, g.grading,
  m.Forename, m.Surname, m.Membershiptype, m.Membershipstatus, m.Renewaldue,
  md.status,
  m.Insurance
  FROM $table_member AS m
  JOIN $table_memberdojo AS md ON m.BKANo = md.Memberno
  LEFT JOIN $table_grade AS g ON g.BKANo = md.Memberno
  LEFT JOIN $table_grading AS gg ON g.grading = gg.grading
  WHERE md.Dojo = %d
  ORDER BY m.BKANo, gg.date ASC",
    $dojono
  ), 'ARRAY_A');
  // var_dump($membersQuery);

  $mem = -1;
  $memno ='';
  foreach ($membersQuery as $member) {
    // var_dump($member);die;
    // echo '<p>* ', $memno, '</p>';
    if ( $memno <> intval($member['Memberno']) ) {
      $mem = $mem + 1;
      $dms[$mem] = $member;
      $memno = esc_html($member['Memberno']);
      $dms[$mem]['IGRADE'] = '';
      $dms[$mem]['JGRADE'] = '';
      $dms[$mem]['KGRADE'] = '';
    }
    if ($member['Bu']=='Iaido'){
      $dms[$mem]['IGRADE'] =  esc_html($member['grade']);
    }
    elseif ($member['Bu']=='Jodo'){
      $dms[$mem]['JGRADE'] =  esc_html($member['grade']);
    }
    elseif ($member['Bu']=='Kendo'){
      $dms[$mem]['KGRADE'] =  esc_html($member['grade']);
    }
//     else { ($member['bu'])
// }
  }
  // var_dump($dms);
?>
<div id="adminDojoMembers">
  <h2 class="my-0 py-3 bg-gray-400 text-center">Dojo Members</h2>
  <div class="py-2 lg:pl-2 bg-white overflow-x-auto">
    <table class="w-256 lg:w-full  table-auto">
      <thead>
        <th>BKAno</th><th>Forename</th><th>Surname</th>
        <th>K-Grade</th><th>I-Grade</th><th>J-Grade</th>
        <th>Mem Type</th><th>Bu</th><th>Status</th>
        <th>Expires</th><th>Ins. Ref</th><th>Dojo Status</th><th></th>
      </thead>
      <tbody>
        <?php foreach ($dms as $member) { ?>
          <tr>
            <td class="p-1"><?php echo  esc_html($member['Memberno']) ?></td>
            <td class="p-1"><?php echo  esc_html($member['Forename']) ?></td>
            <td class="p-1"><?php echo  esc_html($member['Surname']) ?></td>
            <td class="p-1"><?php echo  esc_html($member['KGRADE']) ?></td>
            <td class="p-1"><?php echo  esc_html($member['IGRADE']) ?></td>
            <td class="p-1"><?php echo  esc_html($member['JGRADE']) ?></td>
            <td class="p-1"><?php echo  esc_html($member['Membershiptype']) ?></td>
            <td class="p-1"><?php if ( esc_html($member['kendo'])) echo 'K'; if ( esc_html($member['iaido'])) echo 'I'; if ( esc_html($member['jodo'])) echo 'J' ?></td>
            <td class="p-1"><?php echo  esc_html($member['Membershipstatus']) ?></td>
            <td class="p-1"><?php echo  esc_html($member['Renewaldue']) ?></td>
            <td class="p-1"><?php if ( esc_html($member['Membershipstatus']) <> "Expired") {echo  esc_html($member['Insurance']); }?></td>
            <td class="p-1"><?php echo  esc_html($member['status']) ?></td>
            <td class="">
              <form method="post" class=" inline-block">
                <input type="hidden" name="dojo" value="<?php echo $dojono ?>">
                <input type="hidden" name="member" value="<?php echo  esc_html($member['Memberno']) ?>">
                <input type="hidden" name="person" value="<?php echo  esc_html($member['Forename']), ' ',  esc_html($member['Surname']) ?>">
                <input type="hidden" name="status" value="<?php echo  esc_html($member['status']) ?>">
                <input type="submit" value="Change" class="changeCoach btn-small btn-gray ">
              </form>
            </td>
          </tr>
        <?php  } ?>
      </tbody>
    </table>
  </div>
  <div id="myModal" class="popup">
     <!-- Modal content -->
     <div class="popup-content">
        <div class="popup-header">
           <span class="end">×</span>
           <!-- <h2>Header</h2> -->
           <h2 class="text-2xl font-bold py-2 ">Modify Member Status</h2>
        </div>
        <div class="popup-body flex flex-col p-8">

          <div class="flex pt-2">
            <p class="w-32">Member</p>
            <p id="personName"></p>
          </div>
          <div class="flex pb-2">
            <p class="w-32">Current Status</p>
            <p id="currentStatus"></p>
          </div>

          <form id="changeDojoMemberStatus" method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
            <div class="flex py-2">
              <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'dojo_member_status_nonce' )?>">

              <label for="" class="w-32">New Status</label>
              <select name="NewStatus" id="newStatus" class=" p-1 border border-blue-500">
                <option value="None" >None</option>
                <option value="Suspended" >Suspended</option>
                <option value="Confirmed" >Confirmed</option>
                <option value="Coach" >Coach</option>
              </select>
            </div>
            <div class="text-center">
              <small class="field-msg js-form-submission">Submission in progress, Please wait &hellip;</small>
              <small class="field-msg success js-form-success">Details Successfully submitted, thank you!</small>
          		<small class="field-msg error js-form-error">Could not update database. Please try again.  If this error persists please contact the membership secretary</small>
            </div>
            <div class="m-2 flex justify-around">
              <input type="button" class="btn btn-blue" value="Cancel" id="cancelStatus">
              <input type="button" class="btn btn-blue" value="Submit" id="changeStatus" data-url="<?php echo get_page_link( $post->ID ),'?dojo=', $dojono ?>">
            </div>

          </form>


          <div class="pl-2 md:pl-8">
            <p>You may change you dojo member&#8217;s status to one of the following: </p>
            <div class="pl-2 md:pl-8">
              <div class="flex flex-col ys:flex-row">
                <p class="w-32 font-semibold">None : </p>
                <p class="flex-1 pt-0 ys:pt-2">This member is no longer associated with this dojo. </p>
              </div>
              <div class="flex flex-col ys:flex-row">
                <p class="w-32 font-semibold ">Confirmed : </p>
                <p class="flex-1 pt-0 ys:pt-2">This member is a confirmed member of this dojo.</p>
              </div>
              <div class="flex flex-col ys:flex-row">
                <p class="w-32 font-semibold">Suspended : </p>
                <p class="flex-1 pt-0 ys:pt-2">This member is currently not attending this dojo but that is expected to change.</p>
              </div>
            </div>
            <p>The member will be informed of this change of status by email.&nbsp; A member who does not have a confirmed dojo membership will not be able to renew their membership.</p>
          </div>
        </div>
     </div>
  </div>
</div>
