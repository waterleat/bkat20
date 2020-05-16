<div class="flex bg-green-200">
  <div class="flex flex-col w-48 text-center mr-8">
    <h3 class="w-full bg-blue-700 text-white">Admin</h3>
    <h3 class="w-full bg-blue-700 text-white">Member Add/Edit</h3>
    <h3 class="w-full bg-blue-700 text-white">Member Grading Record</h3>
    <h3 class="w-full bg-blue-700 text-white">Member Registration</h3>
    <h3 class="w-full bg-blue-700 text-white">Dojo Admin</h3>
    <h3 class="w-full bg-blue-700 text-white">Dojo Listing</h3>
    <h3 class="w-full bg-blue-700 text-white">Historical Grading</h3>
    <h3 class="w-full bg-blue-700 text-white">Future Gradings</h3>
    <h3 class="w-full bg-blue-700 text-white">Event Admin</h3>
    <h3 class="w-full bg-blue-700 text-white">Member Documentation</h3>
    <h3 class="w-full bg-blue-700 text-white">Dojo Documentation</h3>
    <h3 class="w-full bg-blue-700 text-white">Officers</h3>
    <h3 class="w-full bg-blue-700 text-white">Individual Membership</h3>
    <h3 class="w-full bg-blue-700 text-white">Logout</h3>
  </div>
  <div class="">
    <h3 class="w-full bg-gray-400 py-2 text-center">Dojo Documentation</h3>
    <form name="LAYOUTFORM" enctype="multipart/form-data" action="../scripts/generatedojodata.php" method="post">
      <div class="flex py-4">
        <p class="w-48 pl-4 font-semibold">Dojo No Range</p>
        <input class="mr-4 w-16 p-1 border border-blue-700" type="text" name="Dojono1">
        <p>to</p>
        <input class="mx-4 w-16 p-1 border border-blue-700" type="text" name="Dojono2">
        <input class="btn btn-gray border border-blue-700" type="submit" id="DojoRange" name="DojoRange" value="Add">
      </div>
      <div class="flex py-4">
        <p class="w-48 pl-4 font-semibold">Insurance Range</p>
        <input class="mr-4 w-16 p-1 border border-blue-700" type="text" name="Insno1">
        <p>to</p>
        <input class="mx-4 w-16 p-1 border border-blue-700" type="text" name="Insno2">
        <input class="btn btn-gray border border-blue-700" type="submit" id="InsuranceRange" name="BKArange" value="Add">
      </div>
      <div class="flex py-4">
        <p class="w-48 pl-4 font-semibold">Dojo Nos</p>
        <textarea class="mr-4 border border-blue-700" name="freeform" rows="4" cols="36"></textarea>
        <div class="">
          <input class="btn btn-gray border border-blue-700" type="submit" id="DojoNumbers" name="BKArange" value="Add" >
        </div>
      </div>
      <div>
        <p>file</p>
      </div>
    </form>
  </div>
</div>
