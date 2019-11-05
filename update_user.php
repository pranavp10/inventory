<?
session_start();

require './connect.php';

if (isset($_POST['submitEditLoginDetails'])) {
    if ($_POST['editLoginId'] != NULL) {
        $user_Id = $_POST['editLoginId'];
    } else {
        echo "User ID Not Entered";
        exit;
    }
    if ($_POST['editUserLoginName'] != NULL) {
        $user_Login_Name = $_POST['editUserLoginName'];
    } else {
        echo "User Name Not entered";
        exit;
    }
    if ($_POST['editUserLoginPassword'] != NULL) {
        $user_Login_Password = $_POST['editUserLoginPassword'];
    } else {
        echo "User Login Password Not Entered";
        exit;
    }



    $sqlUpdateUser = "UPDATE `user_login_credentials` SET `user_name` = '$user_Login_Name', `user_password` = '$user_Login_Password' WHERE `user_login_credentials`.`login_id` = '$user_Id';";

        if ($connect->query($sqlUpdateUser)) {
            $_SESSION["updateUser"] = 'yes';
            header("Location: ../../../inventory/home_users.php");
        } else {
            $_SESSION["updateUser"] = 'no';
            header("Location: ../../../inventory/home_users.php");
        }
} else {
    echo 'You did not click the button';
}
?>