<?php
$IS_EDIT_CLICKED = false;
$feedback_array;
if(isset($_POST['submit_del']))
{
    $id =$_POST['dummy'];
    $id="'$id'";
    $id=substr($id,1,strlen($id)-2);
    $query = "DELETE FROM Feedback WHERE Keyword=";
    $query=$query."'$id'";
    mysqli_query($con,$query);
}
if(isset($_POST['submit_edit']))
{
    $IS_EDIT_CLICKED = true;
    $id =$_POST['dummy'];
    $id="'$id'";
    $id=substr($id,1,strlen($id)-2);
    $query = "SELECT * FROM Feedback WHERE Keyword=";
    $query=$query."'$id'";
    $details_feedback = mysqli_query($con,$query);
    $ret = mysqli_num_rows($details_feedback);
    $feedback_array = mysqli_fetch_array($details_feedback,MYSQLI_NUM);
}

if(isset($_POST['submit']))
{
    $IS_EDIT_CLICKED = false;
    $keyword = $_POST['keyword'];
    $rating = $_POST['rating'];
    $query = "UPDATE Feedback SET Rating = '$rating' WHERE Keyword = '$keyword'";
    mysqli_query($con,$query);
    $str2= "<center><h2 style='color:green'>RATING UPDATED!</h2></center>";
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
                                    <li><a href="backend.php?option=feedback_management&suboption=add_feedback" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;" ><b>ADD KEYWORDS</b></a></li>
                                    <li><a href="backend.php?option=feedback_management&suboption=delete_or_modify_feedback" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>UPDATE/REMOVE KEYWORDS</b></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
            $q = "SELECT * FROM Feedback";
            $cq = mysqli_query($con,$q);
            echo "<table height=\"200\" style=\"overflow:scroll\">";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($cq)) {
                if($row['is_Keyword']==1 && $row['is_Rejected']==0){
                    $id = $row['Keyword'];
                    echo "<tr>";
                    echo "<td>";
                    echo "<form method=\"post\">";
                    echo "<td><input type=\"hidden\" name=\"dummy\" value=\"". $row['Keyword'] . "\">" . $row['Keyword'] . "</td>";
                    echo "<td>" . $row['Rating'] . "</td>";
                    echo('<td><input type="submit" name="submit_del" value="DELETE"/> </td>');
                    echo('<td><input type="submit" name="submit_edit" value="EDIT"/> </td>');
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
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
                        <legend><font size="+2"><strong>UPDATE feedback</strong></font></legend>
                        <p><b>KEYWORD : </b><input type="text" name="keyword" value ="<?php echo $feedback_array[0];?>" required readonly/>*</p>
                        <p><b>RATING</b>
                            <select name="rating" value ="<?php echo $feedback_array[1]; ?>" required/>
                            <option value=0 <?php if($feedback_array[1]==0){echo "selected";} ?>>0</option>
                            <option value=1 <?php if($feedback_array[1]==1){echo "selected";} ?>>1</option>
                            <option value=2 <?php if($feedback_array[1]==2){echo "selected";} ?>>2</option>
                            <option value=3 <?php if($feedback_array[1]==3){echo "selected";} ?>>3</option>
                            <option value=4 <?php if($feedback_array[1]==4){echo "selected";} ?>>4</option>
                            <option value=5 <?php if($feedback_array[1]==5){echo "selected";} ?>>5</option>
                            <option value=6 <?php if($feedback_array[1]==6){echo "selected";} ?>>6</option>
                            <option value=7 <?php if($feedback_array[1]==7){echo "selected";} ?>>7</option>
                            <option value=8 <?php if($feedback_array[1]==8){echo "selected";} ?>>8</option>
                            <option value=9 <?php if($feedback_array[1]==9){echo "selected";} ?>>9</option>
                            <option value=10 <?php if($feedback_array[1]==10){echo "selected";} ?>>10</option>
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
