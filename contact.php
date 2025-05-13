<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact Us</title>
        <?php include 'header.php'; ?>
    </head>

    <body><div class="home-top-section"></div>
        <div class="home-top-text">
            <h1 style="font-size:100px; font-family:inherit;">Perk & Pour</h1>
            <p style="font-size:35px;">Contact Page</p>
        </div>

        <div class="home-main-content">
            
            <h2 style="font-family:inherit">Get in Touch</h2>
            <p><strong>Phone:</strong> (555) 123-4567</p>
            <p><strong>Email:</strong> <a href="mailto:hello@perkandpour.com">hello@perkandpour.com</a></p>
            <p><strong>Social:</strong>
                <a href="https://instagram.com/perkandpour" target="_blank">Instagram</a> |
                <a href="https://facebook.com/perkandpour" target="_blank">Facebook</a>
            </p>
            <h2 style="font-family:inherit">Send us a message:</h2>
            <p>We’d love to hear from you! Whether you have a question, feedback,
                or just want to say hi—drop us a message or stop by for a cup of coffee. </p>
            <div class="input-form">
                <?php
                if (isset($_GET['status']) && $_GET['status'] == 'success') {
                    echo "<p>Message submitted successfully!</p>";
                    echo "<a href='index.php'>Return to homepage</a>";
                    exit;
                }
                ?>
                <div class="form-card">
                    <form name="contact" action="contactAction.php" method="get">

                        <div class="register-option">
                            <label style="font-size: 20px">Name:</label>
                            <br>
                            <input type="text" name="name" size="100" required/>
                        </div>

                        <div class="register-option">
                            <label style="font-size: 20px">Email:</label>
                            <br>
                            <input type="email" name="email" size="100" required/>
                        </div>

                        <div class="register-option">
                            <label style="font-size: 20px">Subject:</label>
                            <br>
                            <input type="text" name="subject" size="100" required/>
                        </div>

                        <div class="register-option">
                            <label style="font-size: 20px">Message:</label>
                            <br>
                            <input type="text" name="message" size="100" required/>
                        </div>

                        <div class="button-center">

                            <input class="form-button" type="submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
    </body>
</html>
