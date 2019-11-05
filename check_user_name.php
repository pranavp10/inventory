<?
require './connect.php';

if ($_POST['checkName'] != NULL) {

    $userName = $_POST['checkName'];
    $sqlCheckUser = "SELECT `user_name` FROM `user_login_credentials` WHERE `user_name`='$userName'";
    if ($rawUser = $connect->query($sqlCheckUser)) {
        $gotUser= mysqli_fetch_assoc($rawUser);
            if ($gotUser['user_name'] == NULL) {
                echo json_encode('yes');
            } else {
                echo json_encode('no');
            }
    }
}else{
    echo json_encode('no');
}

?>
