<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteSalaryButton'])) {

    if ($_POST['deleteSalaryId'] != NULL) {
        $delete_Salary_id = $_POST['deleteSalaryId'];
    } else {
        echo "Employee ID Not selected";
        exit;
    }
    $sqlDeleteSalary = "DELETE FROM `salary_generation` WHERE `salary_generation`.`id` = '$delete_Salary_id'";

    if ($connect->query($sqlDeleteSalary)) {
        $_SESSION['deleteSalary'] = 'yes';
        header("Location: ../../../pages/hr/transaction/hr_transaction_salary_generation.php");
    }else {
        $_SESSION['deleteSalary'] = 'no';
        header("Location: ../../../pages/hr/transaction/hr_transaction_salary_generation.php");
    }
}
?>
