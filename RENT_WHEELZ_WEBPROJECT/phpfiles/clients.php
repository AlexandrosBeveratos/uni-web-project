<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../cssfiles/main.css" type="text/css"/>
	<script defer type="text/javascript" src="./javascriptfiles/newsletter.js"></script>
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, '../homepage.html' );
    }
	</script>
  <style>
    #subscrmessage{
			display: flex;
      height: 400px;
      width 100%;
      font-size: 30px;
      font-family: sans-serif;
      font-weight: bold;
      background-color: #282c36;
      color: white;
			align-items: center;
			justify-content: center;
    }
  </style>
</head>

<body>
	<div class="container">
		<nav>
			<input type="checkbox" id="check">
			<label for="check" class="checkbtn">
				<img src="images/icons8-horizontal-separated-bars-representing-hamburger-menu-layout-tal-revivo-bold-32.png">
			</label>
			<label class="logo">RENT WHEELZ</label>
			<ul>
				<li><a href="homepage.html">HOME</a></li>
				<li><a href="ourcompany.html">OUR COMPANY</a></li>
				<li><a href="fleet.html">FLEET</a></li>
				<li><a href="pricing.html">PRICING</a></li>
				<li><a href="contact.html">CONTACT US</a></li>
				<li><a href="admin.html">ADMIN</a></li>
			</ul>
		</nav>

    <div id="subscrmessage">
			<!--Database connection-->
      <?php
      $host = "localhost";
      $dbname = "rentacardb";
      $user = "root";
      $password = "";

      $username = $_POST['form_username'];
      $name = $_POST['form_name'];
      $email = $_POST['form_email'];

      $conn = new mysqli($host, $user, $password, $dbname);
      if( $conn->connect_error ){
        die('Connection Failed: ' .conn->connect_error);
      }
      else{
        $sql = "INSERT INTO clients (username, name, email)
                VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if ( !mysqli_stmt_prepare($stmt, $sql)) {
          die(mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt, "sss", $username, $name, $email);

				try{
					mysqli_stmt_execute($stmt);
					echo "Subscription Successful!\r\nThank You!";
				}
				catch(Exception $e){
					echo "Username or Email are already in use!";
				}

        $conn->close();
      }
      ?>
    </div>

    <footer class="footer">
			<div class="footer_container">
				<div class="footergrid">
					<div class="newscolumn">
						<h3>Subscribe to newsletter</h3>
						<form id="letterform" action="phpfiles/clients.php"  method="post">
					  	<table>
					  	<tr>
					  	<td><input class="textfield" id="form_username" type="text" name="form_username" size="35" placeholder="Username"></td>
					  	</tr>
							<tr>
					  	<td><input class="textfield" type="text" id="form_name" name="form_name" size="35" placeholder="Name"></td>
					  	</tr>
					  	<tr>
					  	<td><input class="textfield" type="text" id="form_email" name="form_email" size="35" placeholder="E-mail"></td>
					  	</tr>
							</table>
							<button type="submit" value="submit" class="subbtn">Subscribe</button>
						</form>

					</div>
					<div class="infocolumn">
						<h3 id="info_title">Contact Information</h3>
						<p>Phone number: <a class="info" href="+32-456555670">+32-456-555-670</a></p>
						<p>E-mail: <a class="info" href="rent.wheelz@gmail.com">rent.wheelz@gmail.com</a></p>
					</div>
					<div class="mapcolumn">
						<h3 id="map_title">Our Location<h3>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3561.4553111461037!2d4.425390842718465!3d50.86210496229083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3dcbbe6c6b64d%3A0xff4b7abf882aa120!2sChau.%20de%20Louvain%201150%2C%201200%20Bruxelles%2C%20Belgium!5e0!3m2!1sen!2sgr!4v1653162878415!5m2!1sen!2sgr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
							</iframe>
					</div>
				</div>
			</div>
		</footer>
	</div> <!--End of container-->
</body>
</html>
