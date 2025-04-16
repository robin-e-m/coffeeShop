<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="mystyles.css">
</head>
<body>
    <div class="header">
    <?php
    session_start();
    
    if (isset($_SESSION['usertype'])) {
        $usertype = $_SESSION['usertype'];
        
        if ($usertype == 1) { //manager is logged in
            $homepage = "manager.php";
            $register = "registerStaff.php";
        } 
        
        else if ($usertype == 2) { //staff is logged in
            $homepage = "staff.php";
            $register = "registerCustomer.php";
        }
        
        else if ($usertype == 4) { //owner is logged in
            $homepage = "owner.php";
            $register = "registerStaff.php";
        }
        
        else {
            $homepage = "index.php"; //customer is logged in
            $register = "customer.php";
        }
        
  
    
    }
    
       else { //failed sign in
        $homepage = "index.php";
        $register = "registerCustomer.php";
    }
    
    
    ?>
        
    <div class="w3-cell-row boxed">
        <div class="w3-panel">
            <a href="index.php" class="w3-bar-item w3-button w3-mobile" style="font-size:20px">Home</a>
          <a href="owner.php" class="w3-bar-item w3-button w3-mobile" style="font-size:20px">Owner</a>
          <a href="manager.php" class="w3-bar-item w3-button w3-mobile" style="font-size:20px">Manager</a>
            <a href="staff.php" class="w3-bar-item w3-button w3-mobile" style="font-size:20px">Staff</a>
            <a href="customer.php" class="w3-bar-item w3-button w3-mobile" style="font-size:20px">Customer</a>
            <a href="#" class="w3-bar-item w3-button w3-mobile" style="font-size:20px">Online Store</a>
            <a href="<?php echo $register; ?>" class="w3-bar-item w3-button w3-mobile" style="font-size:20px">Register</a>
            <div class="w3-dropdown-hover w3-mobile">
                <button class="w3-button" style="font-size:20px">About <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-teal">
                    <a href="#" class="w3-bar-item w3-button w3-mobile">Location</a>
                    <a href="#" class="w3-bar-item w3-button w3-mobile">Hours</a>
                    <a href="#" class="w3-bar-item w3-button w3-mobile">Contact Us</a>
                </div>
            </div>
            <!-- <div class=" w3-bar-item "> -->
            <?php
            if (isset($_SESSION['name'])):
                echo "<h2>Welcome</h2>" . $_SESSION['name'];
                ?>
                <div class="w3-right">
                    <form class="form-inline" name="logout" action="logoutAction.php" method="post">
                        <div class="form-group">
                            <button type="submit" class="btn w3-black">Logout</button>
                        </div>
                    </form>
                </div>
            <?php else: ?>          
                <div class="w3-right">
                    <form class="form-inline" name="login" action="loginAction.php" method="post">
                        <div class="form-group">
                            <label for="user">User:</label>
                            <input type="text" class="form-control" required placeholder="Enter Username" name="user">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" required placeholder="Enter password" name="pwd">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn w3-right w3-black">Login</button>
                        </div>
                    </form>
                    <a href="resetPassword.php">Forgot password?</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
   </div>
</body>
