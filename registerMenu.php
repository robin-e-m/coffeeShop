<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';
if (!(isset($_SESSION['usertype'])) or $usertype != 2) {
    header("Location:index.php");
    exit;
}
?>
<html>
    <head>
        <title>New Menu Item </title>
    <br>
</head>

<body>
  <div class="input-form">
        <h1 style="font-family:inherit">New Menu Item form</h1>
        <div>
    
    <?php
            if (isset($_GET['status']) && $_GET['status'] == 'register_success') {
                echo "<p>Menu item successfully register!</p>";
                echo "<a href='index.php'>Return to homepage</a>";
                exit;
            }
            
            if(isset($_GET['error']) && $_GET['error'] == 'duplicate_name') {
                echo "<p>new item already register. Please try again.</p>";
                
            }
            ?>
            <div class="form-card">
    <form name="register" action="registerMenuAction.php" method="get">
      <div class="register-option">
        <label>Name of item</label>
        <br>
        <input type="text" name="name" size="90" required/>
      </div>
        
        <div class="register-option">
        <label>description of item </label>
        <br>
        <input type="text" name="description" size="90" required/>
        </div>
      
      
      <div class="register-option">
        <label>price of item </label>
        <br>
        <input type="text" name="price" size="90" required/>
      </div>
      
      <div class="register-option">
        <label>What Category does your new item fall into?</label>
        <br>
        <select name="category" required>
          <option disabled selected value>Select category</option>
          <option value="hot drink">hot drink</option>
          <option value="cold drink">cold drink</option>
          <option value="bakery">bakery</option>
          <option value="seasonal">seasonal</option>
        </select>
      </div>
      
      <div class="item">
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
      </div>
    </form>
  </div>
        </div>          
  <br>
    <?php include 'footer.php' ?>
</body>
</html>


