<?php
session_start();
//connectivity
require('../config.php');
if(isset($_POST['admlogin']))
{
	$u = $_POST['admname'];
	$pass = $_POST['admpass'];
	$_SESSION['admin']=$u;
	$p = md5($pass);
	$q = "SELECT * FROM admin WHERE auser='$u' AND apass='$p'";
	$cq = mysqli_query($con,$q);
	$ret = mysqli_num_rows($cq);
	if($ret == true)
	{
		header('location:backend.php');
	}
	else
	{
		echo "<script>alert('Wrong Login Details, Try Again!')</script>";
	}
}
?>
<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"></head>
<body style="background-image:linear-gradient(white,black)">
<div align="center">

<form method="post">
<table width="1067" border="1" align ="center">
  <tbody>
    <tr>
      <td width="1057" height="59" bgcolor="#4D4C94"><center>
        <h1><strong style="color: #FFFFFF">ADMINISTRATOR LOGIN</strong></h1>
      </center></td>
    </tr>
    <tr align="center">
      <th style = "padding-left: 22em" align = "center" height="426" bgcolor="#969BEF">
		  <span style = "display:inline-grid;border:2px solid">
      <fieldset padding-left: 0.75em; align ="center" style="display:inline-flex"><legend><font size="+1">Backend Login</font></legend><p>Username : <input type="text" name="admname" placeholder="Admin Username">
      <p>Password : <input type="password" name="admpass" placeholder="Admin Password">
      <p><input class="btn btn-success" type="submit" value="Login" name="admlogin">&nbsp;<input class="btn btn-info" type="reset" value="Reset"></p></fieldset>
  </span>
      </th>
    </tr>
  </tbody>
</table>
</form>
</div>
</body>
