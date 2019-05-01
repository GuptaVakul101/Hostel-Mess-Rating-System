<?php
$str10="";
if(isset($_POST["submit"])){
    $ratings=array();
    $query_result=mysqli_query($con,"SELECT * FROM Feedback WHERE is_Keyword=1");
    if (mysqli_num_rows($query_result) > 0) {
        while($row = mysqli_fetch_assoc($query_result)) {
            $keyword_temp=$row['Keyword'];
            $ratings[$keyword_temp]=(int)$row['Rating'];
        }
    }
    $admin_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM admin"));
    $cur_month=$admin_row['Current_Month'];
    $cur_month="Feedback_".$cur_month;

    $query_result=mysqli_query($con,"SELECT * FROM mess");
    if (mysqli_num_rows($query_result) > 0) {
        while($row = mysqli_fetch_assoc($query_result)) {
            $messName=$row['messName'];
            $total_count=0;
            $score=0.0;
            $query=mysqli_query($con,"SELECT * FROM users WHERE Hostel_Mess='$messName'");
            if (mysqli_num_rows($query) > 0) {
                while($row2 = mysqli_fetch_assoc($query)) {
                    $count=0;
                    $user_score=0;
                    $feedback=$row2[$cur_month];
                    $feedback_array=explode(" ",$feedback);
                    for ($x = 0; $x < sizeof($feedback_array); $x++){
                        if(array_key_exists($feedback_array[$x],$ratings)){
                            $user_score +=$ratings[$feedback_array[$x]];
                            $count++;
                        }
                    }
                    if($count){
                        $score +=(float)$user_score/$count;
                        $total_count++;
                    }
                }
            }
            $final_rating;
            if($total_count){
                $final_rating=$score/$total_count;
            }else{
                $final_rating = 0;
            }
            $var = $row["managerUsername"];
            mysqli_query($con,"UPDATE mess SET $cur_month=$final_rating WHERE messName='$messName'");
            if($final_rating <5){
                $title = "POOR MESS RATING";
                $description = "YOUR MESS RATING FOR THE CURRENT MONTH IS ".$final_rating;
                $query50 = "INSERT INTO Notifications VALUES ('','$title','$description','$var',NOW(),'High')";
                mysqli_query($con,$query50);
            }
        }
    }
    $empty = "";
    $q1 = "SELECT * FROM users";
    $result = mysqli_query($con,$q1);
    $str="";
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($row["Mess_Request"] == ""){
            }else{
                $current_mess = $row["Hostel_Mess"];
                $new_mess = $row["Mess_Request"];
                $q2 = "SELECT * FROM mess WHERE messName = '$current_mess'";
                $result1 = mysqli_query($con,$q2);
                $result1_array = mysqli_fetch_array($result1,MYSQLI_NUM);
                $q3 = "SELECT * FROM mess WHERE messName = '$new_mess'";
                $result2 = mysqli_query($con,$q3);
                $result2_array = mysqli_fetch_array($result2,MYSQLI_NUM);

                $title1 = "STUDENT MESS CHANGE";
                $description1 = "THE STUDENT ".$row["roll_no"]." CHANGED MESS FROM ".$current_mess." TO ".$new_mess;
                $title2 = "STUDENT MESS CHANGE";
                $description2 = "THE STUDENT ".$row["roll_no"]." CHANGED MESS FROM ".$current_mess." TO ".$new_mess;
                $query = "INSERT INTO Notifications VALUES ('','$title1','$description1','$result1_array[1]',NOW(),'Low')";
                mysqli_query($con,$query);
                $query4 = "INSERT INTO Notifications VALUES ('','$title2','$description2','$result2_array[1]',NOW(),'Low')";
                mysqli_query($con,$query4);
                $query = "UPDATE users SET Hostel_Mess = '$new_mess' , Mess_Request = '$empty' WHERE roll_no =".$row["roll_no"];
                mysqli_query($con,$query);
            }
        }
    }
}
if(isset($_POST["submit2"])){
    $admin_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM admin"));
    $cur_month=$admin_row['Current_Month'];
    $next_month=((((int)$cur_month)%12)+1);
    $dum = (string)($next_month);
    $query21 = "UPDATE admin SET Current_Month = '$dum' WHERE auser ='admin'";
    mysqli_query($con,$query21);
}
?>

<html>
<head>
</head>
<body style="background-color:#E5E5E5">
    <div align = "center" style = "border-style: solid" height = "200" wrap="hard">
        <form method="post" enctype="multipart/form-data">
            <p><input type="submit" name="submit" value="EVALUATE FEEDBACK"></p>
            <p><input type="submit" name="submit2" value="CHANGE CURRENT MONTH"></p>
        </form>
    </div>
    <?php echo $str10 ?>
</body>
</html>
