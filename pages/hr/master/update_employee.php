<?
session_start();
require '../../../connect.php';

if (isset($_POST['updateEmployeeButton'])) {
    if ($_POST['updateEmployeeId'] != NULL) {
        $employee_Id = $_POST['updateEmployeeId'];
    } else {
        echo "Employee ID Not Entered";
        exit;
    }

    if ($_POST['updateEmployeeFirstName'] != NULL) {
        $update_Employee_First_Name = ucfirst(strtolower($_POST['updateEmployeeFirstName']));
    }
    else
    {
        echo "FirstName Name Not Entered";
        exit;
    }
    if ($_POST['updateEmployeeLastName'] != NULL) {
        $update_Employee_Last_Name = ucfirst(strtolower($_POST['updateEmployeeLastName']));
    }
    else
    {
        $update_Employee_Last_Name="";
    }
    if ($_POST['updateEmployeeEmail'] != NULL) {
        $update_Employee_Email = $_POST['updateEmployeeEmail'];
    }
    else
    {
        echo "Email Not Entered";
        exit;
    }
    if ($_POST['updateEmployeeDOB'] != NULL) {
        $update_Employee_DOB_Raw = $_POST['updateEmployeeDOB'];
        $update_Employee_DOB = date('Y-m-d',strtotime($update_Employee_DOB_Raw));
    }
    else
    {
        echo "Date of Birth Not Entered";
        exit;
    }
    if ($_POST['updateEmployeeDesignation'] != "-select-") {
        $update_Employee_Designation = $_POST['updateEmployeeDesignation'];
    }
    else
    {
        echo "Designation Not Select";
        exit;
    }
    if ($_POST['updateEmployeeGender'] != NULL) {
        $update_Employee_Gender = ucfirst(strtolower($_POST['updateEmployeeGender']));
    }
    else
    {
        echo "Gender Not Select";
        exit;
    }
    if ($_POST['updateEmployeeBasicSalary'] != NULL) {
        $update_Employee_Basic_Salary = $_POST['updateEmployeeBasicSalary'];
    }
    else
    {
        echo "Employee Basic Salary Not Entered";
        exit;
    }
    if ($_POST['updateEmployeeDOJoining'] != NULL) {
        $update_Employee_DO_Joining_Raw = $_POST['updateEmployeeDOJoining'];
        $update_Employee_DO_Joining = date('Y-m-d',strtotime($update_Employee_DO_Joining_Raw));
    }
    else
    {
        echo "Date of joining Not Entered";
        exit;
    }
    
    if ($_POST['updateEmployeeAddress'] != NULL) {
        $update_Employee_Address = $_POST['updateEmployeeAddress'];
    }
    else
    {
        $update_Employee_Address = "";
    }
    $sqlUpdateEmployee = "UPDATE `employees_details` SET `emp_first_name` = '$update_Employee_First_Name', `emp_last_name` = '$update_Employee_Last_Name', `emp_email` = '$update_Employee_Email', `emp_designation` = '$update_Employee_Designation', `emp_dob` = '$update_Employee_DOB', `emp_gender` = '$update_Employee_Gender', `emp_address` = '$update_Employee_Address', `emp_joining` = '$update_Employee_DO_Joining', `emp_basic_salary` = '$update_Employee_Basic_Salary' WHERE `employees_details`.`emp_id` = '$employee_Id';";
    echo $sqlUpdateEmployee;

    if ($connect->query($sqlUpdateEmployee)) {
        $_SESSION["updateEmployee"] = 'yes';
        header("Location: ../../../pages/hr/master/hr_master_employee.php");
    }else {
        $_SESSION["updateEmployee"] = 'no';
        header("Location: ../../../pages/hr/master/hr_master_employee.php");
    }
}else{
    echo 'You did not click the button';
}
?>
