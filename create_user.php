<?
session_start();

require './connect.php';

if (isset($_POST['submitLoginDetails'])) {

    if ($_POST['loginId'] != NULL) {
        $employee_Id = $_POST['loginId'];
    } else {
        echo "User ID Not Entered";
        exit;
    }
    if ($_POST['selectUser'] != '-select-') {
        $employee_Designation = $_POST['selectUser'];
    }
    else
    {
        echo "User Not Select";
        exit;
    }

    if ($_POST['userLoginName'] != NULL) {
        $employee_First_Name = $_POST['userLoginName'];
    }
    else
    {
        echo "User Name Not entered";
        exit;
    }
    if ($_POST['userLoginPassword'] != NULL) {
        $employee_Basic_Salary = $_POST['userLoginPassword'];
    }
    else
    {
        echo "User Login Password Not Entered";
        exit;
    }

    $sqlInsertUser = "INSERT INTO `employees_details` (`emp_id`, `emp_first_name`, `emp_last_name`, `emp_email`, `emp_designation`, `emp_dob`, `emp_gender`, `emp_address`, `emp_joining`, `emp_basic_salary`, `emp_login_flag`) VALUES ('$employee_Id', '$employee_First_Name', '$employee_Last_Name', '$employee_Email', '$employee_Designation', '$employee_DOB', '$employee_Gender','$employee_Address', '$employee_DO_Joining', '$employee_Basic_Salary','1');";

    echo $sqlInsertEmployee;
    if ($connect->query($sqlInsertEmployee)) {
        $_SESSION["addEmployee"] = 'yes';
        header("Location: ../../../pages/hr/master/hr_master_employee.php");
    }else {
        $_SESSION["addEmployee"] = 'no';
        header("Location: ../../../pages/hr/master/hr_master_employee.php");
    }
}else{
    echo 'You did not click the button';
}
?>
