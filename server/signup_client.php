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
    $sql1 = "INSERT INTO cv_documents (fileName, data, mimeType, fileSize)
             VALUES (?, ?, ?, ?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("sbsi", $filename, $filedata, $mimeType, $fileSize);
    if ($stmt1->execute()) {
        echo "CV uploaded successfully.";
    } else {
        echo "Error uploading CV: " . $stmt1->error;
    }
    $stmt1->close();

    // Insert user data including CV file reference
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $sql2 = "INSERT INTO client_users (username, password, nom, prenom, ville, profession, email, telephone, CV)
             VALUES (?, ?, ?, ?, ?, ?, ?, LAST_INSERT_ID())";
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
