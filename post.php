<?php include "./header.php" ?>
<?php date_default_timezone_set("America/Los_Angeles") ?>
<?php

$date = new DateTime();



function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

// mysql_query("INSERT INTO books (onid, dateposted) VALUES ('weisborj','Today hi')");

if ($sql = $mysqli->prepare("INSERT INTO books (onid, dateposted, subject, coursenum, title, author, price, isbn, cond, contact, address, lat, lng) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)")) {
  $sql->bind_param("sssisssssssdd", $onid, $dateposted, $subject, $coursenum, $title, $author, $price, $isbn, $condition, $contact, $address, $lat, $lng);

  $onid = test_input($_POST["onid"]);
  $dateposted = $date->format('m-d-Y H:i:s');
  $subject = test_input($_POST["subject"]);
  $coursenum = test_input($_POST["coursenum"]);
  $title = test_input($_POST["title"]);
  $author = test_input($_POST["author"]);
  $price = test_input($_POST["price"], "Enter the price");
  $isbn = test_input($_POST["isbn"], "Enter an ISBN number");
  $condition = test_input($_POST["cond"]);
  $contact = test_input($_POST["contact"], "Enter contact info");
  $address = test_input($_POST["address"]);

  $lat = $_POST["lat"];
  $lng = $_POST["lng"];

  $sql->execute();
  $sql->close();
}

else printf("Error: %s\n", $mysqli->error);

if ($sql = $mysqli->prepare("INSERT IGNORE INTO users (onid) VALUES (?)")) {
  $sql->bind_param("s", $onid);

  $sql->execute();
  $sql->close();
}

else printf("Error: %s\n", $mysqli->error);



?>

<html>
  <head>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
    <title>Book Posted</title>
  </head>
  <body>
    <br><br>
    <left class="sitename">BEAVERBOOKS</left>

    <div class="ui divider"></div>
    <center><div style="margin:2em 2em 2em 2em; font-size:20px">
      <p>Your book has been posted successfully</p>
      <a href="./viewbooks.php">Return to Book Viewer</a>
    </div></center>
  </body>
</html>

<?php include "./footer.php" ?>
