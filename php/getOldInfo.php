<?php
include('config/systemConfig.php');
$dbReference = new systemConfig();
$dbConnect = $dbReference->connectDB();

if (isset($_REQUEST['username'])) {
    $username = $_REQUEST['username'];
}
else{
    $dbReference->sendResponse(200,'{"status":"error","message": "Error data"}');
    return;
}

if ($dbConnect == NULL) {
    $dbReference->sendResponse(503,'{"status":"error","message":'.$dbReference->getStatusCodeMeeage(503).'}');
} else{    
    $sql = "SELECT firstname, lastname FROM users WHERE username='" . $username . "'";
    $result = $dbConnect->query($sql);
    if($result->num_rows > 0){
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $dbReference->sendResponse(200,'{"status":"OK","firstname":"'. $row['firstname'] .'", "lastname":"'.$row['lastname'].'"}');
                return;
        }
    }else{
        $dbReference->sendResponse(200,'{"status":"error","message": "Account not exist"}');
    }
}
$dbConnect->close();
?>