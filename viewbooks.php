<!DOCTYPE html>
<?php include "./header.php" ?>

<?php if (checkAuth(true) != "") { ?>

<html>
  <head>
    <title>View Books</title>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
    <script type="text/javascript" src="./bower_components/jquery/dist/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    	$("#results" ).load( "fetch_pages.php"); //load initial records

    	//executes code below when user click on pagination links
    	$("#results").on( "click", ".pagination a", function (e){
    		e.preventDefault();
    		$(".loading-div").show(); //show loading element
    		var page = $(this).attr("data-page"); //get page number from link
    		$("#results").load("fetch_pages.php",{"page":page}, function(){ //get content from PHP page
    			$(".loading-div").hide(); //once done, hide loading element
    		});

    	});
    });
    </script>

    <style>
    .loading-div{
    	position: absolute;
    	top: 0;
    	left: 0;
    	width: 100%;
    	height: 100%;
    	background: rgba(0, 0, 0, 0.56);
    	z-index: 999;
    	display:none;
    }
    .loading-div img {
    	margin-top: 20%;
    	margin-left: 50%;
    }

    /* Pagination style */
    .pagination{
      margin-left: auto ;
      margin-right: auto ;
    }
    .pagination li{
    	display: inline;
    	padding: 6px 10px 6px 10px;
    	border: 1px solid #ddd;
    	margin-right: -1px;
    	font: 15px/20px Arial, Helvetica, sans-serif;
    	background: #FFFFFF;
    	box-shadow: inset 1px 1px 5px #F4F4F4;
    }
    .pagination li a{
        text-decoration:none;
        color: rgb(89, 141, 235);
    }
    .pagination li.first {
        border-radius: 5px 0px 0px 5px;
    }
    .pagination li.last {
        border-radius: 0px 5px 5px 0px;
    }
    .pagination li:hover{
    	background: #CFF;
    }
    .pagination li.active{
    	background: #F0F0F0;
    	color: #333;
    }
    </style>
  </head>

  <body>
    <br><br>
    <left class="sitename">BEAVERBOOKS</left>
      <ul class="navbar">
        <li><a href="./home.php">Home</a></li>
        <li class="active"><a href="./viewbooks.php">View Books</a></li>
        <li><a href="./yourbooks.php">Your Books</a></li>
        <li><a href="./booksell.php">Sell A Book</a></li>
        <li><a href="./locationpage.php">Books Near You</a></li>
        <li><a href="./about.html">About</a></li>
        <li style="float:right"><a href="./logout.php">Logout</a></li>
      </ul>

      <center><h1> View Books </h1></center>

      <div class="ui divider"></div>

      <div class="loading-div"><img src="ajax-loader.gif" ></div>
      <div id="results"><!-- content will be loaded here --></div>

      <div class="ui divider"></div>
			</div>
		</div>

		<br>
</body>
</html>


<?php } ?>
<?php include "./quicknav.php" ?>

<?php include "./footer.php" ?>
