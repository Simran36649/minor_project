<?php
include("configASL.php");
session_start();
require_once ('vendor/autoload.php');

if(!isset($_SESSION['aid'])) {
    
    echo "Session expired, please login again.";
    exit();
}

// Process uploaded Excel file
if(isset($_FILES["exceldata"])) {
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["exceldata"]["type"], $allowedFileType)) {
        $filename = $_FILES['exceldata']['name'];
        $tempname = $_FILES['exceldata']['tmp_name'];

        move_uploaded_file($tempname, 'uploads/' . $filename);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadSheet = $Reader->load('uploads/' . $filename);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        
        // Limit the number of rows to process
        $maxRows = min(count($spreadSheetAry), 100); // Change 100 to your desired limit

        for ($i = 0; $i < $maxRows; $i++) {
            $id = strtoupper($spreadSheetAry[$i][0]);
            $tname = strtoupper($spreadSheetAry[$i][1]);
            $tsub = strtoupper($spreadSheetAry[$i][2]);

            // Skip processing if any of the fields are empty
            if (empty($id) || empty($tname) || empty($tsub)) {
                continue;
            }

            // Prepare the SQL query
            $sql = "INSERT INTO users (id, tname, tsub) VALUES ('$id', '$tname', '$tsub')";
            if(mysqli_query($conn, $sql)) {
                // Successfully inserted record
            } else {
                echo "Error inserting record for ID: $id - " . mysqli_error($conn) . "<br>";
            }
        }
        echo ("Submitted Successfully");
    } else {
        echo 'Please Upload Excel File; Check File Extension';
    }
}
?>
