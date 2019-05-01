<?php
echo "fvdsvds";
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
      echo $row['messName']."<br>";
    $messName=$row['messName'];
    $total_count=0;
    $score=0.0;
    $query=mysqli_query($con,"SELECT * FROM users WHERE Hostel_Mess='$messName'");
    if (mysqli_num_rows($query) > 0) {
      while($row2 = mysqli_fetch_assoc($query)) {
          echo $row2["roll_no"]."<br>";
         echo  $row2[$cur_month]."<br>";
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
        $query50 = "INSERT INTO Notifications VALUES ('','$title','$description','$var','$timestamp','High')";
        mysqli_query($con,$query50);
    }
  }
}
// $query = "UPDATE admin SET Current_Month = '$next_month' WHERE auser = 'admin'";
// mysqli_query($con,$query);
?>

<?php
$empty = "";
echo "mkwnofmesnmfklmdslkf";
$timestamp = time();
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
            echo $timestamp;
            echo $row["roll_no"];
            $query = "INSERT INTO Notifications VALUES ('','$title1','$description1','$result1_array[1]','$timestamp','Low')";
            mysqli_query($con,$query);
            $query4 = "INSERT INTO Notifications VALUES ('','$title2','$description2','$result2_array[1]','$timestamp','Low')";
            mysqli_query($con,$query4);
            $query = "UPDATE users SET Hostel_Mess = '$new_mess' , Mess_Request = '$empty' WHERE roll_no =".$row["roll_no"];
            echo $query;
            mysqli_query($con,$query);
        }
    }
}
?>

<html>
<head>
</head>
<body style="background-color:#E5E5E5">

    <table width="1023" height="700" border="1">
        <tbody>
        </tbody>
    </table>
</body>
</html>
