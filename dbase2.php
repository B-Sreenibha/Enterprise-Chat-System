<?php
$conn = mysqli_connect("localhost","root","","adrec1");
$value=$conn->query("SELECT * FROM infobase");
?>
<HTML>
<HEAD>
<TITLE>Records</TITLE>
<link rel="stylesheet" href="style4.css" media="all"/>
</HEAD>
<BODY>
<br><br>
<br>
<div id="db">
<p align="right">
<a href="record.php"> Go Back </a></p><br>
<font size= 6><i><center>Logged in as Administrator</i></center></font>
<p align="center"><b>This page is only meant for authorized users...</b></p><br><br>
<h3 align="center"><b>Record list from database:</b></h3>
<br>
<br>
<table with="600" border="1" cellpadding="1" cellspacing="1" align="center">
<tr>
<th>content_id</th>
<th>sender</th>
<th>receiver</th>
<th>ip_sender</th>
<th>ip_receiver</th>
<th>message</th>
<th>timestamp</th>
<th>delivery_info</th>
<th>read_time</th>
<th>message_type</th>
</tr>
<?php
if($value->num_rows !=0)
{
while($ans=$value->fetch_assoc())
{
		$c_id=$ans['content_id'];
		$sender=$ans['sender'];
		$receiver=$ans['receiver'];
		$ip_s=$ans['ip_sender'];
		$ip_r=$ans['ip_receiver'];
		$msg=$ans['msg'];
		$dnt=$ans['datentime'];
		$d_i=$ans['delivery_info'];
		$r_t=$ans['read_time'];
		$msg_type=$ans['msg_type'];
		switch ($msg_type){
			case 0: $msg_type = "message"; break;
			case 1: $msg_type = "file"; break;
			}
		switch ($d_i){
			case 0: $d_i = "(R)"; break;
			case 1: $d_i = ""; break;
			}
		echo "
		<tr>
			<td>$c_id</td>
			<td>$sender</td>
			<td>$receiver</td>
			<td>$ip_s</td>
			<td>$ip_r</td>
			<td>$msg</td>
			<td>$dnt</td>
			<td>$d_i</td>
			<td>$r_t</td>
			<td>$msg_type</td>
		</tr>";
}
}
else
{
echo "No result.";
}
?>
</table>
</div>
</BODY>
</HTML>