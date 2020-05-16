<?php
// session_start();
// include("functions.php");
//
// $num = check_login();
// if ($num != 1 || check_admin('j')!=1){
// //not logged in
// header("Location: my_account.php");
// exit;
// }

?>
<?php
$myformat = 'd/m/Y';
$start = new DateTime("NOW");
?>
<div id="LayoutLYR">
  <?php
  // "Bu":[["NOF_isRequired", [''], "this field is required", "", ""]],
  // "Date":[["NOF_isValidDate", ['DD/MM/YYYY'], "DD/MM/YYYY format", "", ""], ["NOF_isRequired", [''], "this field is required", "", ""]],
  // "Place":[["NOF_isRequired", [''], "this field is required", "", ""], ["NOF_isLengthInRange", ['2', '20'], "the number of chars is not in the interval", "", ""]],
  // "Head":[["NOF_isLengthInRange", ['0', '20'], "the number of chars is not in the interval", "", ""]]
  ?>
  <!-- ../scripts/newgrading.php -->
  <h2 class="mt-0 bg-gray-400 py-3 text-center">Create New Grading</h2>
  <div class="pl-8">

    <form id="createGrading" method="post" data-url="<?php echo admin_url('/admin-ajax.php'); ?>">
      <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'create_grading_nonce' )?>">
      <div id="LayoutRegion1LYR" class="pl-8">
        <div class="flex py-2">
          <label class="w-32 " for="gradingBu">Bu</label>
          <select id="gradingBu" name="Bu" class="p-1 border border-blue">
            <option value="">Select</option>
            <option value="Kendo">Kendo</option>
            <option value="Iaido">Iaido</option>
            <option value="Jodo">Jodo</option>
          </select>
          <small class="mr-4 field-msg error js-gbu-error">You must choose a bu for the grading</small>
        </div>
        <div class="flex py-2">
          <label class="w-32 " for="gradingDate">Date</label>
          <input type="text" id="gradingDate" name="Date" size="14" maxlength="14" required class="p-1 border border-blue  ui-widget-content ui-corner-all mydatepicker">
          <small class="mr-4 field-msg error js-gdate-error">You must enter a valid date for the grading</small>
        </div>
        <div class="flex py-2">
          <label class="w-32 " for="gradingPlace">Place</label>
          <input type="text" id="gradingPlace" name="Place" size="14" maxlength="20" required class="p-1 border border-blue rounded">
          <small class="mr-4 field-msg error js-gplace-error">You must enter the location of the grading</small>
        </div>
        <div class="flex py-2">
          <label class="w-32 " for="gradingHead">Head of Panel</label>
          <input type="text" id="gradingHead" name="Head" size="14" maxlength="20" class="p-1 border border-blue">
        </div>

        <div class="flex justify-around mb-4">
          <input type="button" id="createGradingCancel" name="cancel" tabindex="3" class="btn btn-blue" value="Cancel">
          <input type="submit" id="createGradingSave" name="save" tabindex="4" class="btn btn-blue" value="Save">
        </div>
      </div>

    </form>
  </div>

</div>
