<?php
include("config/systemConfig.php");
$dbReference = new systemConfig();

if (isset($_REQUEST['firstname']) && 
isset($_REQUEST['lastname']) &&
isset($_REQUEST['email']) &&
isset($_REQUEST['username']) &&
isset($_REQUEST['password'])) {
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
}
else{
    $dbReference->sendResponse(200,'{"status":"error","message": "Error data"}');
    return;
}


//get cars
$dbConnect = $dbReference->connectDB();
if ($dbConnect == NULL) {
    $dbReference->sendResponse(503,'{"error":'.$dbReference->getStatusCodeMeeage(503)."}");
} else{
    $sql = "INSERT INTO users (username, apiKey, firstname, lastname, email, admin)
    VALUES ('" . $username . "','" . md5($password) ."','" . $firstname . "', '". $lastname . "', '" . $email . "', ' ')";
     
    if ($dbConnect->query($sql)) {
        $dbReference->sendResponse(200,'{"status":"OK","message": "Insert success."}');
    } else {
        $dbReference->sendResponse(200,'{"status":"error","message": "' . $dbConnect->error . '"}');
    }
}
$dbConnect->close();
?>