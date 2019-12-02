<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        h3,
            {
            text-align: center;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>Designation Excel File Import </h2>

    <table>
        <tr>
            <th>sl No</th>
            <th>Designation ID</th>
            <th>Designation</th>
        </tr>
        <?
        include 'excel_reader.php'; // include the class
        require '../../../connect.php';
        error_reporting(~E_ALL);

        if (isset($_FILES['importXLSFiles']['name']) && $_FILES['importXLSFiles']['name'] !== '') {
            $file = $_FILES['importXLSFiles']['tmp_name'];
            $sqlIdSelect = "SELECT MAX(`id`) as id FROM designation";
            if ($rawId = $connect->query($sqlIdSelect)) {
                while ($id = $rawId->fetch_assoc()) {
                    if ($id['id'] == NULL) {
                        $id = 1;
                        readData($id, $file);
                    } else {
                        $id = $id['id'] + 1;
                        readData($id, $file);
                    }
                }
            }
        }


        function readData($id, $file)
        {
            $flag = true;
            $slNo = 1;
            $Designation_id = (int) $id;
            $value = "";
            $excel = new PhpExcelReader;
            $excel->read($file);
            $data = $excel->sheets;

            $numRows = $data[0]['numRows'];
            $numCols = $data[0]['numCols'];
            $designation = $data[0]['cells'];

            for ($i = 2; $i <= $numRows; $i++) {

                if ($i == ($numRows)) {
                    $rows = $designation[$i];
                    if (isset($rows[1])) {
                        $designationName = $rows[1];
                        $value .= "('DES-$Designation_id','$designationName')";
                        echo "<tr>
                                <th>$slNo</th>
                                <th>DES-$Designation_id</th>
                                <th>$designationName</th>
                            </tr>";
                    } else {
                        echo "<tr>
                                <th>$slNo</th>
                                <th>ID Not Generated</th>
                                <th>Error</th>
                            </tr>";
                        $Designation_id--;
                        $flag = false;
                    }
                } else {

                    $rows = $designation[$i];
                    if (isset($rows[1])) {
                        $designationName = $rows[1];
                        $value .= "('DES-$Designation_id','$designationName'),";
                        echo "<tr>
                                <th>$slNo</th>
                                <th>DES-$Designation_id</th>
                                <th>$designationName</th>
                            </tr>";
                    } else {
                        echo "<tr>
                                <th>$slNo</th>
                                <th>ID Not Generated</th>
                                <th>Error</th>
                            </tr>";
                        $Designation_id--;
                        $flag = false;
                    }
                }
                $Designation_id++;
                $slNo++;
            }
            sqlInsert($value, $flag);
        }

        function sqlInsert($value, $flag){
            require '../../../connect.php';
            $sqlInsertDesignation = "INSERT INTO `designation`(`designation_id`, `description`) VALUES ";
            $sqlInsertDesignation .= $value;

            if ($connect->query($sqlInsertDesignation)) {
                $_SESSION['importXLS'] = 'yes';
                $_SESSION['message'] = "The file has been successfully imported";
                ?>
                <button onclick="location.href = '../../../pages/hr/master/hr_master_designation.php';">Home</button>;
                <?
            } else {
                $_SESSION['importXLS'] = 'no';
                $_SESSION['message'] = "The file has NOT been imported Please Match the Above Formate";
                ?>
                <button onclick="location.href = '../../../pages/hr/master/hr_master_designation.php';">Home</button>;
                <?
                echo "<h3>No Data is Present in Excel</h3>";
            }
        }
        ?>
    </table>
</body>

</html>