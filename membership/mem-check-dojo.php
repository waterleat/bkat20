<div class="bg-pink-200">
  <h1>dojo db check</h1>
  <?php
    $table_dojoaddress = 'dojoaddress';
    $bkano = -1;
    if (is_user_logged_in()) {
      $bkano = esc_attr( get_the_author_meta( 'bkano', get_current_user_id() ) );
    }

    // read mem db
    $bkadb = new wpdb( MDB_USER, MDB_PASSWORD, "newdb", MDB_HOST );

    // $myDojoInfo = $bkadb->get_results(
    $bkaDojoInfo = $bkadb->get_results(
      "SELECT * FROM $table_dojoaddress
      ORDER BY Dojono, Priority ASC", 'ARRAY_A');
    // display contents
    // foreach ($bkaDojoInfo as $bkadojo) {
    //   var_dump($bkadojo);
    //   echo "<br>";
    // }

    // read local db
    $mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

    // $bkaDojoInfo = $mydb->get_results(
    $myDojoInfo = $mydb->get_results(
      "SELECT * FROM $table_dojoaddress
      ORDER BY Dojono, Priority ASC", 'ARRAY_A');
    // foreach ($myDojoInfo as $dojo) {
    //   var_dump($dojo);
    //   echo "<br>";
    // }


    // compare
    echo "<p>";
    $i = $j = $k = 0;
    foreach ($bkaDojoInfo as $bkadojo) {
      $match = FALSE;
      $dojono = $bkadojo['Dojono'];
      $priority = $bkadojo['Priority'];
      // echo "found $dojono and $priority ";
      $i +=1;



      $err = FALSE;
      $line = "";
      $a1 = "";
      $a2 = "";
      $a3 = "";
      $a4 = "";
      $a5 = "";
      $pc = "";
      $pt = "";
    // echo '<p class="bg-green-300">';
      foreach ($myDojoInfo as $myDojo) {
        // $dojono = $myDojo['Dojono'];
        // $priority = $myDojo['Priority'];
        if (!$match) {
          if ( ($dojono == $myDojo['Dojono']) && ($priority == $myDojo['Priority']) ) {
            $line = " Matched $dojono and $priority ";
            $match = TRUE;
            if ($bkadojo['Address1'] == $myDojo['Address1']) {
              $line .= '<span class="text-green-500"> A1 </span>';
            }else{
              $line .= '<span class="text-red-500"> A1 </span>';
              $err = TRUE;
              $a1 = "bg-red-300";
            }
            if ($bkadojo['Address2'] == $myDojo['Address2']) {
              $line .= '<span class="text-green-500"> A2 </span>';
            }else{
              $line .= '<span class="text-red-500"> A2 </span>';
              $err = TRUE;
              $a2 = "bg-red-300";
            }
            if ($bkadojo['Address3'] == $myDojo['Address3']) {
              $line .= '<span class="text-green-500"> A3 </span>';
            }else{
              $line .= '<span class="text-red-500"> A3 </span>';
              $err = TRUE;
              $a3 = "bg-red-300";
            }
            if ($bkadojo['Address4'] == $myDojo['Address4']) {
              $line .= '<span class="text-green-500"> A4 </span>';
            }else{
              $line .= '<span class="text-red-500"> A4 </span>';
              $err = TRUE;
              $a4 = "bg-red-300";
            }
            if ($bkadojo['Address5'] == $myDojo['Address5']) {
              $line .= '<span class="text-green-500"> A5 </span>';
            }else{
              $line .= '<span class="text-red-500"> A5 </span>';
              $err = TRUE;
              $a5 = "bg-red-300";
            }
            if ($bkadojo['Postcode'] == $myDojo['Postcode']) {
              $line .= '<span class="text-green-500"> PC </span>';
            }else{
              $line .= '<span class="text-red-500"> PC </span>';
              $err = TRUE;
              $pc = "bg-red-300";
            }
            if ($bkadojo['Practice'] == $myDojo['Practice']) {
              $line .= '<span class="text-green-500"> PT </span>';
            }else{
              $line .= '<span class="text-red-500"> PT </span>';
              $err = TRUE;
              $pt = "bg-red-300";
            }
            if (0 == $myDojo['latitude']) {
              $line .= '<span class="text-red-500"> lat </span>';
            }
            if (0 == $myDojo['longitude']) {
              $line .= '<span class="text-red-500"> lon </span>';
            }
            if ($err) {
              echo "$line ";
              ?>
              <div class="flex">
                <div class="w-1/2">
                  <p><?php echo '<span class="' . $a1 . '">' . $bkadojo['Address1'] . "</span>"?><br>
                  <?php echo '<span class="' . $a2 . '">' . $bkadojo['Address2']  . "</span>"?><br>
                  <?php echo '<span class="' . $a3 . '">' . $bkadojo['Address3']  . "</span>"?><br>
                  <?php echo '<span class="' . $a4 . '">' . $bkadojo['Address4']  . "</span>"?><br>
                  <?php echo '<span class="' . $a5 . '">' . $bkadojo['Address5']  . "</span>"?><br>
                  <?php echo '<span class="' . $pc . '">' . $bkadojo['Postcode']  . "</span>"?><br>
                  <?php echo '<span class="' . $pt . '">' . $bkadojo['Practice']  . "</span>"?></p>
                </div>
                <div class="w-1/2">
                  <p><?php echo '<span class="' . $a1 . '">' . $myDojo['Address1']  . "</span>"?><br>
                  <?php echo '<span class="' . $a2 . '">' . $myDojo['Address2']  . "</span>"?><br>
                  <?php echo '<span class="' . $a3 . '">' . $myDojo['Address3']  . "</span>"?><br>
                  <?php echo '<span class="' . $a4 . '">' . $myDojo['Address4']  . "</span>"?><br>
                  <?php echo '<span class="' . $a5 . '">' . $myDojo['Address5']  . "</span>"?><br>
                  <?php echo '<span class="' . $pc . '">' . $myDojo['Postcode']  . "</span>"?><br>
                  <?php echo '<span class="' . $pt . '">' . $myDojo['Practice']  . "</span>"?></p>
                </div>
              </div>
              <p>------------------------------------</p>
              <?php
            }
          }
        }
      }
      if (!$match) {
        echo "no match for $dojono and $priority ";
        $err = TRUE;
        echo "<p>------------------------------------</p>";
        $k += 1;
      }
      if ($err) {
        $j += 1;
        $list[$j] = [
          'Dojono' => $dojono,
          'Priority' => $priority
        ];
        echo "<hr>";
      }
    }
    echo "<p>count is $i with $j differences and $k missmatched </p>";
    // list diffs
    // var_dump($list);

  ?>




</div>
