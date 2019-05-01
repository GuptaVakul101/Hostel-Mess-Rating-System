<?php
$n=$_SESSION['user'];
$row314=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM mess WHERE managerUsername='$n'"));
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
      <td bgcolor="#B4BEDC"><center><b>MESS NAME(IN CHARGE OF)</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $row314['messName']; ?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>USERNAME</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $row314['managerUsername']; ?></b></center></td>

    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>EMAIL</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $row314['email']; ?></b></center></td>

    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>MOBILE NUMBER</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $row314['contact']; ?></b></center></td>
    </tr>

  </tbody>
 </table>
 </div>
