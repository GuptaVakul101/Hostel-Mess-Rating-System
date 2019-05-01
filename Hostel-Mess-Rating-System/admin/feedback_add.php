<?php
$q1 = "SELECT * FROM Feedback";
$result = mysqli_query($con,$q1);
$str="";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        if(!$row["is_Rejected"] && !$row["is_Keyword"]){
            $str=$str."<option value=\"".$row["Keyword"]."\">".$row["Keyword"]."</option>";
        }
    }
}
if(isset($_POST['submit_man']))
{
    $man_keyword = $_POST['man_keyword'];
    $man_rating = $_POST['man_rating'];
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
    $req_keyword = $_POST['req_keyword'];
    $req_rating = $_POST['req_rating'];
    $query = "UPDATE Feedback SET Rating = $req_rating , is_Keyword = 1 WHERE Keyword = '$req_keyword'";
    mysqli_query($con,$query);
    $str2= "<center><h2 style='color:green'>KEYWORD ADDED SUCCESSFULLY!!</h2></center>";
    // echo "<script> document.location = "
}

if(isset($_POST['submit_reject']))
{
    $req_keyword = $_POST['req_keyword'];
    $req_rating = $_POST['req_rating'];
    $query = "UPDATE Feedback SET is_Rejected = 1 WHERE Keyword = '$req_keyword'";
    mysqli_query($con,$query);
    $str2= "<center><h2 style='color:green'>KEYWORD REJECTED SUCCESSFULLY!!</h2></center>";
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
                            <span style = "display:inline-grid;border:2px solid">
                            <form method="post" enctype="multipart/form-data">
                                <fieldset style="display: inline-flex; background-color: #D8D8D8;">
                                    <legend><font size="+2"><strong>ADD KEYWORDS</strong></font></legend>
                                    <p><b> ADD MANUAL KEYWORD: </b><input type="text" name="man_keyword" required/>*</p>
                                    <p><b>RATING</b>
                                        <select name="man_rating" required/>
                                        <option value=0>0</option>
                                        <option value=1>1</option>
                                        <option value=2>2</option>
                                        <option value=3>3</option>
                                        <option value=4>4</option>
                                        <option value=5>5</option>
                                        <option value=6>6</option>
                                        <option value=7>7</option>
                                        <option value=8>8</option>
                                        <option value=9>9</option>
                                        <option value=10>10</option>
                                    </select>
                                    *</p>
                                    <p><input class="btn btn-success" type="submit" name="submit_man" value="ADD KEYWORD"></p>
                                </form>
                                <span>
                            </div>
                            <br>
                            <br>
                            <div align="center">
                                <span style = "display:inline-grid;border:2px solid">
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
                                        <p><b>RATING</b>
                                            <select name="req_rating" required/>
                                            <option value=0>0</option>
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                            <option value=6>6</option>
                                            <option value=7>7</option>
                                            <option value=8>8</option>
                                            <option value=9>9</option>
                                            <option value=10>10</option>
                                        </select>
                                        *</p>
                                        <p><input class="btn btn-success" type="submit" name="submit_req" value="ADD KEYWORD">
                                        <input class="btn btn-danger" type="submit" name="submit_reject" value="REJECT KEYWORD"></p>
                                    </form>
                                </span>
                                </div>
                            </td>
                        </tbody>
                    </table>
                </body>
                </html>
