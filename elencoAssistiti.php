<!DOCTYPE html>
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
	$record = 10;
	// Recupero il numero di pagina corrente.
	// Generalmente si utilizza una querystring
	$p = isset($_GET["p"]) ? (int)$_GET["p"] : 1;
	$start = ($p - 1) * $record;
	$fine = $start + $record;

	$db = new mysqli('localhost', 'test', 'test', 'automobili');
		if ($db->connect_error) {
			die('Errore di connessione (' . $db->connect_errno . ') '
			. $db->connect_error);
		} else {
			//echo 'Connesso. ' . $db->host_info . "\n";
		}
		
	$risultato = mysqli_query($db, "SELECT * FROM assistiti"); 

	$num_righe = mysqli_num_rows($risultato); 
	//echo $num_righe;
	$pag = ceil($num_righe/$record);


	if(isset($_GET['a'])&& $_GET['a']=='elimina'){
		$id = $_GET['id'];
		$query= "DELETE FROM assistiti WHERE ID_Assistito=".$id;
		$result = $db->query($query);
	}
?>

		<main>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <td>N.</td>
                    <td>Nome</td>
                    <td>Cognome</td>
                    <td>Telefono</td>
                    <td>Codice Fiscale</td>
                    <td>Indirizzo</td>
                    <td>Comune</td>
                    <td>Email</td>
                    <td>Descrizione</td>
                    <td>Categoria</td>
					<td> Eliminazione </td>
					<td> Modifica </td>
                </tr>
            </thead>
            <tbody>
   
                <tr>
                    <td>
                        <?php
$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("yes not work");
}
$i = 1;


 while($row = $result->fetch_assoc()){
    echo ($record * ($p-1) + $i) . "<br />";
    $i++;
}
                        
                        ?>
                    </td>
                    <td>
                        <?php
                        
$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("mi disp");
}
                        
while($row = $result->fetch_assoc()){
    echo $row['Nome'] . '<br />';
}
                        ?>
                    </td>
                    <td>
                        <?php
                        
$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("mann");
}
                        
while($row = $result->fetch_assoc()){
    echo $row['Cognome'] . '<br />';
}
                        ?>
                    </td>
                    <td>
                        <?php
                        
$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("oh");
}
                        
while($row = $result->fetch_assoc()){
    echo $row['Telefono'] . '<br />';
}
                        ?>
                    </td>
                    <td>
                        <?php
                        
$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("millo");
}
                        
while($row = $result->fetch_assoc()){
    echo $row['Codice_Fiscale'] . '<br />';
}
                        ?>
                    </td>
                    <td>
                        <?php
                        
$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("no");
}
                        
while($row = $result->fetch_assoc()){
    echo $row['Indirizzo'] . '<br />';
}
                        ?>
                    </td>
                    <td>
                        <?php
                        
$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("ops");
}
                        
while($row = $result->fetch_assoc()){
    echo $row['Comune'] . '<br />';
}
                        ?>
                    </td>
                    <td>
                        <?php
                        
$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("mannagia!");
}
                        
while($row = $result->fetch_assoc()){
    echo $row['Email'] . '<br />';
}
                        ?>
                    </td>
                    <td>
                        <?php
                        
$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("mannaggia!");
}
                        
while($row = $result->fetch_assoc()){
    echo $row['Descrizione'] . '<br />';
}
                        ?>
                    </td>
                    <td>
                        <?php
                        
$sql = <<<SQL
    SELECT *
    FROM assistiti
	INNER JOIN categorie ON assistiti.Categoria = categorie.ID_Categoria
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("mannaggis!");
}
                        
while($row = $result->fetch_assoc()){
    echo $row['Nome'] . '<br />';
}
                        ?>
                    </td>
                    <td>
                        <?php
                        
$sql = <<<SQL
    SELECT *
    FROM automobili
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("nope");
}
                        
while($row = $result->fetch_assoc()){
    echo $row['DataUscita'] . '<br />';
}
                        ?>
                    </td>
					
					<td>
					
<?php
	$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("nope");
}
                        
while($row = $result->fetch_assoc()){
    echo "<a href='elencoAssistiti.php?a=elimina&id=".$row['ID_Assistito']."'>Elimina</a><br />";
}
	

?>		
			
					</td>
					<td>
					
<?php
	$sql = <<<SQL
    SELECT *
    FROM assistiti
    LIMIT $start, $record
SQL;

if(!$result = $db->query($sql)){
    die("nope");
}
                        
while($row = $result->fetch_assoc()){
	$_SESSION["modifica"]= $row['ID_Assistito'];
    echo "<a href='modificaAssistito.php'>Modifica</a><br />";
}
	

?>		
			
					</td>
                </tr>
                </tr>

				
            </tbody>
            <tfoot>
                <tr>
                    
                    <td><a href="elencoAssistiti.php?p=1">Primo</a></td>
                    <td><a href="elencoAssistiti.php?p=<?=($p-1) ?>">Indietro</a></td>
                    <td><a href="elencoAssistiti.php?p=<?=($p+1) ?>">Avanti</a></td>
                    <td><a href="elencoAssistiti.php?p=<?=$pag?>">Ultimo</a></td>
                    
                </tr>
            </tfoot>
        </table>
			
	
		</main>

	</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>