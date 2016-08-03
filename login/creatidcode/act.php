<?php

header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );   
header("Cache-Control: no-cache, must-revalidate" );

session_start();

$pword=$_POST['code'];
$sword=$_SESSION['code'];


if($_POST['code'] == $_SESSION['code'])
{
    echo 'ok';
}
else
{
    echo 'no';
	echo "<br>";
}
echo "pword:";
echo $pword;
echo "<br>";

echo "sword:";
echo $sword;
//echo "<br>";

?>