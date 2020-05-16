<?php
// $table_member = 'mem_member';
// $table_memberdojo = 'mem_memberdojo';
// $table_dojo = 'mem_dojo';
$table_member = 'member';
$table_memberdojo = 'memberdojo';
$table_dojo = 'dojo';

$bkano = esc_attr( get_the_author_meta( 'bkano', get_current_user_id() ) );
if (is_numeric($bkano)) {
  $bkano = intval($bkano);
}else{
  wp_redirect(WP_SITEURL,301);
}

$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

  // $memberQuery = "SELECT * FROM member WHERE BKAno = :bkano";
  // $mq = $pdo->prepare($memberQuery);
  // $mq->execute( [':bkano'=>$bkano] );
  // $member = $mq->fetch();
  $memberInfo =$mydb->get_row($mydb->prepare(
    "SELECT * FROM $table_member
    WHERE BKAno = %d",
    $bkano
  ),'ARRAY_A');

  // $dojosQuery = "SELECT Dojono,DojoName,Memberno,Dojo,Bu,status,Dojostatus,Insurance  FROM dojo JOIN memberdojo ON dojo.Dojono = memberdojo.dojo  WHERE Memberno = :bkano";
  // $dq = $pdo->prepare($dojosQuery);
  // $dq->execute( [':bkano'=>$bkano] );
  // $dojoInfo = $dq->fetchAll();
  // dojos
  $dojoInfo = $mydb->get_results($mydb->prepare(
    "SELECT Dojono,DojoName,Memberno,Dojo,Bu,status,Dojostatus,Insurance
    FROM $table_dojo d
    JOIN $table_memberdojo md
    ON d.Dojono = md.dojo
    WHERE Memberno = %d",
    $bkano
  ),'ARRAY_A');

?>

<div class="">
  <img id="printBtn" class="cursor-pointer" src="<?php bloginfo('template_directory') ?>/assets/dist/images/membership/click-here-to-print.jpg" alt="print">
</div>
<div id="printArea" class="p-8">
  <div class="flex">
    <div class="w-4/5 flex flex-col text-center">
      <h1 class="text-5xl font-bold">BRITISH KENDO ASSOCIATION</h1>
      <h2 class="text-4xl font-bold">Membership Certificate</h2>
    </div>
    <div class="w-1/5">
      <img src="<?php bloginfo('template_directory') ?>/assets/dist/images/BKA_logo.png" alt="logo">
    </div>
  </div>
  <div class="text-center">
    <?php
    if ( esc_html($memberInfo["Membershiptype"]) == "Temporary") {
      ?><h3 class="text-3xl font-bold ">TEMPORARY MEMBER</h3><?php
    }elseif ( esc_html($memberInfo["Membershiptype"]) == "Associate") {
      ?><h3 class="text-3xl font-bold ">ASSOCIATE MEMBER</h3><?php
    }else{
      ?><h3 class="text-3xl font-bold ">FULL MEMBER</h3><?php
    }
    ?>
  </div>
  <div class="text-lg">
    <p>This is to certify that</p>
    <p class="pl-8 text-2xl text-bold">
      <?php echo  esc_html($memberInfo['Forename']), ' ',  esc_html($memberInfo['Surname']) ?>
    </p>
    <p>of</p>
    <p class="pl-8 text-xl text-bold">
      <?php echo  esc_html($memberInfo['Address1']), '<br />',  esc_html($memberInfo['Address2']),
       '<br />',  esc_html($memberInfo['Address3']), '<br />',  esc_html($memberInfo['Address4']),
       '<br />',  esc_html($memberInfo['Address5']), '<br />',  esc_html($memberInfo['Postcode']) ?>
    </p>
  </div>
  <div class="text-lg ">
    <?php
    if ( esc_html($memberInfo['Membershiptype']) == "Temporary") {
      ?><p>is a temporary member of the British Kendo Association until <?php echo  esc_html($memberInfo['Renewaldue']); ?>.
      Holding Membership number [<?php echo  esc_html($memberInfo['BKAno']); ?>] and personal indemnity insurance unique reference number
      [<?php echo  esc_html($memberInfo['Insurance']); ?>].</p>
      <p>This member practices at the following BKA affiliated Dojo. BKA affiliated Dojo are covered by the BKA's Public Liability Insurance.&nbsp; The insurance reference number for each applicable Dojo is as shown.</p>
      <p>Temporary members are insured only in the use of wooden simulation weapons.</p><?php
    }elseif ( esc_html($memberInfo["Membershiptype"]) == "Associate") {
      ?><p>is an ASSOCIATE member of the British Kendo Association until <?php echo  esc_html($memberInfo['Renewaldue']); ?>.
      Holding Membership number [<?php echo  esc_html($memberInfo['BKAno']); ?>].</p>
      <p>Associate members are not covered by the BKA's personal indemnity insurance and are therefore not permitted to practice at any BKA dojo or event..</p><?php
    }else{
      ?><p>is a fully paid up and insured member of the British Kendo Association until <?php echo  esc_html($memberInfo['Renewaldue']); ?>.
      Holding Membership number [<?php echo  esc_html($memberInfo['BKAno']); ?>] and personal indemnity insurance unique reference number
      [<?php echo  esc_html($memberInfo['Insurance']); ?>].</p>
      <p>This member practices at the following BKA affiliated Dojo. BKA affiliated Dojo are covered by the BKA's Public Liability Insurance.&nbsp; The insurance reference number for each applicable Dojo is as shown.</p>
      <?php
    }
    ?>
  </div>
  <div class="px-8">
    <?php
    if ( ( esc_html($memberInfo['Membershiptype']) != "Associate") ) {?>
      <table class="border border-black p-2">
        <tr>
          <th class="border border-black p-2">Dojo Ref</th>
          <th class="border border-black p-2">Dojo Name</th>
          <th class="border border-black p-2">Insurance Reference</th>
          <th class="border border-black p-2">Dojo Compliance Status</th>
        </tr>
          <?php
          foreach ($dojoInfo as $onedojo){
          ?>
          <tr class="text-center">
            <td class="border border-black p-2"><p><?php echo esc_html($onedojo['Dojono'])?></p></td>
            <td class="border border-black p-2"><p><?php echo esc_html($onedojo['DojoName'])?></p></td>
            <td class="border border-black p-2"><p><?php echo esc_html($onedojo['Insurance'])?></p></td>
            <td class="border border-black p-2"><p><?php echo esc_html($onedojo['Dojostatus'])?></p></td>
          </tr>
        <?php } ?>
      </table><?php
    }
    ?>
  </div>
  <div class="text-lg">
    <p>The activities of BKA members and coaches are insured by Sportscover Europe Ltd under policy number PLON99/007542</p>
    <p>This certificate is valid from <?php echo  esc_html($memberInfo['Renewed']); ?> until <?php echo  esc_html($memberInfo['Renewaldue']); ?>. Confirmation of its authenticity can be obtained by contacting the BKA Membership Secretary <a href="mailto:membership@britishkendoassociation.com">membership@BritishKendoAssociation.com</a></p>
  </div>
  <div class="text-sm">
    <p>British Kendo Association <a href="www.britishkendoassociation.com">www.britishkendoassociation.com</a></p>

  </div>

</div>

<script type="text/javascript">
  var printBtn = document.querySelector('#printBtn');
  printBtn.addEventListener('click', function(){
    console.log('pressed');
    var printContents = document.querySelector('#printArea').innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  });
</script>
