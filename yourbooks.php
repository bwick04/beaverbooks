<!DOCTYPE html>
<?php include "./header.php" ?>

<?php if (checkAuth(true) != "") { ?>

<html>
  <head>
    <title>View Books</title>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
    <script type="text/javascript" src="./bower_components/jquery/dist/jquery.min.js"></script>
  </head>
  <body>
    <br><br>
    <left class="sitename">BEAVERBOOKS</left>
      <ul class="navbar">
        <li><a href="./home.php">Home</a></li>
        <li><a href="./viewbooks.php">View Books</a></li>
        <li class="active"><a href="./yourbooks.php">Your Books</a></li>
        <li><a href="./booksell.php">Sell A Book</a></li>
        <li><a href="./locationpage.php">Books Near You</a></li>
        <li><a href="./about.html">About</a></li>
        <li style="float:right"><a href="./logout.php">Logout</a></li>
      </ul>

      <center><h1> Your Books </h1></center>

      <div class="ui divider"></div>

      <div class="ui relaxed grid books">

  			<div class="four column row">
  				<?php
          if ($result = $mysqli->query("select onid,dateposted,subject,coursenum,title,author,price,isbn,cond,contact,address,lat,lng from books")) {
            while ($obj = $result->fetch_object()) {
              if ($obj->onid == htmlspecialchars(checkAuth(false))) {
          ?>
  				<div class="column"><center>
  					<div class="ui card books" data-content="Edit" data-variation="basic" style="display:table-cell">
  						<div class="content">
  							<div class="header"> Course: <?php echo htmlspecialchars($obj->subject) . " " . htmlspecialchars($obj->coursenum) ?> </div>
                <div class="header"> Title: <?php echo htmlspecialchars($obj->title) ?> </div>
                <div class="header"> Author: <?php echo htmlspecialchars($obj->author) ?> </div>
  							<div class="meta">
  								<span class="date">Posted: <?php echo htmlspecialchars($obj->dateposted) ?> by <?php echo htmlspecialchars($obj->onid) ?></span>
  							</div>

  							<h3><?php echo htmlspecialchars($obj->price) ?></h3>
                <h4>Condition: <?php echo htmlspecialchars($obj->cond) ?></h4>
  						</div>
              <div class="extra content">
                Contact Info
                <div class="ui divider"></div>
                <div class="content">
                  <p>
                    <i class="location arrow icon" style="zoom:150%"></i>
                    <?php echo htmlspecialchars($obj->address) ?>
                  </p>
                  <p>
                    <i class="user icon" style="zoom:150%"></i>
                    <?php echo htmlspecialchars($obj->contact) ?>
                  </p>
                </div>
              </div>
  						<div class="extra content" style="margin:auto">
                <button class="ui basic red button" id="delete" onclick="removebook()">Delete</button>
  						</div>
  					</div>
            <br>

  				</center></div>
  				<?php
              }
            }
            $result->close();
          }
          ?>
          <div class="ui divider"></div>
  			</div>
  		</div>

  		<br>

    </body>
  </html>

  <?php } ?>
  <?php include "./quicknav.php" ?>

  <?php include "./footer.php" ?>
