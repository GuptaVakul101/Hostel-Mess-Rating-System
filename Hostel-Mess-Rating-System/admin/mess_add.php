<?php
//connectivity
//require('config.php');
error_reporting(1);
$con = mysqli_connect("localhost","root","","hostel");
if(isset($_POST['submit']))
{
  $mname = $_POST['messname'];
  $mmuname = $_POST['mess_manager_uname'];
  $pass = $_POST['pass'];
  $f1 = $_POST['mess_manager_email'];
  $f2 = $_POST['mess_manager_contact'];
  $p = md5($pass);//encrypt pass
  //check user if already exists
  $q = "SELECT messName FROM mess WHERE messName='$mname'";
  $cq = mysqli_query($con,$q);
  $ret = mysqli_num_rows($cq);
  if($ret == true)
  {
    $str2= "<center><h2 style='color:red'>Mess already exists</h2></center>";
  }
  //insert into database
  else
  {
    $query = "INSERT INTO mess VALUES ('$mname','$mmuname','$p','$f1','$f2',0,0,0,0,0,0,0,0,0,0,0,0)";
    mysqli_query($con,$query);
    $str2= "<center><h2 style='color:green'>Details Saved!</h2></center>";
  }
}
?>
<html>
<head>
  <style type="text/css" media="screen">
  #horizontalmenu ul
  {
    padding:1; margin:1; list-style:none;
  }
  #horizontalmenu li
  {
    float:left;
    position:relative;
    padding-right:50;
    display:block;
    border:0px solid #CC55FF;
    border-style:inset;
  }
  #horizontalmenu li ul
  {
    display:none;
    position:absolute;
  }
  #horizontalmenu li:hover ul{
    display:block;
    background:#C4C4C4;
    height:auto; width:8em;
  }
  #horizontalmenu li ul li
  {
    clear:both;
    border-style:none;}
    </style>
  </head>
  <body style="background-color:#E5E5E5">
    <table width="1023" height="700" border="1">
      <tbody>
        <tr>
          <td height="38" colspan="2" style="background-color:#6E68FF" style="vertical-align:text-top">
            <div id="horizontalmenu">
              <ul>
                <li><a href="backend.php?option=mess_management&suboption=add_mess" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;" ><b>ADD HOSTEL MESS</b></a></li>
                <li><a href="backend.php?option=mess_management&suboption=delete_or_modify_mess" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>UPDATE/REMOVE HOSTEL MESS</b></a></li>
              </ul>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div align="center">
              <form method="post" enctype="multipart/form-data">
                <fieldset style="display: inline-flex; background-color: #D8D8D8;">
                  <legend><font size="+2"><strong>Registration</strong></font></legend>
                  <p><b>MESS NAME : </b><input type="text" name="messname" required/>*</p>
                  <p><b>MESS MANAGER USERNAME : </b><input type="text" name="mess_manager_uname" required/>*</p>
                  <p><b>EMAIL : </b><input type="email" name="mess_manager_email" required/>*</p>
                  <p><b>CONTACT : </b><input type="text" name="mess_manager_contact" required/>*</p>
                  <p><b>PASSWORD : </b><input type="password" name="pass" required/>*</p>
                  <p><input type="submit" name="submit" value="Register"></p>
                </form>
              </div>
            </td>
        </tr>

          </tbody>
        </table>
        <?php echo $str2 ?>
      </body>
      </html>
