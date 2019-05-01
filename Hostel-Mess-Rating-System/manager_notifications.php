<?php
$user = $_SESSION['user'];
$IS_EDIT_CLICKED = false;
$noti_array;

if(isset($_POST['view']))
{
    $IS_EDIT_CLICKED = true;
    $id =$_POST['dummy'];
    $id="'$id'";
    $id=substr($id,1,strlen($id)-2);
    $query = "SELECT * FROM Notifications WHERE ID=";
    $query=$query."'$id'";
    $details_noti = mysqli_query($con,$query);
    $noti_array = mysqli_fetch_array($details_noti,MYSQLI_NUM);
}


?>
<?php
$q = "SELECT * FROM Notifications WHERE Destination = '$user'";
$cq = mysqli_query($con,$q);
echo "<div align=\"center\">";
// width="725" height="346" border="1"
echo "<table width=\"725\" height=\"346\" border=\"1\" style=\"overflow:scroll\">";
echo "<tbody>";
echo "<tr>";
  echo "<td height=\"50\" bgcolor=\"#7179CF\" style=\"color: #FFFFFF\"><center><font size=\"+2\"><b>ID</b></font></center></td>";
  echo "<td bgcolor=\"#7179CF\" style=\"color: #FFFFFF\"><center><font size=\"+2\"><b>TITLE</b></font></center></td>";
  echo "<td bgcolor=\"#7179CF\" style=\"color: #FFFFFF\"><center><font size=\"+2\"><b>ACTION</b></font></center></td>";
echo "</tr>";
while ($row = mysqli_fetch_assoc($cq)) {
    $id = $row['ID'];
    echo "<tr>";
    echo "<form method=\"post\">";
    echo "<td align = \"center\" height=\"30\" bgcolor=\"#B4BEDC\"><input type=\"hidden\" name=\"dummy\" value=\"". $row['ID'] . "\">" . $row['ID'] . "</td>";
    echo "<td align = \"center\" bgcolor=\"#B4BEDC\">" . $row['Title'] . "</td>";
    echo("<td bgcolor=\"#B4BEDC\" align = \"center\"><input type=\"submit\" name=\"view\" value=\"VIEW\"/> </td>");
    echo "</form>";
    echo "</tr>";
}
echo "<tr> <td> </td> <td> </td> <td> </td> </tr>";
echo "</tbody>";
echo "</table>";
?>
</div>
<?php

if($IS_EDIT_CLICKED){
    ?>
    <br>
    <br>
    <div align = "center" style = "border-style: inset" height = "200">
        <!-- <form method="post" enctype="multipart/form-data">
            <fieldset style="display: inline-flex; background-color: #D8D8D8;"> -->
                <legend><font size="+2"><strong>DESCRIPTION</strong></font></legend>
                <!-- <p><b> </b><textarea class="FormElement" name="term" id="term" cols="40" rows="4" wrap="hard"></textarea>*</p> -->
                <p><b><?php echo $noti_array[2];?></b></p>
            <!-- </form> -->
        </div>
        <?php
    }
    ?>
