<?php
include('config/systemConfig.php');
$dbReference = new systemConfig();

if (isset($_REQUEST['username'])) {
    $username = $_REQUEST['username'];
}
else{
    $dbReference->sendResponse(200,'{"status":"error","message": "Error data"}');
    return;
}
if (isset($_REQUEST['password'])) {
    $password = $_REQUEST['password'];
}
else{
    $dbReference->sendResponse(200,'{"status":"error","message": "Error data"}');
    return;
}

//get cars
$dbConnect = $dbReference->connectDB();
if ($dbConnect == NULL) {
    $dbReference->sendResponse(503,'{"status":"error","message":'.$dbReference->getStatusCodeMeeage(503).'}');
} else{    
    $sql = 'SELECT * FROM users';
    $result = $dbConnect->query($sql);
    if($result->num_rows > 0){
        // output data of each row
        $apiKey = md5($password);
        $user = false;
        while($row = $result->fetch_assoc()) {
            if ($username == $row['username']){
                $user = true;
                if ($apiKey != $row['apiKey'])
                    $dbReference->sendResponse(200,'{"status":"error","message": "Wrong password"}');        
                else
                    $dbReference->sendResponse(200,'{"status":"OK","username":"'. $row['username'] .'", "apiKey":"'.$apiKey. '", "firstname":"'.$row['firstname'] . '", "admin":"' . $row['admin'] .'"}');
                return;
            }
        }
        if (!$user){
            $dbReference->sendResponse(200,'{"status":"error","message": "Account not exist"}');     
            return; 
        } 
    }else{
        $dbReference->sendResponse(200,'{"status":"error","message": "Account not exist"}');
    }
}
$dbConnect->close();
?>