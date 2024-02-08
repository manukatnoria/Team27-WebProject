<?php
include ("header.php");
?>

<br>
<br>
<center>
<h1>Book Ez Rest Ez Stay Clean EZ!</h1>
</center>
<br>
<br>

<<form action="form/booking-process.php" method="POST" class="booking-form">


    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="service">Service:</label>
    <select id="service" name="service" required>
        <option value="cleaning">Cleaning</option>
        <option value="window">Window Washing</option>
        <option value="carpet">Carpet Cleaning</option>
    </select>
    <br>
    <br>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>

    <input type="submit" value="Submit">
</form>

<?php
include("footer.php");
?>
