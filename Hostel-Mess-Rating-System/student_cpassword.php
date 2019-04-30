<?php
$str2="";
if(isset($_POST['submit']))
{
  $n=$_SESSION['user'];
  $query="SELECT password FROM users WHERE roll_no='$n'";
  $row=mysqli_fetch_assoc(mysqli_query($con,$query));
  $p=$row['password'];
  $opass=$_POST['opass'];
  $opass=md5($opass);
  $npass=$_POST['npass'];
  $npass=md5($npass);
  $npass2=$_POST['npass2'];
  $npass2=md5($npass2);
  if($p == $opass)
  {
    if($npass == $npass2){
      $query = "UPDATE users SET password='$npass' WHERE roll_no='$n'";
      mysqli_query($con,$query);
      $str2= "<center><h2 style='color:green'>Password Changed Successfully!!</h2></center>";
    }
    else {
      $str2= "<center><h2 style='color:red'>New Passwords do not match</h2></center>";
    }

  }
  //insert into database
  else
  {
    $str2= "<center><h2 style='color:red'>Old Password is Incorrect</h2></center>";
  }
}
?>
<body>
<div align="center">
<table width="1058" height="204" border="0">
  <tbody>
    <tr>
      <td>
        <div align="center">
          <form method="post" enctype="multipart/form-data">
            <fieldset style="display: inline-flex; background-color: #D8D8D8;">
              <legend><font size="+2"><strong>Change Password</strong></font></legend>
              <p><b>Old Password : </b><input type="password" name="opass" required/>*</p>
              <p><b>New Password : </b><input type="password" name="npass" required/>*</p>
              <p><b>Retype New Password : </b><input type="password" name="npass2" required/>*</p>
              <p><input type="submit" name="submit" value="Change Password"></p>
            </form>
          </div>
        </td>
        <?php echo $str2; ?>
  </tbody>
</table>
</div>
</body>
