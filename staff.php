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
        <title>Staff</title>
    <br>
</head>

<body>
  <div class="w3-container w3-center">
    <h1>New Item for menu </h1>
    <form name="register" action="menuregisterAction.php" method="get">
      <div class="item">
        <label>Name of item</label>
        <input type="text" name="name" size="40" required/>
      </div>
        <label>desrciption of item </label>
        <input type="text" name="description" size="40" />
      <div class="item">
        <label>price of item </label>
        <input type="text" name="price" size="40" />
      </div>
      <div class="item">
        <label>What Category does your new item fall into?</label>
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
  <br>
    <?php include 'footer.php' ?>
</body>
</html>
