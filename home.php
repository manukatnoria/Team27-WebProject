<?php
include("header.php");
?>

    <!-- Header Section -->
    <div class="header">
        <h1 class="headerText">WELCOME TO OUR COMPANY. WE ARE HERE TO HELPING YOU</h1>
        <div>
            <button onclick="redirectToJobPage()" class="btn btn-primary">Work With Us</button>
        </div>
     <!-- Add an onclick event to call the redirectToJobPage function -->
    </div>

    
    <script>
       function redirectToJobPage() {
        // Redirect to Manpreet-job.php
        window.location.href = 'Manpreet-job.php';
       }
    </script>



    <!-- Body Content Section -->
    <div class="container mx-5 my-5">
        <div class="row">
            <div class="col-lg-6">
                <p><h2>We are in cleaning business from more

                    than 35 years. PTK cleaning oy is specialist in industrial, hotel, ships cleaning
                    
                    Our company assures good customer satisfaction.</h2></p>

                    <br>
                    <br>
                    <br>
                    <br>
                    <button type="button" class="text-dark">OPEN APPLICATIONS</button>
                    <button type="button" class="text-dark">OPEN POSITIONS</button>

            </div>
            <div class="col-lg-6">
                <img src="23901712.jpg" style="width: inherit;" alt="Description of the image"> 
            </div>
        </div>

        
    </div>

<?php
include("footer.php");
?>