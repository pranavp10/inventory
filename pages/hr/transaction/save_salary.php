<?
session_start();
require '../../../connect.php';

if (isset($_POST['saveSalary'])) {
    $inputSize = count($_POST['select']);

    for ($i = 0; $i < $inputSize; $i++) {
        $row = $_POST['select'][$i];
        $employeeId = $_POST['empID'][$row];
        $basicSalary = $_POST['BasicSalary'][$row];
        $allowance = $_POST['allowance'][$row];
        $deduction  = $_POST['deductions'][$row];
        $netSalary = $_POST['netSalary'][$row];
        $date = $_POST['date'][$row];
        $parameterID= $_POST['parameterID'][$row];
        $sqlInsertSalary = "INSERT INTO `salary_generation` (`employee_id`,`salaryDate`,`parameter_id`, `basic_salary`, `allowance`, `deductions`, `net_salary`) VALUES ('$employeeId','$date', '$parameterID', '$basicSalary', '$allowance', '$deduction','$netSalary');";
        if ($connect->query($sqlInsertSalary)) {
            $_SESSION['addSalary'] = 'yes';
        } else {
            $_SESSION['addSalary'] = 'no';
        }
    }
    header("Location: ../../../pages/hr/transaction/hr_transaction_salary_generation.php");
} else {
    $_SESSION['addSalary'] = 'no';
    header("Location: ../../../pages/hr/transaction/hr_transaction_salary_generation.php");
}
?>