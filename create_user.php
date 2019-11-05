<?
session_start();

require './connect.php';

if (isset($_POST['submitLoginDetails'])) {

    if ($_POST['loginId'] != NULL) {
        $user_Id = $_POST['loginId'];
    } else {
        echo "User ID Not Entered";
        exit;
    }
    if ($_POST['selectUser'] != '-select-') {
        $user = $_POST['selectUser'];
    } else {
        echo "User Not Select";
        exit;
    }

    if ($_POST['userLoginName'] != NULL) {
        $user_Login_Name = $_POST['userLoginName'];
    } else {
        echo "User Name Not entered";
        exit;
    }
    if ($_POST['userLoginPassword'] != NULL) {
        $user_Login_Password = $_POST['userLoginPassword'];
    } else {
        echo "User Login Password Not Entered";
        exit;
    }

    $sqlInsertUser = "INSERT INTO `user_login_credentials`(`login_id`, `employees_id`, `user_name`, `user_password`) VALUES ('$user_Id','$user','$user_Login_Name','$user_Login_Password')";
    $sqlLoginFlag = "UPDATE `employees_details` SET `emp_login_flag` = '0' WHERE `employees_details`.`emp_id` = '$user';";

    if ($connect->query($sqlLoginFlag)) {
        if ($connect->query($sqlInsertUser)) {
            $_SESSION["addUser"] = 'yes';
            header("Location: ../../../inventory/home_users.php");
        } else {
            $_SESSION["addUser"] = 'no';
            header("Location: ../../../inventory/home_users.php");
        }
    } else {
        $_SESSION["LoginFlag"] = 'no';
    }
} else {
    echo 'You did not click the button';
}
?>

