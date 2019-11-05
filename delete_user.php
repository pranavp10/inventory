<?
session_start();

require './connect.php';

if (isset($_POST['deleteUserButton'])) {
    if ($_POST['deleteUserId'] != NULL) {
        $user_Id = $_POST['deleteUserId'];
    } else {
        echo "User ID Not Entered";
        exit;
    }

$sqlGetEmpId = "SELECT `employees_id` FROM user_login_credentials WHERE `login_id`='$user_Id'";
if($rawEmpId = $connect->query($sqlGetEmpId)){
    $empId= mysqli_fetch_assoc($rawEmpId);
    $user = $empId['employees_id'];
}


    $sqlDeleteUser = "DELETE FROM `user_login_credentials` WHERE `user_login_credentials`.`login_id` = '$user_Id';";
    $sqlLoginFlag = "UPDATE `employees_details` SET `emp_login_flag` = '1' WHERE `employees_details`.`emp_id` = '$user';";

    if ($connect->query($sqlLoginFlag)) {
        if ($connect->query($sqlDeleteUser)) {
            $_SESSION["deleteUser"] = 'yes';
            header("Location: ../../../inventory/home_users.php");
        } else {
            $_SESSION["deleteUser"] = 'no';
            header("Location: ../../../inventory/home_users.php");
        }
    } else {
        $_SESSION["LoginFlag"] = 'no';
    }
} else {
    echo 'You did not click the button';
}
?>

