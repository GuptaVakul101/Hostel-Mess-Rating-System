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
