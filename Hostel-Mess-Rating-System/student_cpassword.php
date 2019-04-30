<?php
//connectivity
//require('config.php');
$q1 = "SELECT messName FROM mess";
$result = mysqli_query($con,$q1);
$str="";
$str2="";
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $str=$str."<option value=\"".$row["messName"]."\">".$row["messName"]."</option>";
  }
}
if(isset($_POST['submit']))
{
  $n = $_POST['uname'];
  $pass = $_POST['upass'];
  $p = md5($pass);//encrypt pass
  $em = $_POST['umail'];
  $gen = $_POST['gender'];
  $mob = $_POST['umob'];
  $add = $_POST['address'];
  $reshos=$_POST['reshos'];
  $mess=$_POST['mess'];
  //$img = $_FILES['file']['name'];
  //check user if already exists
  $q = "SELECT roll_no FROM users WHERE roll_no='$n'";
  $cq = mysqli_query($con,$q);
  $ret = mysqli_num_rows($cq);
  if($ret == true)
  {
    $str2= "<center><h2 style='color:red'>User with same Username(Roll) already exists</h2></center>";
  }
  //insert into database
  else
  {
    $query = "INSERT INTO users VALUES ('$n','$p','$em','$gen','$mob','$reshos',0,0,0,0,0,0,0,0,0,0,0,0,'$mess','')";
    mysqli_query($con,$query);
    $str2= "<center><h2 style='color:green'>Details Saved!</h2></center>";
  }
}
?>
<body>
<div align="center">
<h1 style="color:#414040"><u>MESS FEES</u></h1>
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
              <p><input type="submit" name="submit" value="Register"></p>
            </form>
          </div>
        </td>
  </tbody>
</table>
</div>
</body>
