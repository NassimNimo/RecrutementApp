<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("./DB.php");

    // Get user data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nom = $_POST["firstName"];
    $prenom = $_POST["lastName"];
    $ville= $_POST["city"];
    $profession = $_POST["job"];
    $email = $_POST["email"];
    $telephone = $_POST["tel"];

    // Upload CV file
$filename = $_FILES["cv"]["name"];
$filedata = file_get_contents($_FILES["cv"]["tmp_name"]);
$mimeType = $_FILES["cv"]["type"];
$fileSize = $_FILES["cv"]["size"];

// Insert CV file data
$sql = "INSERT INTO cv_documents (fileName, data, mimeType, fileSize) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind parameters
    $stmt->bind_param("sssi", $filename, $filedata, $mimeType, $fileSize);

    // Execute the statement
    if ($stmt->execute()) {
        echo "CV file uploaded and data inserted successfully.";
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

    // Insert user data including CV file reference
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $sql2 = "INSERT INTO client_users (username, password, nom, prenom, ville, profession, email, telephone, CV)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, LAST_INSERT_ID())";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("sssssss", $username, $hash, $nom, $prenom, $ville, $profession, $email, $telephone);
    if ($stmt2->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error inserting user data: " . $stmt2->error;
    }
    $stmt2->close();

    // Close connection
    $conn->close();
} else {
    header("Location: index.html");
    exit;
}
