<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <?php include 'header.php' ?>
        <link rel="stylesheet" href="mystyles.css">
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
            <h1 style="font-size:100px; font-family:inherit;">Online Store</h1>
            <p style="font-size:35px">Coffee Pastries and Much More</p>
        </div>
        <div class="input-form">
            <h1 style="font-family:inherit">Menu</h1>
            <form name="register" action="OnlineStoreAction.php" method="POST">
                <div class="register-option">
                    <label>First Name </label>
                    <br>
                    <input type="text" name="FirstName" size="40" required />
                </div>

                <div class="register-option">
                    <label>Last Name </label>
                    <br>
                    <input type="text" name="LastName" size="40" required />
                </div>

                <div class="register-option">
                    <label>Phone Number </label>
                    <br>
                    <input type="text" name="number" size="40" required />
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Item Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="menu-item">
                            <td>Hot Drink</td>
                            <td>Latte</td>
                            <td class="price">3.50</td>
                            <td><input type="number" class="quantity" name="quantity_latte" oninput="calculateTotal()"></td>
                            <td class="item-total">0.00</td>
                        </tr>
                        <tr class="menu-item">
                            <td>Cold Drink</td>
                            <td>Iced Tea</td>
                            <td class="price">2.50</td>
                            <td><input type="number" class="quantity" name="quantity_iced_tea" oninput="calculateTotal()"></td>
                            <td class="item-total">0.00</td>
                        </tr>
                        <tr class="menu-item">
                            <td>Bakery</td>
                            <td>Croissant</td>
                            <td class="price">4.00</td>
                            <td><input type="number" class="quantity" name="quantity_croissant" oninput="calculateTotal()"></td>
                            <td class="item-total">0.00</td>
                        </tr>
                        <tr class="menu-item">
                            <td>Seasonal Item</td>
                            <td>Pumpkin Spice Latte</td>
                            <td class="price">5.00</td>
                            <td><input type="number" class="quantity" name="quantity_pumpkin_spice_latte" oninput="calculateTotal()"></td>
                            <td class="item-total">0.00</td>
                        </tr>
                    </tbody>
                </table>

                <div class="register-option">
                    <label>When arriving at the store, what method are you going to use to pay for the order?</label>
                    <br>
                    <select name="method" required>
                        <option disabled selected value>method</option>
                        <option value="cash">cash</option>
                        <option value="card">card</option>
                    </select>
                </div>

                <!-- Hidden input field to store the order total -->
                <input type="hidden" name="order-total" id="hidden-order-total" value="0.00">

                <h2>Total: $<span id="order-total">0.00</span></h2>
                <button type="submit">Place Order</button>
            </form>

            <?php include 'footer.php' ?>
        </div>
    </body>
</html>


