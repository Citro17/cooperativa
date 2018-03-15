<!DOCTYPE html>
<html>
  <head>
    <title>Accedi</title>
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
		
		<nav>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
				<ul class="nav navbar-nav">
					<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Inserimento <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Assistiti</a></li>
								<li><a href="#">Interventi</a></li>
								<li><a href="#">Operatori</a></li>
							</ul>
						</li>
					<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Modifica <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Assistiti</a></li>
								<li><a href="#">Interventi</a></li>
								<li><a href="#">Operatori</a></li>
							</ul>
						</li>        
					<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Elimina <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Assistiti</a></li>
								<li><a href="#">Interventi</a></li>
								<li><a href="#">Operatori</a></li>
							</ul>
						</li>
					
				</ul>
			</div>
		</nav>
		
		<main>
		
			<form method="post" action="login.php">
				<div class="form-group">
					<label>Nome:</label>
					<input type="text" name="nome" value="" placeholder="Nome"/>
				</div>
				
				<div  class="form-group">
					<label>Cognome:</label>
					<input type="text" name="cognome" value="" placeholder="Cognome"/>
				</div>
				
				<div  class="form-group">
					<label>Telefono:</label>
					<input type="text" name="telefono" value="" placeholder="Telefono"/>
				</div>
				
				<div  class="form-group">
					<label>Codice Fiscale:</label>
					<input type="text" name="codice_Fiscale" value="" placeholder="Codice Fiscale"/>
				</div>
				
				<div  class="form-group">
					<label>Indirizzo:</label>
					<input type="text" name="indrizzo" value="" placeholder="Indirizzo"/>
				</div>
				
				<div  class="form-group">
					<label>Comune:</label>
					<input type="text" name="comune" value="" placeholder="Comune"/>
				</div>
				
				<div  class="form-group">
					<label>Email:</label>
					<input type="email" name="email" value="" placeholder="Email"/>
				</div>
				
				<div  class="form-group">
					<label>Descrizione:</label>
					<input type="text" name="cognome" value="" placeholder="Descrizione"/>
				</div>
<?php
$host = "localhost";
	// username dell'utente in connessione
	$user = "test";
	// password dell'utente
	$password = "test";
	// nome del database
	$db = "cooperativa";


	// istanza dell'oggetto della classe MySQLi
	$mysqli = new mysqli($host, $user, $password, $db);
 
// tira fuori i dati dal database
$sql = <<<SQL
    SELECT *
    FROM `categorie`
SQL;

                if(!$result = $mysqli->query($sql)){
                    die('Errore nella esecuzione della query [' . $mysqli->error . ']');
                }
?>
			<div id="container">
				<form method="post" action="inserisci.php">
						<label>Categoria:</label>
						<select name="categoria">
	<?php
	while($row = $result->fetch_assoc()){
	?>
							<option value="<?php echo $row['ID_Categoria'];?>"><?php echo $row['Nome']; ?></option>
	<?php
	}
	?>
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