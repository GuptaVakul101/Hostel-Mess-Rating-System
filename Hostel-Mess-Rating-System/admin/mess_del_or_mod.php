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
        <li><a href="backend.php?option=user_management&suboption=add_mess" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;" ><b>ADD HOSTEL MESS</b></a></li>
        <li><a href="backend.php?option=user_management&suboption=delete_or_modify_mess" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>UPDATE/REMOVE HOSTEL MESS</b></a></li>
      </ul>
    </div>
  </td>
</tr>
</tbody>
</table>
</body>
</html>
