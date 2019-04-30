<?php
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
$cur_month="'Feedback_".$cur_month."'";

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
    $final_rating=$score/$total_count;
    mysqli_query($con,"UPDATE mess SET $cur_month=$final_rating WHERE messName='$messName'");
    if($final_rating <5){
      
    }
  }
}

?>




<html>
<body style="background-color:#E5E5E5">
  <table width="1023" height="700" border="1">
    <tbody>
    </tbody>
  </table>
</body>
</html>
