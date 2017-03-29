<!DOCTYPE html>
<?php include "./header.php" ?>

<?php if (checkAuth(true) != "") { ?>
<?php $onid = htmlspecialchars(checkAuth(false)); ?>

<script>
function validateForm() {
    var x = document.forms["myForm"]["price"].value;
    var y = document.forms["myForm"]["isbn"].value;
    var z = document.forms["myForm"]["contact"].value;

    if (x == null || x == "") {
        alert("Price must be filled out");
        return false;
    }

    if (y == null || y == "") {
        alert("ISBN must be filled out");
        return false;
    }

    if (z == null || z == "") {
        alert("Contact info must be filled out");
        return false;
    }
}
</script>

<html>
  <head>
    <title>Sell Your Book</title>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
    <script type="text/javascript" src="../server/server.js"></script>
    <script type="text/javascript" src="./bower_components/jquery/dist/jquery.min.js"></script>

  </head>
  <body>
    <br><br>
    <left class="sitename">BEAVERBOOKS</left>

    <ul class="navbar">
      <li><a href="./home.php">Home</a></li>
      <li><a href="./viewbooks.php">View Books</a></li>
      <li><a href="./yourbooks.php">Your Books</a></li>
      <li class="active"><a href="./booksell.php">Sell A Book</a></li>
      <li><a href="./locationpage.php">Books Near You</a></li>
      <li><a href="./about.html">About</a></li>
      <li style="float:right"><a href="./logout.php">Logout</a></li>
    </ul>

    <center><h1> Sell A Book </h1></center>

    <div class="ui divider"></div>

    <div class="textbody">

      <div class="ui form">
        <!--<form action="./post.php" method="POST" id="posting">-->
        <form name= "myForm" action="./post.php" onsubmit="return validateForm()" method="POST" id="posting">
          <div class="fields book">
            <input type="hidden" name="onid" value=<?php echo $onid ?>>
            <div class="field">
              <label>Subject</label>
              <input type="text" name="subject" id="subject" placeholder="e.g. MTH or math">
            </div>
            <div class="field">
              <label>Course Number</label>
              <input type="text" name="coursenum" id="coursenum" placeholder="e.g. 111">
            </div>
            <div class="field">
              <label>Book Title</label>
              <input type="text" name="title" id="title" placeholder="Book Title">
            </div>
            <div class="field">
              <label>Author</label>
              <input type="text" name="author" id="author" placeholder="Author">
            </div>
            <div class="field">
              <label>Price</label>
              <input type="text" name="price" id="price" placeholder="Price">
              <span class="error"> <?php echo '* Required';?></span>
            </div>
            <div class="field">
              <label>ISBN Number</label>
              <input type="text" name="isbn" id="isbn" placeholder="ISBN (no dashes)">
              <span class="error"> <?php echo '* Required';?></span>
            </div>
          </div>
          <div>
            <div class="grouped fields">
              <label>Book Condition:</label>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="cond" id="cond" value="Excellent">
                  <label>Excellent</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="cond" id="cond" value="Good">
                  <label>Good</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="cond" id="cond" value="Fair">
                  <label>Fair</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="cond" id="cond" value="Poor">
                  <label>Poor</label>
                </div>
              </div>
            </div>
            <div class="field">
              <label>Selling Location</label>
              <div class="field">
              <!--  <i class="location arrow icon" style="zoom:150%"></i> -->
                <input type="text" placeholder="Give the full address of where you'd like to sell the book." name="address" id="address">
                <input id="lat" name="lat" type="hidden"></input>
                <input id="lon" name="lng" type="hidden"></input>

                  <div class="imgWrap">
                    <button class="ui positive button" onclick = "inputDatabase()" type="button">Add To Map</button>
                    <center><p class="imgDescription">By Clicking this button you consent to sharing the entered address with other users within the Books Near Me feature.</p></center>
                </div>

              </div>
            </div>
            <div class="field">
              <label>Contact Info</label>
              <div class="field">
              <!--  <i class="user icon" style="zoom:150%"></i> -->
                <input type="text" placeholder="Give a phone number, email, or social media URL." name="contact" id="contact">
                <span class="error"> <?php echo '* Required';?></span>
              </div>
            </div>
        <!--    <script>

            $(document).ready(function() {
              $("#posting").submit(function(event) {
                if (document.getElementById("phone").value == undefined) {
                  if (document.getElementById("email").value == undefined) {
                    if (document.getElementById("facebook").value == undefined) {
                      alert("you must provide a method of contact");
                      event.preventDefault();
                      event.stopImmediatePropagation();
                      return false;
                    }
                  }
                }
              });
            });

          </script> -->
          </div>

          <br>
          <input type="submit" class="ui positive button">

          <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
          <script>


          ///////////////////////////////////////////////////////////////////////////
          //Here we will convert the address to latLon, and enter it into the database
          ///////////////////////////////////////////////////////////////////////////

          function inputDatabase(){


            var geocoder = new google.maps.Geocoder();
            codeAddress();

                  function codeAddress() {
                    var address = document.getElementById("address").value;

                    geocoder.geocode( { 'address': address}, function(results, status) {
                     if (status == google.maps.GeocoderStatus.OK) {

                      var lat = results[0].geometry.location.lat();
                       var lon = results[0].geometry.location.lng();

                       alert(lat);
                       alert(lon);
                       document.getElementById("lat").value = lat;
                       document.getElementById("lon").value = lon;
                      }
                       else {
                        alert("Geocode was not successful for the following reason: " + status);
                      }
                      });




                   }
                 }


          </script>
        </form>
      </div>

    </div>

  </body>
</html>

<?php } ?>

<?php include "./footer.php" ?>
