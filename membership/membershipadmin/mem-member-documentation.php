<?php
// session_start();
// include("functions.php");
//
// $num = check_login();
// if ($num != 1 || check_admin('xj')!=1){
// //not logged in
// header("Location: my_account.php");
// exit;
// }

?>
<div class="">
  <h3 class="w-full bg-gray-400 my-0 py-2 text-center">Member Documentation</h3>
  <form name="LAYOUTFORM" enctype="multipart/form-data" action="../scripts/generatememberdata.php" method="post">
    <div class="flex py-4">
      <p class="w-48 pl-4 font-semibold">BKA No Range</p>
      <input class="mr-4 w-16 p-1 border border-blue-700" type="text" name="BKAno1">
      <p>to</p>
      <input class="mx-4 w-16 p-1 border border-blue-700" type="text" name="BKAno2">
      <input class="btn btn-gray border border-blue-700" type="submit" id="BKARange" name="BKArange" value="Add">
    </div>
    <div class="flex py-4">
      <p class="w-48 pl-4 font-semibold">Insurance Range</p>
      <input class="mr-4 w-16 p-1 border border-blue-700" type="text" name="Insno1">
      <p>to</p>
      <input class="mx-4 w-16 p-1 border border-blue-700" type="text" name="Insno2">
      <input class="btn btn-gray border border-blue-700" type="submit" id="InsuranceRange" name="InsRange" value="Add">
    </div>
    <div class="flex py-4">
      <p class="w-48 pl-4 font-semibold">BKA Nos</p>
      <textarea class="mr-4 border border-blue-700" name="freeform" rows="4" cols="36"></textarea>
      <div class="">
        <input class="btn btn-gray border border-blue-700" type="submit" id="BKANumbers" name="BKAnumbers" value="Add" >
      </div>
    </div>
    <p class="w-64 pl-4 py-4 font-semibold">Temp Upgrades (dates)</p>
    <div class="flex py-4">
      <p class="pl-4">From</p>
      <input class="mx-4 p-1 ui-widget-content ui-corner-all mydatepicker border border-blue-700" type="text" id="startdate" name="startdate" >
      <p>to</p>
      <input class="mx-4 p-1 ui-widget-content ui-corner-all mydatepicker border border-blue-700" type="text" id="enddate" name="enddate" >
      <input class="btn btn-gray border border-blue-700" type="submit" id="DateRange" name="DateRange" value="Add" >
    </div>
    <div>
      <p>file</p>
    </div>
  </form>
</div>
