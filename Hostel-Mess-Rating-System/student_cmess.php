<?php
$q1 = "SELECT messName FROM mess";
$result = mysqli_query($con,$q1);
$str="";
$str2="";
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $str=$str."<option value=\"".$row["messName"]."\">".$row["messName"]."</option>";
  }
}
if(isset($_POST['submit']))
{
  $n=$_SESSION['user'];
  $mess=$_POST['mess'];
  mysqli_query($con,"UPDATE users SET Mess_Request='$mess' WHERE roll_no='$n'");
  $str2="<center><h2 style='color:green'>Change Mess Request Sent</h2></center>";
}
?>
<body>
<div align="center">
<table width="600" height="204" border="0">
  <tbody>
    <tr>
      <td>
        <div align="center">
            <span style = "display:inline-grid;border:2px solid">
          <form method="post" enctype="multipart/form-data">
            <fieldset style="display: inline-flex; background-color: #D8D8D8;">
              <legend><font size="+2"><strong>Change Mess Request</strong></font></legend>
              <p><b>New Mess : </b>
                <select name="mess" required/>
                <?php
                echo $str;
                ?>
              </select>
              *</p>
              <p><input class="btn btn-success" type="submit" name="submit" value="Send Request"></p>
            </form>
            <span>
          </div>
        </td>
        <?php echo $str2; ?>
  </tbody>
</table>
</div>
</body>
