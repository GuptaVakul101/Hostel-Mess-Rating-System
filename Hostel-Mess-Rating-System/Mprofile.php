<?php
session_start();
//connectivity
require('config.php');

if($_SESSION['user']=="")
{
	header('location:index.php');
}

?>
<html>
<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"></head>
<head>
	<title>Sample School Project</title>
	<link rel="stylesheet" type="text/css" href="engine/css/slideshow.css" media="screen" />
	<style type="text/css">.slideshow a#vlb{display:none}</style>
	<script type="text/javascript" src="engine/js/mootools.js"></script>
	<script type="text/javascript" src="engine/js/visualslideshow.js"></script>
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>

	<style type="text/css" media="screen">
	#horizontalmenu ul
	{
		padding:1; margin:1; list-style:none;
	}
	#horizontalmenu li
	{
		float:left;
		position:relative;
		padding-right:89;
		display:block;
		border:0px solid #CC55FF;
		border-style:inset;
		margin-left:20px;
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
	<body style="background-image:linear-gradient(white,black)">
	<table width="1050px" align="center"  border="1">
		<tbody>
			<tr>
				<th height="39" colspan="2" style="background-color:#4E4E4E"><div style="text-align:left;color:#FFFFFF"><b><font size="+3"><a href="index.php" style="text-decoration:none ; color:#FFFFFF">Indian Institute of Technology, Guwahati</a></font></b><marquee direction="left" height="100%">
					Mess Management Portal is now Online!</marquee></div></th>
				</tr>
				<tr>
					<th height="317" colspan="2">
						<!--Slider-->
						<div id="wowslider-container1">
							<div class="ws_images"><ul>
								<li><img src="data1/images/1.jpg" alt="IITG GETS 7TH RANKING" title="IITG GETS 7TH RANKING" id="wows1_0"/></li>
								<li><img src="data1/images/2.jpg" alt="BEST INFRASTRUCTURE" title="BEST INFRASTRUCTURE" id="wows1_1"/></li>
								<li><img src="data1/images/3.jpg" alt="TOP CLASS EDUCATION" title="TOP CLASS EDUCATION" id="wows1_2"/></li>
								<li><img src="data1/images/4.jpg" alt="BEST MESS SERVICES" title="BEST MESS SERVICES" id="wows1_3"/></li>
							</ul></div>
							<div class="ws_bullets"><div>
								<a href="#" title="IITG GETS 7TH RANKING"><img src="data1/tooltips/1.jpg" alt="IITG GETS 7TH RANKING"/>1</a>
								<a href="#" title="BEST INFRASTRUCTURE"><img src="data1/tooltips/2.jpg" alt="International Accredition"/>2</a>
								<a href="#" title="BEST INFRASTRUCTURE"><img src="data1/tooltips/3.jpg" alt="BEST INFRASTRUCTURE"/>3</a>
								<a href="#" title="BEST MESS SERVICES"><img src="data1/tooltips/4.jpg" alt="BEST MESS SERVICES"/>4</a>
							</div></div>
							<span class="wsl"></span>
							<a href="#" class="ws_frame"></a>
						</div>
						<script type="text/javascript" src="engine1/wowslider.js"></script>
						<script type="text/javascript" src="engine1/script.js"></script>
						<!--slider end-->

					</th>
				</tr>
				<tr>
					<td height="38" colspan="2" style="background-color:#6E68FF">
						<a href="Mprofile.php?option=manager_myprofile" style="text-decoration:none ; color:#010101"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MY PROFILE</b></a>
						<a href="Mprofile.php?option=about" style="text-decoration:none ; color:#010101"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ABOUT</b></a>
						<a href="Mprofile.php?option=contact" style="text-decoration:none ; color:#010101"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONTACT</b></a>
						<a href="Mprofile.php?option=cpassword" style="text-decoration:none ; color:#010101"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHANGE PASSWORD</b></a>
						<a href="Mprofile.php?option=mess_report" style="text-decoration:none ; color:#010101"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MESS REPORT</b></a>
            <a href="Mprofile.php?option=notification" style="text-decoration:none ; color:#010101"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOTIFICATIONS</b></a>
						<a href="logout.php" style="text-decoration:none ; color:#010101"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT</b></a>
					</td>
					</tr>
					<tr>
						<td width="974" height="647" bgcolor="#D9D9D9" style="vertical-align:middle">
							<?php
							@$opt = $_GET['option'];
								switch($opt)
								{
									case 'manager_myprofile':
									include('manager_myprofile.php');
									break;
									case 'about':
									include('about.php');
									break;
									case 'contact':
									include('contact.php');
									break;
									case 'cpassword':
									include('manager_cpassword.php');
									break;
									case 'mess_report':
									include('mess_report.php');
									break;
									case 'notification':
									include('manager_notifications.php');
									break;
									default:
									include('about.php');
									break;
								}

								?>


							</td>
							<td width="343" style="background-color:#468EFF">
								<center><font size="+2"><b style="color:#191B7E"><div style="background-color:#969BFB">College Updates</div><br></b></font></center>
								<marquee direction="up" height="100%" onMouseOver="this.stop();" onMouseOut="this.start();">
									<center><a href="http://www.iitg.ac.in/home/pagesin/1" style="text-decoration:none"><font size="+1"><b>About IITG</b></font></a></center><br>
									<center><a href="http://intranet.iitg.ernet.in/" style="text-decoration:none"><font size="+1"><b>Intranet</b></font></a></center><br>
									<center><a href="https://intranet.iitg.ernet.in/cb/index.php" style="text-decoration:none"><font size="+1"><b>Complain Booking</b></font></a></center><br>
									<center><a href="https://202.141.80.5/~hab/" style="text-decoration:none"><font size="+1"><b>Hostel Affairs Board</b></font></a></center><br>
								</marquee>
							</td>
						</tr>
						<tr>
							<td height="25" colspan="2" style="background-color:#B8AFFF"><center><b>&copy; Managed by VAKUL GUPTA and UTKARSH JAIN</b></center></td>
						</tr>
					</tbody>
				</table>
			</body>
				</html>
