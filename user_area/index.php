<?php
session_start();
if (isset($_SESSION['Email_Session'])) {
  header("Location: welcome.php");
  die();
}


include ('../includes/connect.php');
$msg = "";
$Error_Pass = "";
if (isset($_GET['Verification'])) {
  $raquet = mysqli_query($con, "SELECT * FROM register WHERE CodeV='{$_GET['Verification']}'");
  if (mysqli_num_rows($raquet) > 0) {
    $query = mysqli_query($con, "UPDATE register SET verification='1' WHERE CodeV='{$_GET['Verification']}'");
    if ($query) {
      $rowv = mysqli_fetch_assoc($raquet);
      header("Location: ../index.php?id='{$rowv['id']}'");
    }else{
      header("Location: index.php");
    }
  } else {
    header("Location: index.php");
  }
}
if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $Pass = mysqli_real_escape_string($con, md5($_POST['Password']));
  $sql = "SELECT * FROM register WHERE email='{$email}' and Password='{$Pass}'";
  $resulte = mysqli_query($con, $sql);
  if (mysqli_num_rows($resulte) === 1) {
    $row = mysqli_fetch_assoc($resulte);
    if ($row['verification'] === '1') {
      $_SESSION['Email_Session']=$email;
      header("Location: ../index.php");
    }else{$msg = "<div class='alert alert-info'>First Verify Your Account</div>";
      $_SESSION['useremail']=$email;
      header("Location: ../index.php");

    }
  }else{
    $msg = "<div class='alert alert-danger'>Email or Password is not match</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../assets\css\login_style.css" />
  <title>Sign in & Sign up Form</title>
  <style>
    .alert {
      padding: 1rem;
      border-radius: 5px;
      color: white;
      margin: 1rem 0;
      font-weight: 500;
      width: 65%;
    }

    .alert-success {
      background-color: #42ba96;
    }

    .alert-danger {
      background-color: #fc5555;
    }

    .alert-info {
      background-color: #2E9AFE;
    }

    .alert-warning {
      background-color: #ff9966;
    }
    .Forget-Pass{
      display: flex;
      width: 65%;
    }
    .Forget{
      color: #2E9AFE;
      font-weight: 500;
      text-decoration: none;
      margin-left: auto;
      
    }
    .close a {
text-decoration: none;
font-size: 40px;
color:red;
cursor: pointer;
position: fixed;
top: -6px;
right: 10px;
z-index: 6; 

}
  </style>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="POST" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <?php echo $msg ?>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="email" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="Password" placeholder="Password" />
          </div>
          <div class="Forget-Pass">
          <a href="Forget.php" class="Forget">Forget Password ?</a></div>
          <input type="submit" name="submit" value="Login" class="btn solid" />
       
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <a href="SignUp.php" class="btn transparent" id="sign-in-btn" style="padding:10px 20px;text-decoration:none">
            Sign up
          </a>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
    </div>
    <div class="close" >
        <a href="../index.php"><i class="uil uil-times"></i>
      </a>
     </div>
  </div>

  <script src="app.js"></script>
</body>

</html>