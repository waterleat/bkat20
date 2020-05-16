<?php
// $table_grade = 'mem_grade';
// $table_grading = 'mem_grading';
$table_grade = 'grade';
$table_grading = 'grading';


function readableDate($ymd){
  $datearr = explode("-",$ymd);
    $dat1mo   = mktime(0,0,0,$datearr[1]-1,$datearr[2],$datearr[0]);
    $readable = $datearr[2];
    $readable .= '-';
    $readable .= $datearr[1];
    $readable .= '-';
    $readable .= $datearr[0];
    return $readable;
}


$bkano = esc_attr( get_the_author_meta( 'bkano', get_current_user_id() ) );
if (is_numeric($bkano)) {
  $bkano = intval($bkano);
}else{
  wp_redirect(WP_SITEURL,301);
}
// var_dump($bkano);
// $bkano=0;

$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

$gradinghistory = $mydb->get_results($mydb->prepare(
  "SELECT g.Bu,g.grade,gg.date,gg.place
  FROM $table_grade g
  JOIN $table_grading gg ON g.grading = gg.grading
  WHERE BKANo = %d
  ORDER BY gg.date ASC",
  $bkano
),'ARRAY_A');
// var_dump($gradinghistory);

?>
<h2 class=" my-0 py-3 bg-gray-400 text-center">Grading History for BKA no: <?php echo $bkano ?></h2>
<div class="p-8">
  <div class=" border-b-2 border-blue-400">
    <div class="flex flex-col">
      <div class="flex border-2 border-blue-400 p-4">
        <h3 class="text-xl font-bold w-1/4">Date</h3>
        <h3 class="text-xl font-bold w-1/4">Grade</h3>
        <h3 class="text-xl font-bold w-1/4">Bu</h3>
        <h3 class="text-xl font-bold w-1/4">Place</h3>
      </div>
      <?php foreach ($gradinghistory as $grade) { ?>
        <div class="flex border-l-2 border-r-2 border-blue-400 px-4">
          <p class="w-1/4 pl-2"><?php echo readableDate($grade['date'])?></p>
          <p class="w-1/4 pl-2"><?php echo esc_html($grade['grade'])?></p>
          <p class="w-1/4 pl-2"><?php echo esc_html($grade['Bu'])?></p>
          <p class="w-1/4 pl-2"><?php echo esc_html($grade['place'])?></p>
        </div>
      <?php } ?>
    </div>

  </div>
</div>
