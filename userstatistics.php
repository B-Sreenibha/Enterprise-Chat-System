<?php
SESSION_START();
$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM credentials");
$value=$conn->query("SELECT * FROM infobase");
$var1=$_POST['var1'];
$a=0;$b=0;$c=0;$d=0;$e=0;
?>
<HTML>
<HEAD>
<TITLE>Integrated Statistics</TITLE>
<link rel="stylesheet" href="style2.css" />
</HEAD>
<BODY>
<br>
<br>
<div id="tem">
<p align="right">
<a href="individualstats.php"> Go Back </a></p>
<h2 align="center"><b>Record Statistics:</b></h2>
<br>
<br>
<h3 align= "center">
Selected user Stats based on records available at database:
</h3>
<?php
if($value->num_rows !=0)
{
while($ans=$value->fetch_assoc())
{
		$sender=$ans['sender'];
		$receiver=$ans['receiver'];
		$msg_type=$ans['msg_type'];
		$msg=$ans['msg'];
		if($var1 == $sender)
		{ 
		if($msg_type == 0)
		{
		$a=$a+1;
		}
		else
		{
		$b=$b+1;
		}
		}
		if($var1 == $receiver)
		{
		if($msg_type == 0)
		{
		$c=$c+1;
		}
		else
		{
		$d=$d+1;
		}
		}
		if($var1 == $sender || $var1 == $receiver)
		{
		$e=$e+strlen($msg);
		}
		// Only message size is calculated but not binary files
}
}
else
{
echo "No result.";
}
?>
<table with="600" border="1" cellpadding="1" cellspacing="1" align="center">
<tr><td>User:					</td><td><?php echo $var1;?></td></tr>
<tr><td>Sent messages:			</td><td><?php echo $a;?></td></tr>
<tr><td>Received messages:		</td><td><?php echo $c;?></td></tr>
<tr><td>Sent Binary files:		</td><td><?php echo $b;?></td></tr>
<tr><td>Received Binary files:	</td><td><?php echo $d;?></td></tr>
<tr><td>Traffic Volume Exchanged:</td><td><?php echo "$e byte/s";?></td></tr>
</table>
</div>
</BODY>
</HTML>