<?php
$IS_EDIT_CLICKED = false;
$mess_array;
if(isset($_POST['submit_del']))
{
    $id = $_POST['dummy'];
    $query = "DELETE FROM mess WHERE messName=".$id;
    mysqli_query($con,$query);
}
if(isset($_POST['submit_edit']))
{
    $IS_EDIT_CLICKED = true;
    $id =$_POST['dummy'];
    $id="'$id'";
    $id=substr($id,1,strlen($id)-2);
    echo $id;
    $query = "SELECT * FROM mess WHERE messName=";
    $query=$query."'$id'";
    echo $query;
    $details_mess = mysqli_query($con,$query);
    $ret = mysqli_num_rows($details_mess);
  	if($ret == true)
  	{
  		echo "bakchodi";
  	}
    $mess_array = mysqli_fetch_array($details_mess,MYSQLI_NUM);
    echo $mess_array;
    echo $mess_array[0];
    echo $mess_array[1];

}

if(isset($_POST['submit']))
{
    $IS_EDIT_CLICKED = false;
    $n = $_POST['mess_name'];
    $pass = $_POST['password'];
    $p = md5($pass);//encrypt pass
    $f = $_POST('manager_uname');

    $query = "UPDATE mess SET Password = '$p' managerUsername = '$f' WHERE messName = '$n'";
    mysqli_query($con,$query);
    $str2= "<center><h2 style='color:green'>MESS UPDATED!</h2></center>";
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
                                    <li><a href="backend.php?option=mess_management&suboption=add_mess" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;" ><b>ADD HOSTEL MESS</b></a></li>
                                    <li><a href="backend.php?option=mess_management&suboption=delete_or_modify_mess" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>UPDATE/REMOVE HOSTEL MESS</b></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
            $q = "SELECT * FROM mess";
            $cq = mysqli_query($con,$q);
            echo "<table height=\"200\" style=\"overflow:scroll\">";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($cq)) {
                $id = $row['messName'];
                echo "<tr>";
                echo "<td>";
                echo "<form method=\"post\">";
                echo "<td><input type=\"hidden\" name=\"dummy\" value=\"". $row['messName'] . "\">" . $row['messName'] . "</td>";
                echo "<td>" . $row['managerUsername'] . "</td>";
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
                        <legend><font size="+2"><strong>UPDATE MESS</strong></font></legend>
                        <p><b>MESS NAME : </b><input type="text" name="mess_name" value ="<?php echo $mess_array[0];?>" required readonly/>*</p>
                        <p><b>MESS MANAGER USERNAME : </b><input type="text" name="manager_uname" value ="<?php echo $mess_array[1]; ?>" required/>*</p>
                        <p><b>PASSWORD : </b><input type="password" name="password" value ="<?php echo $mess_array[2]; ?>" required/>*</p>
                        <p><input type="submit" name="submit" value="UPDATE"></p>
                    </form>
                </div>
                <?php
            }
            ?>

        </body>
        </html>
