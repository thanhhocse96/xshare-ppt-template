<?php 

$id = "";

$tid = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : "";
if (is_numeric($tid)) {
    $id = intval($_REQUEST["id"]);
} else {
    echo "* ID phải là số nguyên";
    exit;
}

$username = "root";
$password = "";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password)
or die("Unable to connect to MySQL");

//select a database to work with
$selected = mysqli_select_db($dbhandle, "xshare")
or die("Could not select xshare");

mysqli_query($dbhandle,"DELETE FROM users WHERE users.id = ".$id)
or die("DELETE FROM users WHERE users.id = ".$id);

echo "Success!";
mysqli_close($dbhandle);
?>