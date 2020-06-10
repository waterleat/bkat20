<?php
// $table_member = 'mem_member';
// $table_memberdojo = 'mem_memberdojo';
// $table_dojo = 'mem_dojo';
// $table_dojoaddress = 'mem_dojoaddress';
// $table_drcmember = 'mem_drcmember';
// $table_coaches = 'mem_coaches';
$table_member = 'member';
$table_memberdojo = 'memberdojo';
$table_dojo = 'dojo';
$table_dojoaddress = 'dojoaddress';
$table_drcmember = 'drcmember';
$table_coaches = 'coaches';

$bkano = -1;
if (is_user_logged_in()) {
  $bkano = esc_attr( get_the_author_meta( 'bkano', get_current_user_id() ) );
}
// declare variables
$dojono = '';
$record = 1;

if (isset($_GET['dojo'])) {
  $dojono = $_GET['dojo'];

  if (!is_numeric($dojono)){
    echo "Invalid parameter dojo non numeric";
    die();
  }
  $dojono = intval($dojono);
}else{
  echo "Invalid parameter dojo not set";
  die();
}

if (isset($_GET['record'])) {
  $record = $_GET['record'];
  // echo '<p>record: ', $record, '</p>';
  if (!is_numeric($record)){
    echo "Invalid parameter record";
    die();
  }
  $record = intval($record);
}

$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

$dojoInfo = $mydb->get_row($mydb->prepare(
  "SELECT * FROM $table_dojo WHERE Dojono = %d",
  $dojono
), 'ARRAY_A');
if ($dojoInfo['SecretaryBKANo']==0) $dojoInfo['SecretaryBKANo']=" ";
// var_dump($dojoInfo);

$practice = $mydb->get_results($mydb->prepare(
  "SELECT Dojono,Address1,Address2,Address3,Address4,Address5,Postcode,Practice,latitude,longitude
  FROM $table_dojoaddress WHERE Dojono = %d
  ORDER BY Priority ASC",
  $dojono
), 'ARRAY_A');
// var_dump($practice);
$max= count($practice);
// var_dump($max);

if ($record > $max) $record=$max;
if ($record < $max) $next=$record+1;
if ($record > 1) $prev=$record-1;

$leader = $mydb->get_row($mydb->prepare(
  "SELECT Forename,Surname
  FROM $table_member m JOIN $table_dojo d ON m.BKAno=d.leaderBKAno
  WHERE d.dojono = %d",
  $dojono
), 'ARRAY_A');
// echo 'leader<br />';
// var_dump($leader);

$secretary = $mydb->get_row($mydb->prepare(
  "SELECT Forename,Surname
  FROM $table_member m JOIN $table_dojo d ON m.BKAno=d.secretaryBKAno
  WHERE d.dojono = %d",
  $dojono
), 'ARRAY_A');
// var_dump($secretary);
if ($secretary==NULL) {
  $secretary['Forename']=" ";
  $secretary['Surname']=" ";
  // var_dump($secretary);
}

$officer = $mydb->get_row($mydb->prepare(
  "SELECT Forename,Surname
  FROM $table_member m JOIN $table_dojo d ON m.BKAno=d.OfficialBKANo
  WHERE d.dojono = %d",
  $dojono
), 'ARRAY_A');
// var_dump($officer);
if ($officer==NULL) {
  $officer['Forename']=" ";
  $officer['Surname']=" ";
  // var_dump($officer);
}

$coaches = $mydb->get_results($mydb->prepare(
  "SELECT Memberno,Forename,Surname,Level,cbu,c.Insurance,PaidByDojo,CRB,c.Renewaldue
    FROM ($table_member m JOIN $table_memberdojo md ON m.BKAno = md.Memberno)
    JOIN (SELECT BKANo,bu AS cbu,level,insurance,CRB,PaidByDojo,Renewaldue FROM $table_coaches   )
    as c USING (BKAno)  WHERE m.Membershipstatus='Confirmed' AND
    (PaidByDojo = true OR md.status = 'Coach') AND md.dojo = %d
    ORDER BY Memberno,Level DESC",
  $dojono
), 'ARRAY_A');
// var_dump($coaches);


$drc = $mydb->get_results($mydb->prepare(
  "SELECT drc.Bu,Forename,Surname
  FROM $table_member m JOIN $table_drcmember drc ON m.BKAno = drc.BKAno
  WHERE drc.Dojo= %d",
  $dojono
), 'ARRAY_A');
// var_dump($drc);
$drccount= count($drc);

?>


<div id="dojo-details" class="w-full">
  <h2 class="m-0 py-2 text-center ">Dojo: <?php echo $dojono, ' ', esc_html($dojoInfo['DojoName']);?></h2>
  <div class="flex flex-col md:flex-row">
    <div class="mt-2 w-full md:w-1/2 flex-col">
      <h4 class="bg-gray-400 w-full pl-2 my-0 py-2">Dojo Officials</h4>
      <div class="mx-4 ">
        <div class="flex ">
          <div class="w-1/3 font-bold"><p>Leader</p></div>
          <div class="w-2/3"><p><?php echo esc_html( $leader['Forename']), ' ' , esc_html( $leader['Surname']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/3 font-bold"><p>BKA No</p></div>
          <div class="w-2/3"><p><?php echo esc_html( $dojoInfo['LeaderBKANo']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/3 font-bold"><p>Secretary</p></div>
          <div class="w-2/3"><p><?php echo esc_html( $secretary['Forename']), ' ' , esc_html( $secretary['Surname']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/3 font-bold"><p>BKA No</p></div>
          <div class="w-2/3"><p><?php echo esc_html( $dojoInfo['SecretaryBKANo']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/3 font-bold"><p>Contact</p></div>
          <div class="w-2/3"><p><?php echo esc_html( $dojoInfo['ContactName']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/3 font-bold"><p>Email</p></div>
          <div class="w-2/3"><p><a href="mailto:<?php echo esc_attr( $dojoInfo['ContactEmail'] )?>"><?php echo esc_html( $dojoInfo['ContactEmail'] )?></a></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/3 font-bold"><p>Phone</p></div>
          <div class="w-2/3"><p><?php echo esc_html($dojoInfo['ContactPhone']) ?></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/3 font-bold"><p>Website</p></div>
          <div class="w-2/3"><p><a href="<?php echo esc_url( $dojoInfo['Contactweb'], $protocols = null, $_context = 'display' ) ?>"><?php echo esc_url( $dojoInfo['Contactweb'], $protocols = null, $_context = 'display' ) ?></a></p></div>
        </div>
        <div class="flex ">
          <div class="w-1/3 font-bold"><p>Notes</p></div>
          <div class="w-2/3"><p><?php echo esc_textarea( $dojoInfo['Notes'] )?></p></div>
        </div>
      </div>
    </div>
    <div class="mt-2 w-full md:w-1/2 flex-col">
      <h4 class="bg-gray-400 w-full pl-2 my-0 py-2">Dojo Location and Practice Times </h4>
      <div class="mb-2">
        <?php $index = $record-1; ?>
        <input type="hidden" id="place_Lat" class=" ml-3 border border-blue-500" name="latitude" value="<?php echo ($practice) ? esc_attr($practice[$index]['latitude']) : 0 ; ?>" />
        <input type="hidden" id="place_Lng" class=" ml-3 border border-blue-500" name="longitude" value="<?php echo ($practice) ? esc_attr($practice[$index]['longitude']) : 0 ; ?>" />
        <?php if ($practice) { ?>
          <div class="flex flex-col ys:flex-row">
            <div class="w-full ys:w-1/2 pl-4">
              <p><?php echo esc_html($practice[$index]['Address1']) ?></p>
              <p><?php echo esc_html($practice[$index]['Address2']) ?></p>
              <p><?php echo esc_html($practice[$index]['Address3']) ?></p>
              <p><?php echo esc_html($practice[$index]['Address4']) ?></p>
              <p><?php echo esc_html($practice[$index]['Address5']) ?></p>
              <p><?php echo esc_html($practice[$index]['Postcode']) ?></p>
              <textarea rows="4" disabled class="py-2 w-full pl-0 sm:pl-8 md:pl-0 bg-white"><?php echo esc_textarea($practice[$index]['Practice']) ?></textarea>
            </div>
            <div id="map" class="w-full h-64 ys:w-1/2">
              <p>map goes here</p>
            </div>
          </div>
          <div class="flex text-center">
            <div class="w-1/3 font-bold"><?php if ($max>1 && $record>1) { ?>
              <p><a href="<?php echo get_page_link( get_page_by_title( 'dojo details' )->ID ); ?>?dojo=<?php echo $dojono; ?>&record=<?php echo $prev; ?>">Prev</a></p>
              <?php } ?>
            </div>
            <div class="w-1/3 "><?php if ($max>1) { ?>
              <p><?php echo $record; ?> of <?php echo $max; ?></p>
              <?php } ?>
            </div>
            <div class="w-1/3 font-bold"><?php if ($max>1 && $record<$max) { ?>
              <p><a href="<?php echo get_page_link( get_page_by_title( 'dojo details' )->ID ); ?>?dojo=<?php echo $dojono; ?>&record=<?php echo $next; ?>">Next</a></p>
              <?php } ?>
            </div>
          </div>

        <?php } else { ?>
          <p class="my-8 text-center">This dojo does not have any places to practice at the moment</p>
        <?php } ?>
        <div class="">
        </div>
        <div class="flex  justify-around">
          <div class=" font-bold"><p>Dojo practices: </p></div>
          <div class=""><p><?php
            if ($dojoInfo["kendo"]=="Yes") echo "Kendo  ";
            if ($dojoInfo["iaido"]=="Yes") echo "Iaido  ";
            if ($dojoInfo["jodo"]=="Yes") echo "Jodo";
          ?></p></div>
        </div>
      </div>
    </div>
  </div>

  <div class="">
    <h4 class="bg-gray-400 w-full pl-2 my-0 py-2">Coaches</h4>
    <div class="py-2 px-0 sm:px-4 bg-white overflow-x-auto">
      <table class=" w-128 sm:w-full table-auto">
        <thead class="">
          <th>BKAno</th>
          <th>Name</th>
          <th>Level</th>
          <th>Bu</th>
          <th>Ins Ref</th>
          <th>CRB Status</th>
        </thead>
        <tbody>
          <!-- // loop through dojo name arts and status -->
          <?php

          foreach ($coaches as $coach){
            ?>
            <tr>
              <td class="py-1"><?php echo esc_html( $coach['Memberno']) ?></td>
              <td class="py-1"><?php echo esc_html( $coach['Forename']), ' ' , esc_html( $coach['Surname']) ?></td>
              <td class="py-1"><?php echo esc_html( $coach['level']) ?></td>
              <td class="py-1"><?php echo esc_html( $coach['cbu']) ?></td>
              <td class="py-1"><?php echo esc_html( $coach['insurance']) ?></td>
              <td class="py-1"><?php echo esc_html( $coach['CRB']) ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>

  <?php
  // officers of dojo and administrator role
  if( ($bkano == $dojoInfo['LeaderBKANo']) || ($bkano == $dojoInfo['SecretaryBKANo']) || ($bkano == $dojoInfo['OfficialBKANo']) || current_user_can( 'manage_options' ) ) {
  ?>
    <div class="">
      <div class="mt-2 bg-pink-300 w-full">
        <h4 class="text-lg font-bold pl-2 mb-0 py-2">Personal & Membership Details (Dojo Officials view only)</h4>
      </div>
      <div class="flex flex-col md:flex-row bg-pink-200 pl-2 xs:px-4 pt-2">
        <div class="flex w-full md:w-2/3 flex-col">
          <div class="flex">
            <div class="w-1/2 flex">
              <p class="">Status</p>
              <p class="pl-2"><?php echo esc_html( $dojoInfo['Dojostatus']) ?></p>
            </div>
            <div class="w-1/2 flex">
              <p class="">Expires</p>
              <p class="pl-2"><?php echo esc_html( $dojoInfo['Renewaldue']) ?></p>
            </div>
          </div>
          <div class="flex">
            <p class="w-2/5 lg:w-1/2">Dojo Insurance Ref</p>
            <p class="w-3/5 lg:w-1/2"><?php echo esc_html( $dojoInfo['Insurance']) ?></p>
          </div>
          <div class="flex">
            <p class="w-2/5 lg:w-1/2">Dojo Officer</p>
            <p class="w-3/5 lg:w-1/2"><?php echo esc_html( $officer['Forename']), ' ' , esc_html( $officer['Surname']) ?></p>
          </div>
          <div class="flex">
            <p class="w-2/5 lg:w-1/2">Dojo Keyword</p>
            <p class="w-3/5 lg:w-1/2"><?php echo esc_html( $dojoInfo['keyword']) ?></p>
          </div>
          <div class="flex flex-col xs:flex-row">
            <p class="pb-0 xs:pb-2 xs:w-2/5 lg:w-1/2">Member status email</p>
            <p class="pl-12 xs:pl-0 pt-1 xs:pt-2 xs:w-3/5 lg:w-1/2"><?php echo esc_html($dojoInfo['MemberEmail']) ?></p>
          </div>
          <div class="flex flex-col xs:flex-row">
            <p class="pb-0 xs:pb-2 xs:w-2/5 lg:w-1/2">DRC Representatives</p>
            <div class="pl-12 xs:pl-0 xs:w-3/5 lg:w-1/2 flex-col ">
              <div class="w-full flex">
                  <p class="w-12 xs:w-1/4 py-1 xs:pt-2"><?php if ($drccount>0) {echo esc_html( $drc[0]['Bu']);}else{echo '';}?></p>
                  <p class="xs:w-3/4 py-1 xs:pt-2"><?php if ($drccount>0) {echo esc_html( $drc[0]['Forename']), ' ' , esc_html( $drc[0]['Surname']); }else{echo '';}?></p>
              </div>
              <div class="w-full flex">
                <p class="w-12 xs:w-1/4 py-1 "><?php if ($drccount>1) {echo esc_html( $drc[1]['Bu']);}else{echo '';}?></p>
                <p class="xs:w-3/4 py-1 "><?php if ($drccount>1) {echo esc_html( $drc[1]['Forename']), ' ' , esc_html( $drc[1]['Surname']); }else{echo '';}?></p>
              </div>
              <div class="w-full flex">
                <p class="w-12 xs:w-1/4 py-1 "><?php if ($drccount>2) {echo esc_html( $drc[2]['Bu']);}else{echo '';}?></p>
                <p class="xs:w-3/4 py-1 "><?php if ($drccount>2) {echo esc_html( $drc[2]['Forename']), ' ' , esc_html( $drc[1]['Surname']); }else{echo '';}?></p>
              </div>
            </div>
            <p class=""></p>
          </div>
        </div>
        <div class="w-full md:w-1/3 flex flex-row md:flex-col pt-2 flex-wrap justify-center">
          <div class="text-center w-full xs:w-1/2 md:w-full mb-2 ">
            <input type="button" id="dojoMembers" class="btn btn-gray md:w-full lg:w-2/3 mb-2 border border-blue-500"
            value="Administer Dojo Members" name="dojo-members?dojo="  onclick="relocate(this)"
            data-url="<?php echo get_page_link( get_page_by_title( 'dojo members' )->ID ),'?dojo=', $dojono ?>">
          </div>
          <div class="text-center w-full xs:w-1/2 md:w-full mb-2 ">
            <input type="button" id="contactDetails" class="btn btn-gray  md:w-full lg:w-2/3 mb-2 border border-blue-500"
            value="Modify Dojo Contact Details" name="change_dojo_contact_details" onclick="relocate(this)"
            data-url="<?php echo get_page_link( get_page_by_title( 'change dojo contact details' )->ID ),'?dojo=', $dojono ?>">
          </div>
          <div class="text-center w-full xs:w-1/2 md:w-full mb-2 ">
            <input type="button" id="sessionDetails" class="btn btn-gray  md:w-full lg:w-2/3 mb-2 border border-blue-500"
            value="Modify Dojo Session Details" onclick="relocate(this)"
            data-url="<?php echo get_page_link( get_page_by_title( 'change dojo session details' )->ID ),'?dojo=', $dojono, '&record=', $record?>">
          </div>
          <div class="text-center w-full xs:w-1/2 md:w-full mb-2 ">
            <input type="button" id="dojoOrganization" class="btn btn-gray  md:w-full lg:w-2/3 mb-2 border border-blue-500"
            value="Modify Dojo Organization" name="change_dojo_organisation" onclick="relocate(this)"
            data-url="<?php echo get_page_link( get_page_by_title( 'change dojo organization' )->ID ),'?dojo=', $dojono ?>">
          </div>
          <div class="text-center w-full xs:w-1/2 md:w-full mb-2 ">
            <input type="button" id="newdojoMember" class="btn btn-gray  md:w-full lg:w-2/3 mb-2 border" value="Register New Members" name="new_member" >
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>
<script type="text/javascript">
function relocate(obj) {
  var url = obj.getAttribute('data-url');
  location.assign(url);
};
</script>
