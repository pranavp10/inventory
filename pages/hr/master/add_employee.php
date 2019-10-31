<?
session_start();
require '../../../connect.php';

if (isset($_POST['addEmployeeButton'])) {

    if ($_POST['employeeId'] != NULL) {
        $employee_Id = $_POST['employeeId'];
    } else {
        echo "Employee ID Not Entered";
        exit;
    }

    if ($_POST['employeeFirstName'] != NULL) {
        $employee_First_Name = ucfirst(strtolower($_POST['employeeFirstName']));
    }
    else
    {
        echo "FirstName Name Not Entered";
        exit;
    }
    if ($_POST['employeeLastName'] != NULL) {
        $employee_Last_Name = ucfirst(strtolower($_POST['employeeLastName']));
    }
    else
    {
        $employee_Last_Name="";
    }
    if ($_POST['employeeEmail'] != NULL) {
        $employee_Email = $_POST['employeeEmail'];
    }
    else
    {
        echo "Email Not Entered";
        exit;
    }
    if ($_POST['employeeDOB'] != NULL) {
        $employee_DOB_Raw = $_POST['employeeDOB'];
        $employee_DOB = date('Y-m-d',strtotime($employee_DOB_Raw));
    }
    else
    {
        echo "Date of Birth Not Entered";
        exit;
    }
    if ($_POST['employeeDesignation'] != "-select-") {
        $employee_Designation = $_POST['employeeDesignation'];
    }
    else
    {
        echo "Designation Not Select";
        exit;
    }
    if ($_POST['employeeGender'] != NULL) {
        $employee_Gender = ucfirst(strtolower($_POST['employeeGender']));
    }
    else
    {
        echo "Gender Not Select";
        exit;
    }
    if ($_POST['employeeBasicSalary'] != NULL) {
        $employee_Basic_Salary = $_POST['employeeBasicSalary'];
    }
    else
    {
        echo "Employee Basic Salary Not Entered";
        exit;
    }
    if ($_POST['employeeDOJoining'] != NULL) {
        $employee_DO_Joining_Raw = $_POST['employeeDOJoining'];
        $employee_DO_Joining = date('Y-m-d',strtotime($employee_DO_Joining_Raw));
    }
    else
    {
        echo "Date of joining Not Entered";
        exit;
    }
    
    if ($_POST['employeeAddress'] != NULL) {
        $employee_Address = $_POST['employeeAddress'];
    }
    else
    {
        $employee_Address = "";
    }

    $sqlInsertEmployee = "INSERT INTO `employees_details` (`emp_id`, `emp_first_name`, `emp_last_name`, `emp_email`, `emp_designation`, `emp_dob`, `emp_gender`, `emp_address`, `emp_joining`, `emp_basic_salary`, `emp_login_flag`) VALUES ('$employee_Id', '$employee_First_Name', '$employee_Last_Name', '$employee_Email', '$employee_Designation', '$employee_DOB', '$employee_Gender','$employee_Address', '$employee_DO_Joining', '$employee_Basic_Salary','1');";

    echo $sqlInsertEmployee;
    if ($connect->query($sqlInsertEmployee)) {
        $_SESSION["success"] = 'New Employee added';
        header("Location: ../../../pages/hr/master/hr_master_employee.php");
    }else {
        $_SESSION["Error"] = 'Employee Not added';

    }
}else{
    echo "fjasd";
}
?>
