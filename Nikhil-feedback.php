<?php
include("header.php");
?>
  
<br>
<br>
<Center><h1>Feedback Form</h1></Center>
<br>
<br>


<form action="form/submit_feedback.php" method="post" class="nikhil-feedback-form">

  <label for="name">Your Name:</label><br>
  <input type="text" id="name" name="name" required><br><br>  
   <label for="email">Your Email:</label><br>
   <input type="email" id="email" name="email" required><br><br>

  <label for="message">Your Feedback/Suggestion:</label><br>
  <textarea id="message" name="message" rows="4" required></textarea><br><br>

  <input type="submit" value="Let's Gooo!!">

</form>

<?php
include("footer.php");
?>
