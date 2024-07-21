<?php
include("configASL.php");
require_once ('vendor/autoload.php');
session_start();
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
        $maxRows = min(count($spreadSheetAry), 2000); // Change 100 to your desired limit
           $x=0;
        for ($i = 0; $i < $maxRows; $i++) {
            $tname = strtoupper($spreadSheetAry[$i][0]);
            $tpass = strtoupper($spreadSheetAry[$i][1]);

            // Skip processing if any of the fields are empty
            if ( empty($tname) || empty($tpass)) {
                continue;
            }
            
            $query = "SELECT * FROM studentcredential WHERE tname = '$tname'";
$result = mysqli_query($conn, $query);

// If $tname exists in the table, mysqli_num_rows will return a value greater than 0
if (mysqli_num_rows($result) > 0 || empty($tpass)) {
    
    continue;
     
}

            
            
           
            // Prepare the SQL query
            $sql = "INSERT INTO studentcredential (tname, tpass) VALUES ( '$tname', '$tpass')";
            if(mysqli_query($conn, $sql)) {
                // Successfully inserted record
            } else {
                echo "Error inserting record for ID: $id - " . mysqli_error($conn) . "<br>";
            }
        }
        echo (" Submitted Successfully");
        
        
      
    } else {
        echo 'Please Upload Excel File; Check File Extension';
    }
}
?>
