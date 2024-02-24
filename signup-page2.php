

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="./assets/png/logo-black-removebg-preview.png" width="200" height="50" class="d-inline-block align-top" alt="">
    </a>
  </nav>
  <div class="container">
    <h1 class="col-12 text-center p-4">Sign up</h1>
    <div class="column col-12">
      <form action="./server/signup_client.php" method="POST" id="client-form" enctype="multipart/form-data">
        <label for="name">Name</label>
        <div class="row p-1">
          <div class="form-group col-6">
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter first name" required>
            <small id="firstNameHelp" class="form-text text-muted">First name</small>
          </div>
          <div class="form-group col-6">
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter last name" required>
            <small id="lastNameHelp" class="form-text text-muted">Last name</small>
          </div>
        </div>
        <div class="form-group p-1">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
        </div>
        <div class="form-group p-1">
          <label for="job">Job title</label>
          <select name="job" id="job" class="form-control" required>
            <option value="" disabled selected>Choose your job</option>
            <?php
            include("./server/DB.php");
            $sql = "SELECT id, nom FROM profession";
            $result = $conn->query($sql);
            // Check if records were found
            if ($result->num_rows > 0) {
              // Output data of each row as options for the select list
              while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["id"] . '">' . $row["nom"] . '</option>';
              }
            } else {
              echo '<option value="">No job titles found</option>';
            }
            // Close the database connection
            $conn->close();
            ?>
          </select>
        </div>
        <div class="form-group p-1">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
          <small id="usernameHelp" class="form-text text-muted">For people to identify you.</small>
        </div>
        <div class="form-group p-1">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
          <small id="emailHelp" class="form-text text-muted">Two accounts cannot use the same email.</small>
        </div>
        <div class="form-group p-1">
          <label for="tel">Telephone</label>
          <input type="tel" pattern="0[67][0-9]{8}" name="tel" title="Example: 0612345678" class="form-control" id="tel" placeholder="Telephone" required >
          <small id="telHelp" class="form-text text-muted">Example: 0612345678.</small>
        </div>
        <div class="form-group p-1">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
          <small id="emailHelp" class="form-text text-muted">Password is case sensitive.</small>
        </div>
        <div class="form-group p-1">
          <label for="cv">Your CV</label>
          <input type="file" class="form-control" name="cv" id="cv" placeholder="cv" required>
          <small id="CVHelp" class="form-text text-muted">You can modify it later.</small>
          <div class="alert alert-info" role="alert">
            Make sure to give each section in the CV a title and follow the standard format in <a href="#" class="alert-link">the documentation</a> so the CV can be processed.
          </div>
        </div>
        <div class="row p-4 mx-auto ">
          <button type="submit" class="btn btn-primary col-4 mx-auto">Register</button>
        </div>
        <div class="row p-4 mx-auto ">
          <button id="HR-toggle" class="btn btn-link col-4 mx-auto">Register as HR?</button>
        </div>
      </form>

      <!-- ============================================================================================================================== -->

                                                            <!-- FORM 2 -->

      <!-- ============================================================================================================================== -->
      <form href="#" id="HR-form" style="display: none !important;">
        <div class="form-group p-1">
          <label for="companyName">Company name</label>
          <input type="text" name="companyName" class="form-control" id="companyName" placeholder="Enter company name" required>
        </div>
        <div class="form-group p-1">
          <label for="ICE">ICE</label>
          <input type="text" name="ICE" class="form-control" id="ICE" placeholder="Enter ICE" required>
          <small id="ICEHelp" class="form-text text-muted">"Identifiant Commun des Entreprises"</small>
        </div>
        <div class="form-group p-1">
          <label for="industry">Industry</label>
          <select name="industry" id="industry" class="form-control" required>
            <option value="" disabled selected>Choose your industry</option>
            <?php
              include("./server/DB.php");
              $sql = "SELECT id, nom FROM industrie";
              $result = $conn->query($sql);
              // Check if records were found
              if ($result->num_rows > 0) {
                // Output data of each row as options for the select list
                while ($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row["id"] . '">' . $row["nom"] . '</option>';
                }
              } else {
                echo '<option value="">No job titles found</option>';
              }
              // Close the database connection
              $conn->close();
            ?>
          </select>
          <small id="industryHelp" class="form-text text-muted">select your industry.</small>
        </div>
        <div class="form-group p-1">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
        </div>
        <label for="name">HR manager's name</label>
        <div class="row p-1">
          <div class="form-group col-6">
            <input type="text" name="HRFirstName" class="form-control" id="firstName" placeholder="Enter first name" required>
            <small id="firstNameHelp" class="form-text text-muted">First name</small>
          </div>
          <div class="form-group col-6">
            <input type="text" name="HRLastName" class="form-control" id="lastName" placeholder="Enter last name" required>
            <small id="lastNameHelp" class="form-text text-muted">Last name</small>
          </div>
        </div>
        <div class="form-group p-1">
          <label for="email">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
          <small id="emailHelp" class="form-text text-muted">Two accounts cannot use the same email.</small>
        </div>
        <div class="form-group p-1">
          <label for="tel">Telephone</label>
          <input type="tel" name="tel" pattern="0[67][0-9]{8}" title="Example: 0612345678" class="form-control" id="tel" placeholder="Telephone" required >
          <small id="telHelp" class="form-text text-muted">Example: 0612345678.</small>
        </div>
        <div class="form-group p-1">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <small id="passwordHelp" class="form-text text-muted">Password is case sensitive.</small>
        </div>
        <div class="row p-4 mx-auto ">
          <button type="submit" class="btn btn-outline-primary col-4 mx-auto">Register</button>
        </div>
        <div class="row p-4 mx-auto ">
          <button type="submit" id="client-toggle" class="btn btn-link col-4 mx-auto">Register as client?</button>
        </div>
      </form>
    </div>
  </div>
  <script src="./custom js/sign.js"></script>
</body>

</html>