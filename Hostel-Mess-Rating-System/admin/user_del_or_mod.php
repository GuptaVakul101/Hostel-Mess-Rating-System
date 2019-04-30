<?php
$q1 = "SELECT messName FROM mess";
$result = mysqli_query($con,$q1);
$str="";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $str=$str."<option value=\"".$row["messName"]."\">".$row["messName"]."</option>";
    }
}
$IS_EDIT_CLICKED = false;
$user_array;
if(isset($_POST['submit_del']))
{
    $id = $_POST['dummy'];
    $query = "DELETE FROM users WHERE roll_no=".$id;
    mysqli_query($con,$query);
}
if(isset($_POST['submit_edit']))
{
    $IS_EDIT_CLICKED = true;
    $id = $_POST['dummy'];

    $query = "SELECT * FROM users WHERE roll_no=".$id;
    $details_user = mysqli_query($con,$query);
    $user_array = mysqli_fetch_array($details_user,MYSQLI_NUM);
}

if(isset($_POST['submit']))
{
    $IS_EDIT_CLICKED = false;
    $n = $_POST['uname'];
    $pass = $_POST['upass'];
    $p = md5($pass);//encrypt pass
    $em = $_POST['umail'];
    $gen = $_POST['gender'];
    $mob = $_POST['umob'];
    $add = $_POST['address'];
    $reshos=$_POST['reshos'];
    $mess=$_POST['mess'];

    $query = "UPDATE users SET password = '$p',email = '$em', gender = '$gen', mob = '$mob', Hostel_Res = '$reshos', Hostel_Mess = '$mess' WHERE roll_no = '$n'";
    mysqli_query($con,$query);
    $str2= "<center><h2 style='color:green'>PROFILE UPDATED!</h2></center>";
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
        <div align="center">
            <table width="1023" height="38" border="1">
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
                </tbody>
            </table>
            <?php
            $q = "SELECT * FROM users";
            $cq = mysqli_query($con,$q);
            echo "<table height=\"200\" style=\"overflow:scroll\">";
            echo "<tbody>";
            echo "<tr>";
              echo "<td height=\"30\" bgcolor=\"#7179CF\" style=\"color: #FFFFFF\"><center><font size=\"+2\"><b>Course</b></font></center></td>";
              echo "<td bgcolor=\"#7179CF\" style=\"color: #FFFFFF\"><center><font size=\"+2\"><b>Intake</b></font></center></td>";
              echo "<td bgcolor=\"#7179CF\" style=\"color: #FFFFFF\"><center><font size=\"+2\"><b>Duration</b></font></center></td>";
              echo "<td bgcolor=\"#7179CF\" style=\"color: #FFFFFF\"><center><font size=\"+2\"><b>Other</b></font></center></td>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($cq)) {
                $id = $row['roll_no'];
                echo "<tr>";
                echo "<td>";
                echo "<form method=\"post\">";
                echo "<td><input type=\"hidden\" name=\"dummy\" value=\" ". $row['roll_no'] . "\">" . $row['roll_no'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['Hostel_Mess'] . "</td>";
                echo('<td><input type="submit" name="submit_del" value="DELETE"/> </td>');
                echo('<td><input type="submit" name="submit_edit" value="EDIT"/> </td>');
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            ?>
        </div>
        <?php

        if($IS_EDIT_CLICKED){
            ?>
            <div align = "center">
                <form method="post" enctype="multipart/form-data">
                    <fieldset style="display: inline-flex; background-color: #D8D8D8;">
                        <legend><font size="+2"><strong>UPDATE PROFILE</strong></font></legend>
                        <p><b>UserName (Roll Number) : </b><input type="text" name="uname" value ="<?php echo $user_array[0];?>" required readonly/>*</p>
                        <p><b>Password : </b><input type="password" name="upass" value ="<?php echo $user_array[1]; ?>" required/>*</p>
                        <p><b>Email : </b><input type="email" name="umail" value ="<?php echo $user_array[2]; ?>" required/>*</p>
                        <p><b>Gender : </b><input type="radio" name="gender" value="m" <?php if($user_array[3]=="m"){echo "checked";} ?>>Male&nbsp;
                            <input type="radio" name="gender" value="f" <?php if($user_array[3]=="f"){echo "checked";} ?>>Female</p>
                            <p><b>Mobile No. : </b><input type="text" name="umob" value ="<?php echo $user_array[4]; ?>" required/>*</p>
                            <p><b>Residential Hostel : </b>
                                <select name="reshos" required/>
                                    <option value="Kapli" <?php if($user_array[5]=="Kapili"){echo "selected";} ?>>Kapili</option>
                                    <option value="Lohit" <?php if($user_array[5]=="Lohit"){echo "selected";} ?>>Lohit</option>
                                    <option value="Brahmaputra" <?php if($user_array[5]=="Brahmaputra"){echo "selected";} ?>>Brahmaputra</option>
                                    <option value="Kameng" <?php if($user_array[5]=="Kameng"){echo "selected";} ?>>Kameng</option>
                                    <option value="Barak" <?php if($user_array[5]=="Barak"){echo "selected";} ?>>Barak</option>
                                    <option value="Umiam" <?php if($user_array[5]=="Umiam"){echo "selected";} ?>>Umiam</option>
                                    <option value="Manas" <?php if($user_array[5]=="Manas"){echo "selected";} ?>>Manas</option>
                                    <option value="Dihing" <?php if($user_array[5]=="Dihing"){echo "selected";} ?>>Dihing</option>
                                    <option value="Dibang" <?php if($user_array[5]=="Dibang"){echo "selected";} ?>>Dibang</option>
                                    <option value="Subansri" <?php if($user_array[5]=="Subansri"){echo "selected";} ?>>Subansri</option>
                                    <option value="Dhansiri" <?php if($user_array[5]=="Dhansiri"){echo "selected";} ?>>Dhansiri</option>
                                </select>
                                *</p>
                                <p><b>Mess Subscribed : </b>
                                    <select name="mess" value ="<?php echo $user_array[18]; ?>" />
                                        <?php
                                        echo $str;
                                        ?>
                                    </select>
                                    *</p>
                                    <p><input type="submit" name="submit" value="UPDATE"></p>
                                </form>
                            </div>
                            <?php
                        }
                        ?>

                    </body>
                    </html>
