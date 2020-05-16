<?php
$mydb = new wpdb( MDB_USER, MDB_PASSWORD, MDB_NAME, MDB_HOST );

$modifyMember =  $mydb->get_row($mydb->prepare(
"SELECT BKAno,Surname,Forename,Memberno,Dojo,Bu,status FROM member
JOIN memberdojo ON member.BKAno = memberdojo.Memberno
WHERE Memberno = %d AND Dojo = %d",
$memberNo, $dojoNo
), 'ARRAY_A');
// var_dump($modifyMember);



?>

<h2 class="text-2xl font-bold py-2 bg-gray-400">Modify Member Status</h2>

<label for="">Member</label>
<input type="text" class="" value="">
<label for="">Current Status</label>
<input type="text" class="" value="">
<label for="">New Status</label>
<input type="text" class="" value="">
<label for="">New Status</label>







<select name="NewStatus" id="">
  <option value="None">None</option>
  <option value="Suspended">Suspended</option>
  <option value="Confirmed">Suspended</option>
  <option value="Coach">Coach</option>
</select>


<input type="button" class="label" value="Cancel">
<input type="button" class="label" value="Submit">


<p>You may change you dojo member&#8217;s status to one of the following: </p>

<p>None : This member is no longer associated with this dojo. </p>
<p>Confirmed : This member is a confirmed member of this dojo.</p>
<p>Suspended : This member is currently not attending this dojo but that is expected to change.</p>

<p>The member will be informed of this change of status by email.&nbsp; A member who does not have a confirmed dojo membership will not be able to renew their membership.</p>
