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
echo "<table height=\"200\" style=\"overflow:scroll\">";
echo "<tbody>";
while ($row = mysqli_fetch_assoc($cq)) {
    $id = $row['ID'];
    echo "<tr>";
    echo "<td>";
    echo "<form method=\"post\">";
    echo "<td><input type=\"hidden\" name=\"dummy\" value=\"". $row['ID'] . "\">" . $row['ID'] . "</td>";
    echo "<td>" . $row['Title'] . "</td>";
    echo('<td><input type="submit" name="view" value="VIEW"/> </td>');
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
        <!-- <form method="post" enctype="multipart/form-data">
            <fieldset style="display: inline-flex; background-color: #D8D8D8;"> -->

                <legend><font size="+2"><strong>DESCRIPTION</strong></font></legend>
                <p><b> </b><textarea class="FormElement" name="term" id="term" cols="40" rows="4" wrap="hard"><?php echo $noti_array[2];?></textarea>*</p>
            <!-- </form> -->
        </div>
        <?php
    }
    ?>
