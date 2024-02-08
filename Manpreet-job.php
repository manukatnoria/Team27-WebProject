<?
include ("header.php");
?>
<br>
<br>
<center>
<h1>Hellow i am Manpreet</h1>
</center>
<br>
<br>


<form class="Apply-for-job" action="form/apply_job.php" method="POST">
    <h1>Job Application Form</h1>
    <label for="fullname">Full Name</label>
    <input type="text" id="fullname" name="fullname" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" required>

    <label for="resume">Resume (PDF/Docx)</label>
    <input type="file" id="resume" name="resume" accept=".pdf,.docx" required>

    <input type="submit" value="Submit">
</form>



<?php
include("footer.php");
?>
