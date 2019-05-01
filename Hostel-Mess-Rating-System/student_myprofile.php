<?php
$n=$_SESSION['user'];
$row314=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE roll_no='$n'"));
 ?>


 <h1><center>PROFILE DETAILS</center></h1>
<div align="center">
<table width="725" height="346" border="1">
  <tbody>
    <tr>
      <td height="30" bgcolor="#7179CF" style="color: #FFFFFF"><center><font size="+2"><b>FIELD</b></font></center></td>
      <td bgcolor="#7179CF" style="color: #FFFFFF"><center><font size="+2"><b>VALUE</b></font></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>ROLL NO.</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $row314['roll_no']; ?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>EMAIL</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $row314['email']; ?></b></center></td>

    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>GENDER</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $row314['gender']; ?></b></center></td>

    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>MOBILE NUMBER</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $row314['mob']; ?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>HOSTEL</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $row314['Hostel_Res']; ?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>SUBSCRIBED MESS</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $row314['Hostel_Mess']; ?></b></center></td>
    </tr>
  </tbody>
</table>
</div>
