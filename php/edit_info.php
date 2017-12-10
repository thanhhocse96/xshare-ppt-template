<?php
include("config/systemConfig.php");
$dbReference = new systemConfig();
$dbConnect = $dbReference->connectDB();

if (isset($_REQUEST['firstname']) && 
isset($_REQUEST['lastname']) &&
isset($_REQUEST['username']) &&
isset($_REQUEST['currentpassword']) &&
isset($_REQUEST['newpassword'])) {
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $username = $_REQUEST['username'];
    $currentpassword = $_REQUEST['currentpassword'];
    $newpassword = $_REQUEST['newpassword'];
}
else{
    $dbReference->sendResponse(200,'{"status":"error","message": "Error data"}');
    return;
}

if ($dbConnect == NULL) {
    $dbReference->sendResponse(503,'{"error":'.$dbReference->getStatusCodeMeeage(503)."}");
} else{
    $sql = 'SELECT * FROM users';
    $result = $dbConnect->query($sql);

    if($result->num_rows > 0){
        $user = false;
        while($row = $result->fetch_assoc()) {
            if ($username == $row['username']){
                $user = true;
                if ($row['apiKey'] == md5($currentpassword)){
                    $sql = 'UPDATE users SET firstname="'. $firstname .'", lastname="'. $lastname .'", apiKey="'.md5($newpassword).'" WHERE username="' . $username.'"';
                        if ($dbConnect->query($sql)) {
                            $dbReference->sendResponse(200,'{"status":"OK","message": "Update success."}');
                        } else {
                            $dbReference->sendResponse(200,'{"status":"error","message": "' . $dbConnect->error . '"}');
                        }
                }
                else
                    $dbReference->sendResponse(200,'{"status":"error","message": "Wrong current password"}');    
                return;
            }
        }
        if (!$user){
            $dbReference->sendResponse(200,'{"status":"error","message": "Account not exist"}');    
        }
    }else{
        $dbReference->sendResponse(200,'{"status":"error","message": "Account not exist"}');
    }
}
$dbConnect->close();
?>