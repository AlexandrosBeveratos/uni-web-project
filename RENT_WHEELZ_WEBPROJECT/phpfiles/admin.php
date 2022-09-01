<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../cssfiles/main.css" type="text/css"/>
	<script defer type="text/javascript" src="./javascriptfiles/newsletter.js"></script>
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, '../admin.html' );
    }
	</script>
  <style>
		.container{
			background-image: linear-gradient(to right, rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.36), rgba(0, 0, 0, 0.452)), url(./images/adminbg.jpg);
			background-size: cover;
			background-attachment: fixed;
			background-position: center;
			min-height: 100vh;
		}
    #admin-container{
			display: flex;
			flex-direction: column;
      min-height: 400px;
      width: 100%;
      font-size: 24px;
      font-family: sans-serif;
      font-weight: bold;
      color: white;
			align-items: center;
			justify-content: center;
    }
		h1{
			font-size: 28px;
			font-weight: bold;
			text-shadow: 4px 2px black;
		}
		.data-table{
			display: block;
			max-height: 250px;
			overflow-y: auto;
			overflow-x: hidden;
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 20px;
			min-width: 400px;
			border-radius: 5px 5px 0 0;
			background-color: white;
			border-radius: 5px 5px 5px 5px;
		}
		.data-table::-webkit-scrollbar{
			width: 1em;
		}
		.data-table::-webkit-scrollbar-track{
			background-color: #565578;
			border-radius: 5px;
		}
		.data-table::-webkit-scrollbar-thumb{
			background-color: #2e2c5c;
			border-radius: 100vw;
		}
		.data-table thead tr{
			background-color: #313063;
			text-align: left;
			font-weight: bold;
		}
		.data-table tr{
			border-bottom: 2px solid #dddddd;
		}
		.data-table th, .data-table td{
			padding: 10px 12px;
		}
		.data-table td{
			color: #2a2b33;
		}
		.data-table tbody tr:nth-of-type(even){
			background-color: #9a9a9c;
		}
		.data-table tbody tr:last-of-type{
			border-bottom: 2px; solid #31354f;
		}
		@media (max-width: 780px){
			.data-table{
				overflow-x: scroll;
				min-width: 200px;
				font-size: 16px;
			}
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
		<!--MAIN-->
    <div id="admin-container">
			<h1>Clients Table</h1>
			<div class="client-container">
				<table class="data-table" id="clients-table">
					<thead>
						<tr>
							<th>Username</th>
							<th>Name</th>
							<th>E-mail</th>
						</tr>
					</thead>
					<tbody>
					<!--Database connection-->
		      <?php
		      $host = "localhost";
		      $dbname = "rentacardb";
		      $user = "root";
		      $password = "";

		      $conn = new mysqli($host, $user, $password, $dbname);
		      if( $conn->connect_error ){
		        die('Connection Failed: ' .conn->connect_error);
		      }
					$sql = "SELECT * FROM clients";
					$clresult = $conn->query($sql);

					if($clresult->num_rows > 0) {
						while ($row = $clresult-> fetch_assoc()) {
							echo "<tr><td>" . $row["username"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
						}
					}
					else {
						echo "<tr><td>No Results</td><tr>";
					}
		  		$conn->close();
		      ?>
					</tbody>
				</table>
			</div>

			<h1>Message Table</h1>
			<div class="client-container">
				<table class="data-table" id="message-table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Phone</th>
							<th>E-mail</th>
							<th>Subject</th>
							<th>Message</th>
						</tr>
					</thead>
					<tbody>
					<!--Database connection-->
		      <?php
		      $host = "localhost";
		      $dbname = "rentacardb";
		      $user = "root";
		      $password = "";

		      $conn = new mysqli($host, $user, $password, $dbname);
		      if( $conn->connect_error ){
		        die('Connection Failed: ' .conn->connect_error);
		      }
					$sql2 = "SELECT * FROM messages";
					$msgresult = $conn->query($sql2);

					if($msgresult->num_rows > 0) {
						while ($row = $msgresult-> fetch_assoc()) {
							echo "<tr><td>" . $row["name"] . "</td><td>" . $row["phone_number"] . "</td><td>" . $row["email"] . "</td><td>" . $row["subject"] . "</td><td>" . $row["message"] . "</td></tr>";
						}
					}
					else {
						echo "<tr><td>No Results</td><tr>";
					}
		  		$conn->close();
		      ?>
					</tbody>
				</table>
			</div>

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
