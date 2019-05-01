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
                <li><a href="backend.php?option=user_management&suboption=add_user" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;" ><b>ADD USER</b></a></li>
                <li><a href="backend.php?option=user_management&suboption=delete_or_modify_user" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>UPDATE/REMOVE USER</b></a></li>
              </ul>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div align="center">
                <span style = "display:inline-grid;border:2px solid">
              <form method="post" enctype="multipart/form-data">
                <fieldset style="display: inline-flex; background-color: #D8D8D8;">
                  <legend><font size="+2"><strong>Registration</strong></font></legend>
                  <p><b>UserName (Roll Number) : </b><input type="text" name="uname" required/>*</p>
                  <p><b>Password : </b><input type="password" name="upass" required/>*</p>
                  <p><b>Email : </b><input type="email" name="umail" required/>*</p>
                  <p><b>Gender : </b><input type="radio" name="gender" value="m" >Male&nbsp;<input type="radio" name="gender" value="f">Female</p>
                  <p><b>Mobile No. : </b><input type="text" name="umob" required/>*</p>
                  <p><b>Residential Hostel : </b>
                    <select name="reshos" required/>
                    <option value="Kapli">Kapili</option>
                    <option value="Lohit">Lohit</option>
                    <option value="Brahmaputra">Brahmaputra</option>
                    <option value="Kameng">Kameng</option>
                    <option value="Barak">Barak</option>
                    <option value="Umiam">Umiam</option>
                    <option value="Manas">Manas</option>
                    <option value="Dihing">Dihing</option>
                    <option value="Dibang">Dibang</option>
                    <option value="Subansri">Subansri</option>
                    <option value="Dhansiri">Dhansiri</option>
                  </select>
                  *</p>
                  <p><b>Mess Subscribed : </b>
                    <select name="mess" required/>
                    <?php
                    echo $str;
                    ?>
                  </select>
                  *</p>
                  <p><input class="btn btn-success" type="submit" name="submit" value="Register"></p>
                </form>
            </span>
              </div>
            </td>


          </tbody>
        </table>
        <?php echo $str2 ?>
      </body>
      </html>
