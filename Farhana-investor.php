<?php
include("header.php");
$title = "Investing";
?>

<br>
<br>
<h1 class="fg">Invest in Us</h1>
<br>
<br>

<form action="form/submit_investors.php" method="post" class="Farhana">

    <label for="name">Your Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>
    <label for="email">Your Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <label for="phone">Your Phone:</label><br>
    <input type="tel" id="phone" name="phone" required><br><br>
    <label for="amount">Investment Amount:</label><br>
    <input type="number" id="amount" name="amount" required><br><br>
    <label for="message">Message (optional):</label><br>
    <textarea id="message" name="message" rows="4"></textarea><br><br>

    <input type="submit" value="Invest Now">

</form>

<?php
include("footer.php");
?>