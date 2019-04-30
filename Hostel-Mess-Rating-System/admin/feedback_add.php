<?php
$q1 = "SELECT Keyword FROM Feedback";
$result = mysqli_query($con,$q1);
$str="";
echo "nnvgikdsnfdkrnkri";
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
        echo (int)($row[1]);
        if($row["is_Rejected"]){
        }else{
            if($row["is_Keyword"]){
            }else{
                $str=$str."<option value=\"".$row["Keyword"]."\">".$row["Keyword"]."</option>";
            }
        }
    }
}
if(isset($_POST['submit_man']))
{
    $man_keyword = $_POST['man_keyword'];
    $man_rating = $_POST['man_rating'];
    //$img = $_FILES['file']['name'];
    //check feedback if already exists
    $q = "SELECT Keyword FROM Feedback WHERE Keyword='$man_keyword'";
    $cq = mysqli_query($con,$q);
    $ret = mysqli_num_rows($cq);
    if($ret == true)
    {
        $str2= "<center><h2 style='color:red'> KEYWORD ADDED MANUALLY ALREADY EXISTS </h2></center>";
        echo $str2;
    }
    //insert into database
    else
    {
        $query = "INSERT INTO Feedback VALUES ('$man_keyword',$man_rating,false,true)";
        mysqli_query($con,$query);
        $str2= "<center><h2 style='color:green'>KEYWORD ADDED SUCCESSFULLY!!</h2></center>";
    }
}

if(isset($_POST['submit_req']))
{
    $req_keyword = $_POST['man_keyword'];
    $req_rating = $_POST['req_rating'];
    $query = "INSERT INTO Feedback VALUES ('$req_keyword',$req_rating,false,true)";
    mysqli_query($con,$query);
    $str2= "<center><h2 style='color:green'>KEYWORD ADDED SUCCESSFULLY!!</h2></center>";
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
                                <li><a href="backend.php?option=feedback_management&suboption=add_feedback" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;" ><b>ADD KEYWORDS</b></a></li>
                                <li><a href="backend.php?option=feedback_management&suboption=delete_or_modify_feedback" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>UPDATE/REMOVE KEYWORDS</b></a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div align="center">
                            <form method="post" enctype="multipart/form-data">
                                <fieldset style="display: inline-flex; background-color: #D8D8D8;">
                                    <legend><font size="+2"><strong>ADD KEYWORDS</strong></font></legend>
                                    <p><b> ADD MANUAL KEYWORD: </b><input type="text" name="man_keyword" required/>*</p>
                                    <p><b>RATING</b><input type="text" name="man_rating" required/>*</p>
                                    <p><input type="submit" name="submit_man" value="ADD"></p>
                                </form>
                                <form method="post" enctype="multipart/form-data">
                                    <fieldset style="display: inline-flex; background-color: #D8D8D8;">
                                        <legend><font size="+2"><strong>ADD KEYWORDS</strong></font></legend>
                                        <p><b> KEYWORDS REQUIRED TO BE ADDED : </b>
                                            <select name="req_keyword" required/>
                                            <?php
                                            echo $str;
                                            ?>
                                        </select>
                                        *</p>
                                        <p><b>RATING</b><input type="text" name="req_rating" required/>*</p>
                                        <p><input type="submit" name="submit_req" value="ADD"></p>
                                    </form>
                            </div>
                        </td>
                    </tbody>
                </table>
            </body>
            </html>
