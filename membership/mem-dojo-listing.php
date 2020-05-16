<?php
  // $table_member = 'mem_member';
  // $table_memberdojo = 'mem_memberdojo';
  // $table_dojo = 'mem_dojo';
  $table_member = 'member';
  $table_memberdojo = 'memberdojo';
  $table_dojo = 'dojo';

  $option = get_option( 'bka2019ds_plugin' );


  $mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

  if ( is_user_logged_in() ) {
    $bkano = esc_attr( get_the_author_meta( 'bkano', get_current_user_id() ) );
    if (is_numeric($bkano)) {
      $bkano = intval($bkano);
    }else{
      wp_redirect(WP_SITEURL,301);
    }

    $name = $mydb->get_row($mydb->prepare(
      "SELECT Forename, Surname FROM $table_member WHERE BKAno =%d",
      $bkano
    ), 'ARRAY_A');
    // var_dump($name);
  } else {
    $bkano = -1;
  }


  $r = $_SESSION['dojoregion'];
  $k = $_SESSION['dojokendo'];
  $i = $_SESSION['dojoiaido'];
  $j = $_SESSION['dojojodo'];
  $f = $_SESSION['dojofilter'];
  // var_dump($r);
  // var_dump($k);
  // var_dump($i);
  // var_dump($j);
  // var_dump($f);
?>
<h2 class="m-0 w-full bg-gray-400 py-2 text-center ">BKA Affiliated Dojo List</h2>
<div class="py-2 lg:pl-2 bg-white overflow-x-auto">

  <table class="w-160 md:w-full  table-auto">
    <tr class=""> <!-- header row -->
      <th class="">Dojo Name</th>
      <th class="">Location</th>
      <th class="">Region</th>
      <th class="">Kendo</th>
      <th class="">Iaido</th>
      <th class="">Jodo</th>
      <th class="">Details</th>
      <?php if ( is_user_logged_in() ) { ?>
        <th id="applyDojoMember"></th>
      <?php } ?>
    </tr>
    <tr>
      <form id=dojoListFilters  data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
        <td></td>
        <td></td>
        <td>
          <select id="RegionFilter" name="RegionFilter"  class="pl-1 border border-gray-700">
           <option value="0" <?php selected( $r, 0 ) ?>>All</option>
           <option value="Scotland" <?php selected( $r, 'Scotland' ) ?>>Scotland</option>
           <option value="Wales" <?php selected( $r, 'Wales' ) ?>>Wales</option>
           <option value="N.Ireland" <?php selected( $r, 'N.Ireland' ) ?>>N.Ireland</option>
           <option value="North East" <?php selected( $r, 'North East' ) ?>>North East</option>
           <option value="North West" <?php selected( $r, 'North West' ) ?>>North West</option>
           <option value="Midlands" <?php selected( $r, 'Midlands' ) ?>>Midlands</option>
           <option value="East" <?php selected( $r, 'East' ) ?>>East</option>
           <option value="South West" <?php selected( $r, 'South West' ) ?>>South West</option>
           <option value="South East" <?php selected( $r, 'South East' ) ?>>South East</option>
           <option value="London" <?php selected( $r, 'London' ) ?>>London</option>
          </select>
        </td>
        <td>
          <select id="KendoFilter" name="KendoFilter"  class="pl-1 border border-gray-700">
           <option value="0" <?php selected( $k, 0 ) ?>>Any</option>
           <option value="Yes" <?php selected( $k, 'Yes' ) ?>>Yes</option>
           <option value="No" <?php selected( $k, 'No' ) ?>>No</option>
          </select>
        </td>
        <td>
          <select id="IaidoFilter" name="IaidoFilter"  class="pl-1 border border-gray-700">
           <option value="0" <?php selected( $i, 0 ) ?>>Any</option>
           <option value="Yes" <?php selected( $i, 'Yes' ) ?>>Yes</option>
           <option value="No" <?php selected( $i, 'No' ) ?>>No</option>
          </select>
        </td>
        <td>
          <select id="JodoFilter" name="JodoFilter" class="pl-1 border border-gray-700">
           <option value="0" <?php selected( $j, 0 ) ?>>Any</option>
           <option value="Yes" <?php selected( $j, 'Yes' ) ?>>Yes</option>
           <option value="No" <?php selected( $j, 'No' ) ?>>No</option>
          </select>
        </td>
        <td>
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'filter_dojo_list_nonce' )?>">
          <input type="submit" id="dojoFilter" name="dojoFilter" value="Filter"  class="py-1 px-2 border border-black cursor-pointer rounded" data-url="<?php echo get_page_link( $post->ID ) ?>">
        </td>
        <td></td>
      </form>
    </tr>


    <!-- <div class="">

    </div> -->

    <?php
      $total = $mydb->query(" SELECT * FROM $table_dojo WHERE 1 $f");
      // echo 'total: ';
      // var_dump($total);




      // try {
      //   // Find out how many items are in the table
      //   $total = $pdo->query(" SELECT COUNT(*) FROM dojo ")->fetchColumn();

      // How many items to list per page
      $limit = 15;
      // How many pages will there be
      $pages = ceil($total / $limit);
      // What page are we currently on?
      $page = min($pages, filter_input(INPUT_GET, 'listdojo', FILTER_VALIDATE_INT, [
        'options' => [
          'default'   => 1,
          'min_range' => 1,
        ],
      ]));

      // Calculate the offset for the query
      $offset = ($page - 1)  * $limit;

      // Some information to display to the user
      $start = $offset + 1;
      $end = min(($offset + $limit), $total);

      // The "back" link
      // $prevlink = ($page > 1) ? '<a class="btn btn-blue" href="'.get_page_link( get_page_by_title( 'dojo listing' )->ID ).'?listdojo=1" title="First page">&laquo;</a> <a class="btn btn-blue" href="'.get_page_link( get_page_by_title( 'dojo listing' )->ID ).'?listdojo=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled btn btn-grey">&laquo;</span> <span class="disabled btn btn-grey ">&lsaquo;</span>';
      $prevlink = ($page > 1) ? '<a class="btn-small md:btn btn-blue" href="'.get_page_link( $post->ID ).'?listdojo=1" title="First page">&laquo;</a>
              <a class="btn-small md:btn btn-blue" href="'.get_page_link( $post->ID ).'?listdojo=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>'
        : '<span class="disabled btn-small md:btn btn-gray cursor-default">&laquo;</span> <span class="disabled btn-small md:btn btn-gray  cursor-default">&lsaquo;</span> ';


      // The "forward" link
      $nextlink = ($page < $pages) ? ' <a class="btn-small md:btn btn-blue" href="'.substr(get_page_link( get_the_ID() ), 0, -1).'?listdojo=' . ($page + 1) . '" title="Next page">&rsaquo;</a>
              <a class="btn-small md:btn btn-blue" href="'.rtrim(get_page_link( get_the_ID() ),'/').'?listdojo=' . $pages . '" title="Last page">&raquo;</a>'
        : '<span class="disabled btn-small md:btn btn-gray cursor-default">&rsaquo;</span> <span class="disabled btn-small md:btn btn-gray  cursor-default">&raquo;</span>';

    // Display the paging information
    ?>
    <div id="paging" class="justify-center pb-2 flex">
      <p class="flex-shrink-0"><?php echo $prevlink?></p>
      <p class="flex1 text-center mx-2"><?php echo' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' Results '?></p>
      <p class="flex-shrink-0"><?php echo $nextlink?></p>
    </div>
    <?php
      // // Prepare the paged query
      // $stmt = $pdo->prepare(" SELECT * FROM dojo ORDER BY DojoName LIMIT :limit OFFSET :offset ");
      //
      // // Bind the query params
      // $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
      // $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
      // $stmt->execute();
  // $w = $bkano . $f;
  // var_dump($w);

      // Prepare the paged query
      $rows = $mydb->get_results($mydb->prepare(
        // "SELECT *
        // FROM mem_dojo
        // JOIN mem_memberdojo b ON mem_dojo.Dojono=b.Dojo
        // where Memberno =  %d
        "SELECT Dojono,DojoName,Place,Region,kendo,iaido,jodo, b.status FROM $table_dojo d
        LEFT JOIN (SELECT * FROM $table_memberdojo WHERE `Memberno`= %d)AS b ON d.Dojono=b.Dojo
        WHERE 1 $f
        ORDER BY DojoName
        LIMIT %d OFFSET %d ",
        $bkano, $limit, $offset
      ), 'ARRAY_A');

      // // Bind the query params
      // $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
      // $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
      // $stmt->execute();

      // // Do we have any results?
      // if ($stmt->rowCount() > 0) {
      //   // Define how we want to fetch the results
      //   $stmt->setFetchMode(PDO::FETCH_ASSOC);
      //   $iterator = new IteratorIterator($stmt);

        // Display the results
        foreach ($rows as $row) {
          // echo '<p><a href="dojolisting.php?dojo1=', $row['Dojono'], '">', $row['DojoName'],' ',$row['Dojono'], '</a></p>';
          ?>
          <tr class="pb-4">
            <td class="py-1"><?php echo esc_html($row['DojoName']) ?></td>
            <td><?php echo esc_html($row['Place']) ?></td>
            <td><?php echo esc_html($row['Region']) ?></td>
            <td><?php echo esc_html($row['kendo']) ?></td>
            <td><?php echo esc_html($row['iaido']) ?></td>
            <td><?php echo esc_html($row['jodo']) ?></td>
            <td><a href="<?php echo get_page_link( get_page_by_title( 'dojo details' )->ID ),'?dojo=', intval($row['Dojono']), '&record=1' ?>">Details</a></td>
            <?php if ( (is_user_logged_in()) && ($option['membership_manager']) ) { ?>
              <td>
                <form method="post" class="applyDojo inline-block">
                  <input type="hidden" name="dojo" value="<?php echo intval($row['Dojono']) ?>">
                  <input type="hidden" name="dojoName" value="<?php echo esc_html($row['DojoName']) ?>">
                  <input type="hidden" name="kendo" value="<?php echo esc_html($row['kendo']) ?>">
                  <input type="hidden" name="iaido" value="<?php echo esc_html($row['iaido']) ?>">
                  <input type="hidden" name="jodo" value="<?php echo  esc_html($row['jodo']) ?>">
                  <input type="hidden" name="bkano" value="<?php echo  $bkano ?>">
                  <input type="hidden" name="status" value="<?php echo  esc_html($row['status']) ?>">
                  <input type="submit" value="Apply" class="applyDojo rounded cursor-pointer">
                </form>
              </td>
            <?php } ?>
          </tr>
          <?php

        }

      // } else {
      //   echo '<p>No results could be displayed.</p>';
      // }

    // } catch (Exception $e) {
    //   echo '<p>', $e->getMessage(), '</p>';
    // }
  ?>
  </table>
</div>
<?php
if ( (is_user_logged_in()) && ($option['membership_manager']) ) {
?>
<div id="myModal" class="popup">
  <!-- Modal content -->
  <div class="popup-content">
    <div class="popup-header">
       <span class="end">×</span>
       <!-- <h2>Header</h2> -->
       <h2 class="text-2xl font-bold py-2 bg-gray-400">Modify Dojo Member Status</h2>
    </div>
    <div class="popup-body flex flex-col">
      <div class="flex pt-2">
        <p class="w-32">Member</p>
        <p id="personName"><?php echo esc_html($name['Forename'])?>  <?php echo esc_html($name['Surname']) ?></p>
      </div>

      <div class="flex pb-2">
        <p class="w-32">Dojo</p>
        <p id="appliedDojo"></p>
      </div>

      <form id="applyDojoMemberForm" method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'apply_dojo_member_nonce' )?>">
        <div class="flex pb-2">
          <p class="w-32">Arts Practiced</p>
          <select id="arts" name="Bubox">
          </select>
        </div>
        <div id="inDojo">
          <p>Your current status with this dojo is &#8220;<span class="label" id="dojoStatus"></span>&#8221;. You cannot change this from here. This can only be changed by the dojo leader or secretary. If you wish to cancel this association that can be done from the member information page.</p>
          <input type="button" id="cancelApply1" name="Cancel" tabindex="2" class="btn btn-blue" value="Cancel" >
        </div>

        <div id="newDojo">
          <p>Click &#8216;Submit&#8217; to request confirmation of affiliation and arts practiced to this dojo. An e-mail will be sent to the dojo contact who will be required to confirm your status.</p>

          <div class="text-center">
            <small class="field-msg js-form-submission">Submission in progress, Please wait &hellip;</small>
            <small class="field-msg success js-form-success">Details Successfully submitted, thank you!</small>
        		<small class="field-msg error js-form-error">Could not update database. Please try again.  If this error persists please contact the membership secretary</small>
          </div>
          <div class="m-2 flex justify-around">
            <input type="button" class="btn btn-blue" value="Cancel" id="cancelApply2">
            <input type="button" class="btn btn-blue" value="Submit" id="saveApplyDojo" data-url="<?php// echo get_page_link( $post->ID ),'?dojo=', $dojono ?>">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php }
