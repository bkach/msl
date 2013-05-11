<html>
<head>
</head>
<body>
<?php

	$link = mysql_connect("", 'root', 'root') or 
		die("Could not connect : " . mysql_error());
	mysql_select_db("db") or die("Could not select database");

	for ($i=0; $i<2000; $i++)
	{
		for ($j=1; $j<=24; $j++){
			if($j >= 9 and $j <= 17){
				$query = 
					"INSERT INTO appointments (dt, time, open)
					VALUES (
						DATE_ADD('2013-01-01',INTERVAL $i DAY),
						MAKETIME($j,00,00),
						1
						);";
			}
			else{
				$query = 
					"INSERT INTO appointments (dt, time, open)
					VALUES (
						DATE_ADD('2013-01-01',INTERVAL $i DAY),
						MAKETIME($j,00,00),
						0
						);";				
			}
			$result = mysql_query($query) or die("\n<br /><br />Query failed : " . mysql_error());
			//$num_rows = mysql_num_rows($result);
		}
	}
	mysql_close($link);

?>
</body>
</html>