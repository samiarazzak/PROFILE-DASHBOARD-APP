<?php

include "connect.php";



$id = $_GET['updateid'];

$sql  = "select * from  `dashboarddesign`.`userprofile` where id=$id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$username = $row['username'];
$email = $row['email'];
$number = $row['number'];
$password = $row['password'];


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    $sql = "UPDATE  `dashboarddesign`.`userprofile` SET `username` = '$username', `email` = '$email',`number` = '$number', `password` = '$password' WHERE `userprofile`.`id` = $id ;
";

    $result = mysqli_query($connect, $sql);

    if ($result) {
        // echo 'upated successfully';
        header('location: display.php');
    } else {
        die(mysqli_connect_error($connect));
    }

    mysqli_close($connect);
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard with Icons</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .dropdown-menu {
      transition: all 0.3s ease-in-out;
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-2">
    <a class="navbar-brand text-white fw-bold" href="#">
      <i class="fas fa-chart-line me-2"></i>Dashboard
    </a>
    <div class="ms-auto dropdown">
      <button class="btn btn-dark dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
        <i class="fas fa-user-circle me-2"></i>
        <span class="text-white"><?php echo $username ?></span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end mt-2">
        <li><a class="dropdown-item" href="#" onclick="viewProfile()"><i class="fas fa-user me-2"></i>View Profile</a></li>
        <li><a class="dropdown-item" href="#" onclick="enableEdit()"><i class="fas fa-pen-to-square me-2"></i>Edit Profile</a></li>
        
      </ul>
    </div>
  </nav>

  <!-- MAIN CONTENT -->
  <div class="container mt-5">
    <div class="bg-white shadow-lg rounded-lg p-5 animate__animated animate__fadeIn">
      <h2 class="text-xl fw-semibold mb-4">
        <i class="fas fa-user-circle me-2"></i>Profile Details
      </h2>

      <form id="profileForm" method="post">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Name</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input type="text" id="profileName" name="username" value="<?php echo $username ?>" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              <input type="email" id="profileEmail" name="email" value="<?php echo $email ?>" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
              <input type="tel" id="profilePhone" name="number" value="<?php echo $number ?>" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" id="profilePassword" name="password" value="<?php echo $password ?>"  class="form-control" disabled>
            </div>
          </div>
        </div>

        <div class="mt-4 text-end">
          <button type="submit" name="submit" id="saveBtn" class="btn btn-success d-none">
            <i class="fas fa-save me-1"></i>Save Changes
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- JS Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // let profileData = {
    //   // name: "John Doe",
    //   // email: "john.doe@example.com",
    //   // phone: "9876543210",
    //   // password: "mysecurepassword"
    // };

    // function populateProfile() {
    //   document.getElementById('profileName').value = profileData.name;
    //   document.getElementById('profileEmail').value = profileData.email;
    //   document.getElementById('profilePhone').value = profileData.phone;
    //   document.getElementById('profilePassword').value = profileData.password;
    // }

    function enableEdit() {
      ['profileName', 'profileEmail', 'profilePhone', 'profilePassword'].forEach(id => {
        document.getElementById(id).disabled = false;
      });
      document.getElementById('saveBtn').classList.remove('d-none');
    }

    function viewProfile() {
      alert(`Name: ${profileData.name}\nEmail: ${profileData.email}`);
    }

    // function deleteProfile() {
    //   if (confirm("Are you sure you want to delete your profile?")) {
    //     profileData = { name: "", email: "", phone: "", password: "" };
    //     populateProfile();
    //     alert("Profile deleted.");
    //   }
    

    document.getElementById('profileForm').addEventListener('submit', function (e) {
      // e.preventDefault();

      profileData.name = document.getElementById('profileName').value.trim();
      profileData.email = document.getElementById('profileEmail').value.trim();
      profileData.phone = document.getElementById('profilePhone').value.trim();
      profileData.password = document.getElementById('profilePassword').value.trim();

      ['profileName', 'profileEmail', 'profilePhone', 'profilePassword'].forEach(id => {
        document.getElementById(id).disabled = true;
      });
      document.getElementById('saveBtn').classList.add('d-none');

      alert("Profile updated successfully!");
    });

    // // Initial load
    // populateProfile();
  </script>

</body>
</html>