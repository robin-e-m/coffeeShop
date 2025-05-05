  <!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';

if (!(isset($_SESSION['usertype']))) {
    if ($usertype != 1 OR $usertype != 2 OR usertype !=3)
        header("Location:index.php");
    exit;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ordering Cart</title>
    <br>
    
    <script>
            function calculateTotal() {
                const rows = document.querySelectorAll('.menu-item');
                let total = 0;

                rows.forEach(row => {
                    const price = parseFloat(row.querySelector('.price').innerText);
                    const quantity = parseInt(row.querySelector('.quantity').value) || 0;
                    const itemTotal = price * quantity;
                    row.querySelector('.item-total').innerText = itemTotal.toFixed(2);
                    total += itemTotal;
                });

                document.getElementById('order-total').innerText = total.toFixed(2);
                document.getElementById('hidden-order-total').value = total.toFixed(2); // Update hidden input value
            }
        </script>
        
</head>      

    <body>
        <div class="home-top-section"></div>
        <div class="home-top-text">
            <h1 style="font-size:100px; font-family:inherit;">Ordering Cart</h1>
        </div>
        
        <?php
$name = $_GET['name'];
$price = $_GET['price'];

echo '<h2>You ordered '.$name.' and its price is $'.$price;

?>
         <div class="button-center">
                    <input class="form-button" type="submit" value="Submit" />
                </div>
    </body>
  </html>

