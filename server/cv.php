<?php

include("DB.php");

$sql = "SELECT data FROM cv_documents where id=7";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $pdfData = $row['data'];

    // Save the blob data to a temporary file
    $tempPdfFile = tempnam(sys_get_temp_dir(), 'pdf');
    file_put_contents($tempPdfFile, $pdfData);

    // Now you can proceed with the Python script execution using the temporary PDF file
    $command = 'python ./py/CV.py ' . escapeshellarg($tempPdfFile);
    exec($command, $output, $result);

    if ($result === 0) {
        foreach ($output as $line) {
            echo $line . "<br>";
        }
    } else {
        // Output detailed error message
        echo "Failed to execute Python script: $result<br>";
        echo "Command: $command<br>";
        echo "Error output:<br>";
        foreach ($output as $line) {
            echo $line . "<br>";
        }
    }

    mysqli_close($conn);
} else {
    echo "Error: " . mysqli_error($conn);
}

?>