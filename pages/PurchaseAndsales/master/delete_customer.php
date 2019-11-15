<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteEmployeeButton'])) {

    if ($_POST['deleteEmployeeId'] != NULL) {
        $delete_Employee_id = $_POST['deleteEmployeeId'];
    } else {
        echo "Employee ID Not selected";
        exit;
    }
    $sqlDeleteEmployee = "DELETE FROM `employees_details` WHERE `employees_details`.`emp_id` = '$delete_Employee_id'";
    if ($connect->query($sqlDeleteEmployee)) {
        $_SESSION['deleteEmployee'] = 'yes';
        header("Location: ../../../pages/hr/master/hr_master_employee.php");
    }else {
        $_SESSION['deleteEmployee'] = 'no';
        header("Location: ../../../pages/hr/master/hr_master_employee.php");
    }
}
?>
