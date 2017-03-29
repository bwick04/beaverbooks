<!DOCTYPE html>

<?php include "./header.php" ?>

<?php
	if (checkAuth(true) != "") {
?>

<html>
  <head>
    <title>BeaverBooks</title>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
		<script type="text/javascript" src="./bower_components/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="../server/server.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  </head>
  <body>
		<img src='http://mediad.publicbroadcasting.net/p/kera/files/201510/textbooks_110509_bookstack001_rr_jpg_800x1000_q100.jpg' style="opacity:0.4; position:absolute; z-index:-1; width:100%; height:100%">
    <br><br>
    <left class="sitename"> BEAVERBOOKS </left>

    <div>
      <ul class="navbar">
        <li class="active"><a href="./home.php">Home</a></li>
				<li><a href="./viewbooks.php">View Books</a></li>
				<li><a href="./yourbooks.php">Your Books</a></li>
        <li><a href="./booksell.php">Sell A Book</a></li>
        <li><a href="./locationpage.php">Books Near You</a></li>
        <li><a href="./about.html">About</a></li>
        <li style="float:right"><a href="./logout.php">Logout</a></li>
      </ul>

			<div class="ui divider"></div>

			<center>
				<div>
	      	<p style="margin: 20px 200px 20px 200px; font-size:40px">
	        	Beaverbooks is a free to use Book Bazaar, where students can trade
	      		and sell their used textbooks at fair prices and greater convenience.
						<br>
						You can view all the books students have posted, view the specific books you've posted,
						or view books that are being sold near you!
					</p>
	    	</div>
			</center>

	    <div class="ui divider"></div>
	    <br>
			<div><center>
			  <a href="./booksell.php">
			    <button class="circular ui icon button one" style="zoom:200%">
			      <i class="plus icon"></i>
			      <p>Sell A Book</p>
			    </button>
			  </a>
			  <a href="./viewbooks.php">
			    <button class="circular ui icon button two" style="zoom:200%">
			      <i class="book icon"></i>
			      <p>View Books</p>
			    </button>
			  </a>
			  <a href="./locationpage.php">
			    <button class="circular ui icon button three" style="zoom:200%">
			      <i class="location arrow icon"></i>
			      <p>Near You</p>
			    </button>
			  </a>
			  <a href="./logout.php">
			    <button class="circular ui icon button four" style="zoom:200%">
			      <i class="arrow right icon"></i>
			      <p>Logout</p>
			    </button>
			  </a>
			</center></div>
	    <!-- <center>
	      <h3>Julian Weisbord</h3>
	      <h3>Bradley Imai</h3>
	      <h3>Omeed Habibelahian</h3>
	      <h3>Brennan Giles</h3>
	      <h3>Benny Wick</h3>
	      <h3>Andrew Davis</h3>
	    </center> -->

			<script>
			if ($(window).scrollTop() > 150) {
				$("#quicknav").removeClass("off");
				$("#quicknav").addClass("on");
			}
			else {
				$("#quicknav").removeClass("on");
				$("#quicknav").addClass("off");
			}
			</script>

    </div>
  </body>
</html>

<?php } ?>
<?php include "./footer.php" ?>
