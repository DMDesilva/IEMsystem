<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/register.css">
   
    <title>Register</title>
    
</head>
<body>
    <div class="container bg-light d-flex pt-2 pb-2 mt-4">
        <div class="left-panel d-none d-md-block col-md-6">
            <h2>Welcome to Ekash</h2>
            <p>Have an issue with 2-factor authentication?</p>
            <a href="#" class="text-white">Privacy Policy</a>
            <div class="mt-auto d-flex justify-content-start">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-x-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="text-white"><i class="fab fa-pinterest"></i></a>
            </div>
        </div>
            
        <div class="col-md-6 p-4 ">  
                  <h2 class="mt-5 text-center text-uppercase">Sign up</h2>
                  <?php if (isset($_GET['success']) && $_GET['success']): ?>
                    <div class="alert alert-success mt-3 mb-3">
                        <?php echo htmlspecialchars($_GET['success']); ?>
                     </div>
                 <?php elseif (isset($_GET['error']) && $_GET['error']): ?>
                      <div class="alert alert-danger mt-3 mb-3">
                         <?php echo htmlspecialchars($_GET['error']); ?>
                     </div>
                 <?php endif; ?>
                <form method="POST" action="users/process_register.php" class="mt-4">
            
                    <div class="form-group">
                         <input type="text" name="username" class="form-control" id="username" placeholder="Username" oninput="validateUsername()" required minlength="5" maxlength="15">
                         <small id="usernameHint" class="hint form-text text-danger"  style="display: none;">Username must be 5-15 characters and unique.</small>
                     </div>

                     <div class="form-group">
                         <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
                     </div>
            
            <div class="form-group">
                <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" id="email" oninput="validateEmail()" placeholder="Email (e.g., user@gmail.com)" required>
                <small id="emailHint" class="hint form-text text-danger"  style="display: none;">Enter valid Email (e.g., user@mail.com)</small>
                     
            </div>

            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required minlength="8" oninput="validatePassword()">
                <small class="hint form-text text-danger" id="passwordHint" style="display: none;">At least 8 characters, one uppercase letter, one symbol, and one number.</small>
            </div>

            <div class="form-group">
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" oninput="validatePasswordMatch()" placeholder="Confirm Password" required>
                <small class="hint form-text text-danger" id="confirmPasswordHint" style="display: none;">Passwords do not match.</small>
            </div>

            <div class="d-flex">
                <button type="submit" class="btn btn-sm btn-primary btn-block">Sign up</button>
            </div>
            
                 </form> 
                 <p class="mt-3">Already have an account? <a href="login.php">Sign in here</a></p>


    </div>
        

       

       
    </div> 
    
     <script src="Js/register.js"></script>
    <!-- Font Awesome icons (for social media icons) -->
   <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
  
</html>
