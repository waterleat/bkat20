<?php
// $table_member = 'mem_member';
// $table_memberdojo = 'mem_memberdojo';
// $table_dojo = 'mem_dojo';
// $table_drcmember = 'mem_drcmember';
$table_member = 'member';
$table_memberdojo = 'memberdojo';
$table_dojo = 'dojo';
$table_drcmember = 'drcmember';


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

  $dojoInfo = $mydb->get_row($mydb->prepare(
    "SELECT * FROM $table_dojo WHERE Dojono = %d",
    $dojono
  ), 'ARRAY_A');
  // var_dump($dojoInfo);

  $members = $mydb->get_results($mydb->prepare(
    "SELECT Memberno,Forename,Surname
      FROM $table_member JOIN $table_memberdojo ON BKAno = Memberno
      WHERE Dojo = %d
      ORDER BY Memberno",
    $dojono
  ), 'ARRAY_A');
  // var_dump($members);

  $kdrcmembers = $mydb->get_results($mydb->prepare(
    "SELECT m.BKAno,Forename,Surname, bu
      FROM $table_member m JOIN $table_drcmember drc ON m.BKAno = drc.BKANo
      WHERE Dojo = %d AND Bu = 'Kendo'
      ORDER BY m.BKAno",
    $dojono
  ), 'ARRAY_A');
  // var_dump($kdrcmembers);

  $idrcmembers = $mydb->get_results($mydb->prepare(
    "SELECT m.BKAno,Forename,Surname, bu
      FROM $table_member m JOIN $table_drcmember drc ON m.BKAno = drc.BKANo
      WHERE Dojo = %d AND Bu = 'Iaido'
      ORDER BY m.BKAno",
    $dojono
  ), 'ARRAY_A');
  // var_dump($idrcmembers);

  $jdrcmembers = $mydb->get_results($mydb->prepare(
    "SELECT m.BKAno,Forename,Surname, bu
      FROM $table_member m JOIN $table_drcmember drc ON m.BKAno = drc.BKANo
      WHERE Dojo = %d AND Bu = 'Jodo'
      ORDER BY m.BKAno",
    $dojono
  ), 'ARRAY_A');
  // var_dump($jdrcmembers);

?>
<h2 class="mt-0 py-3 bg-gray-400 text-center">Change Dojo Organization</h2>
<form class="xs:ml-6" action="#" method="POST">
  <div class="p-2 xs:p-4">
    <div class="flex px-4 mb-2">
      <label class="w-1/4"for="">Dojo Secretary</label>
      <select id="Secretary" name="Secretary" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500">
        <option value=0>Please Select</option>
        <?php
          foreach ($members as $member){
            echo '<option value="', esc_html( $member['Memberno'] ), '" ',  selected( esc_html( $dojoInfo['SecretaryBKANo'] ), esc_html( $member['Memberno'] ) ), '>', esc_html( $member['Forename'] ), ' ', esc_html( $member['Surname'] ), '</option>';
          }
        ?>
      </select>
    </div>
    <div class="flex px-4 mb-2">
      <label class="w-1/4"for="">3rd Officer</label>
      <select id="Officer" name="Officer" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500">
        <option value=0>Please Select</option>
        <?php
          foreach ($members as $member){
            echo '<option value="', esc_html( $member['Memberno'] ), '" ',  selected( esc_html( $dojoInfo['OfficialBKANo'] ), esc_html( $member['Memberno'] ) ), '>', esc_html( $member['Forename'] ), ' ', esc_html( $member['Surname'] ), '</option>';
          }
        ?>
      </select>
    </div>
    <div class="flex px-4 mb-2">
      <label class="w-1/4"for="">Member email</label>
      <input type="text" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" value="<?php echo esc_html( $dojoInfo['MemberEmail'] ) ?>">
    </div>
    <div class="flex px-4 mb-2">
      <label class="w-1/4"for="">Dojo Keyword</label>
      <input type="text" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500" value="<?php echo esc_html( $dojoInfo['keyword'] ) ?>">
    </div>

    <?php if ($dojoInfo['kendo'] == 'Yes') {?>
      <div class="flex px-4 mb-2">
        <label class="w-1/4"for="">Dojo Rep - Kendo</label>
        <select id="KendoDRC" name="KendoDRC" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500">
          <option value=0>Please Select</option>
          <?php
          foreach ($members as $member){
            echo '<option value="', esc_html( $member['Memberno'] ), '" ',  selected( intval($kdrcmembers[0]['BKAno']), esc_html( $member['Memberno'] ) ), '>', esc_html( $member['Forename'] ), ' ', esc_html( $member['Surname'] ), '</option>';
          }
          ?>
        </select>
      </div>
    <?php } if ($dojoInfo['iaido'] == 'Yes') {?>
      <div class="flex px-4 mb-2">
        <label class="w-1/4"for="">Dojo Rep - Iaido</label>
        <select id="IaidoDRC" name="IaidoDRC" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500">
          <option value=0>Please Select</option>
          <?php
            foreach ($members as $member){
              echo '<option value="', esc_html( $member['Memberno'] ), '" ',  selected( intval($idrcmembers[0]['BKAno']), esc_html( $member['Memberno'] ) ), '>', esc_html( $member['Forename'] ), ' ', esc_html( $member['Surname'] ), '</option>';
            }
          ?>
        </select>
      </div>
    <?php } if ($dojoInfo['jodo'] == 'Yes') {?>
      <div class="flex px-4 mb-2">
        <label class="w-1/4"for="">Dojo Rep - Jodo</label>
        <select id="JodoDRC" name="jodoDRC" class="w-3/4 xs:w-3/5 sm:w-1/2 mb-2 p-1 border border-blue-500">
          <option value=0>Please Select</option>
          <?php
            foreach ($members as $member){
              echo '<option value="', esc_html( $member['Memberno'] ), '" ',  selected( intval($jdrcmembers[0]['BKAno']), esc_html( $member['Memberno'] ) ), '>', esc_html( $member['Forename'] ), ' ', esc_html( $member['Surname'] ), '</option>';
            }
          ?>
        </select>
      </div>
    <?php } ?>

    <div class="flex justify-around py-4">
      <input type="button" id="" class="btn btn-blue" value="Cancel" onclick="history.go(-1)" >
      <input type="submit" id="" class="btn btn-blue" value="Submit">
    </div>
  </div>
</form>
