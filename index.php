
<?php
include  'connect.php';

if (isset($_POST['submit'])){


$username = $_POST['username'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['password'];


// echo $username;
// echo $email;
// echo $number;
// echo $password;

$sql = "insert into `dashboarddesign`.`userprofile`
(username,email,number,password)
values ('$username','$email','$number','$password')
";

$result = mysqli_query($connect, $sql);
if ($result){
    header('location: display.php');
}

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile Details Form</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Tailwind CSS (via CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #1e3a8a, #1e40af);
    }
    .form-container {
      background-color: white;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease;
    }
    .form-container:hover {
      transform: translateY(-5px);
    }
    .form-icon {
      color: #1e3a8a;
    }
    .error-message {
      font-size: 0.875rem;
      color: #dc2626;
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 p-3">

  <div class="form-container p-5 w-full max-w-md">
    <h2 class="text-center mb-4 text-2xl font-semibold text-blue-900">Profile Details</h2>
    <form id="profileForm" novalidate  method="post" onsubmit="return validation()">
      <!-- Username -->
      <div class="mb-3">
        <label for="username" class="form-label text-blue-900">
          <i class="fas fa-user form-icon me-2"></i>Username
        </label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" />
        <p class="error-message mt-1 hidden" id="usernameError">Username is required.</p>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label text-blue-900">
          <i class="fas fa-envelope form-icon me-2"></i>Email
        </label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" />
        <p class="error-message mt-1 hidden" id="emailError">Enter a valid email address.</p>
      </div>

      <!-- Phone -->
      <div class="mb-3">
        <label for="number" class="form-label text-blue-900">
          <i class="fas fa-phone form-icon me-2"></i>Phone Number
        </label>
        <input type="tel" class="form-control" name="number" id="number" placeholder="Enter your phone number" />
        <p class="error-message mt-1 hidden" id="numberError">Enter a valid phone number.</p>
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password" class="form-label text-blue-900">
          <i class="fas fa-lock form-icon me-2"></i>Password
        </label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter a strong password" />
        <p class="error-message mt-1 hidden" id="passwordError">Password must be at least 6 characters.</p>
      </div>

      <!-- Submit -->
      <button type="submit" name="submit" class="btn btn-primary w-100 bg-blue-800 hover:bg-blue-900 transition-all">
        Submit
      </button>
    </form>
  </div>

  <!-- JavaScript Validation -->
<script>
  const form = document.getElementById("profileForm");

  // form.addEventListener("submit", function () {
  //   return validation(); // If validation fails, return false to stop submission
  // });

  function validation() {
    // Grab fields
    const username = document.getElementById("username");
    const email = document.getElementById("email");
    const number = document.getElementById("number");
    const password = document.getElementById("password");

    // Error elements
    const usernameError = document.getElementById("usernameError");
    const emailError = document.getElementById("emailError");
    const numberError = document.getElementById("numberError");
    const passwordError = document.getElementById("passwordError");

    // Regex
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^[0-9]{10,15}$/;

    // Reset validation flag
    let valid = true;

    const showError = (input, errorEl, message) => {
      input.classList.add("border-red-500");
      errorEl.textContent = message;
      errorEl.classList.remove("hidden");
      valid = false;
    };

    const clearError = (input, errorEl) => {
      input.classList.remove("border-red-500");
      errorEl.classList.add("hidden");
    };

    // Username
    if (username.value.trim() === "") {
      showError(username, usernameError, "Username is required.");
    } else {
      clearError(username, usernameError);
    }

    // Email
    if (!emailRegex.test(email.value.trim())) {
      showError(email, emailError, "Enter a valid email address.");
    } else {
      clearError(email, emailError);
    }

    // Number
    if (!phoneRegex.test(number.value.trim())) {
      showError(number, numberError, "Enter a valid phone number.");
    } else {
      clearError(number, numberError);
    }

    // Password
    if (password.value.trim().length < 6) {
      showError(password, passwordError, "Password must be at least 6 characters.");
    } else {
      clearError(password, passwordError);
    }

    // If validation is successful, allow form submission
    if (valid) {
      alert("Form submitted successfully!"); // Replace with your desired success handler
      
      // return true; // Allow form submission
    }

    return valid; // Prevent form submission if any validation fails
  }
</script>

</body>
</html>