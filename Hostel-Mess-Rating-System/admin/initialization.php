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
    $query=mysqli_query($con,"SELECT * FROM users WHERE Hostel_Mess='$messName'");
    if (mysqli_num_rows($query) > 0) {
      while($row2 = mysqli_fetch_assoc($query)) {

        $feedback=$row2[]
      }
    }

  }
}

?>
<?php
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
          $q2 = "SELECT managerUsername FROM mess WHERE messName = '$current_mess'";
          $result1 = mysqli_query($con,$q2);
          $q3 = "SELECT managerUsername FROM mess WHERE messName = '$new_mess'";
          $result2 = mysqli_query($con,$q3);
          $title1 = "";
          $description1 = "";
          $title2 = "";
          $description2 = "";
          $query = "INSERT INTO Notifications VALUES ('','$title1','$description1','$result1','$timestamp','Low')";
          mysqli_query($con,$query);
          $query = "INSERT INTO Notifications VALUES ('','$title2','$description2','$result2','$timestamp','Low')";
          mysqli_query($con,$query);
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
