<!DOCTYPE html>
<?php
session_start();
$host = "localhost";
	// username dell'utente in connessione
	$user = "test";
	// password dell'utente
	$password = "test";
	// nome del database
	$db = "cooperativa";


	// istanza dell'oggetto della classe MySQLi
	$mysqli = new mysqli($host, $user, $password, $db);

	// verifica su eventuali errori di connessione
	if ($mysqli->connect_error) {
		echo "Connessione fallita: ". $connessione->connect_errno . ".";
		exit();
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$query = "SELECT * FROM utenti WHERE Username ='".$_POST["username"]."' AND Password ='".$_POST["password"]."'";
        
	$result = $mysqli->query($query);

	if($result->num_rows!=0){
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if($row["Amministratore"] == true){
			$_SESSION["username"]= $_POST["username"]; 
			$_SESSION["password"]= $_POST["Password"]; 
			$_SESSION["logged"] =true;  
			header("location:menuAdmin.php");
		}
		else{
			$_SESSION["username"]= $_POST["username"]; 
			$_SESSION["password"]= $_POST["Password"]; 
			$_SESSION["logged"] =true;  
			header("location:menuOperatori.php");
		}
	}else{
		echo "non ti sei loggato con successo"; 
	}
		
	}

?>
<html>
  <head>
    <title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
		<header>
			<div width="860px" height="530px">
				<img src="img/chi-siamo.jpg" class="img-rounded" width="860px" height="530px" alt="Rounded Image">	
			</div>
		</header>
		
		<main>
		
			<form method="post" action="login.php">
				<div class="form-group">
					<label>Username:</label>
					<input type="text" name="username" value="" placeholder="Username"/>
				</div>
				
				<div  class="form-group">
					<label>Password:</label>
					<input type="password" name="password" value="" placeholder="Password"/>
				</div>
				
				<input type="submit" name="" value="Invia" class="btn btn-primary"/>

			</form>
	
		</main>

	</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>