<html>
    <head>
        <link href="css/index.css" rel="stylesheet"></link> 
        <meta charset="UTF-8">
        <title></title>
    </head>
	
	<header>
		<div width="860px" height="530px">
			<img src="img/chi-siamo.jpg" class="img-rounded" width="860px" height="530px" alt="Rounded Image">	
		</div>
	</header>
	<body>
<?php
session_start();

	$db = new mysqli('localhost', 'test', 'test', 'cooperativa');
    if ($db->connect_error) {
        die('Errore di connessione (' . $db->connect_errno . ') '
        . $db->connect_error);
    } else {
       // echo 'Connesso. ' . $db->host_info . "\n";
    }
    
		$id = $_SESSION["modifica"];
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$nome= $_POST["Nome"];
		$cognome = $_POST["Cognome"];
		$telefono = $_POST["Telefono"];
		$codiceFiscale = $_POST["Codice_Fiscale"];
		$indirizzo = $_POST["Indirizzo"];
		$comune = $_POST["Comune"];
		$email = $_POST["Email"];
		$descrizione = $_POST["Descrizione"];
		$categoria = $_POST["Categoria"];
		
		$query = "UPDATE assistiti SET Nome='$nome', Cognome ='$cognome', Telefono ='$telefono', Codice_Fiscale = '$codiceFiscale', Indirizzo = '$indirizzo', Comune = '$comune' , Email =  '$email' , Descrizone = $descrizione, Categoria = $categoria WHERE ID_Assistito= $id";
		
		// Esecuzione della query e controllo degli eventuali errori
		if (!$db->query($query)) {
			die($db->error);
		}   
	}
	
	
	// tira fuori i dati dal database
	$query = "SELECT * FROM assistiti WHERE ID_Assistito = $id";
	$result1 = $db->query($query);
	while($row = $result1->fetch_assoc()){
		$IdCategoria = $row['Categoria'];
	}	
	echo $IdCategoria;
$sql = <<<SQL
    SELECT *
    FROM `categorie`
SQL;

                if(!$result = $db->query($sql)){
                    die('Errore nella esecuzione della query [' . $db->error . ']');
                }
?>
		<div id="container">
			    <form method="post" action="modifica.php">
					<div class="form-group">
						<label>Categoria:</label>
						<select name="Marca">
<?php
while($row1 = $result->fetch_assoc()){
	if($row1['ID_Categoria'] == $IdCategoria){
?>
                        <option value="<?php echo $row1['ID_Categoria'];?>" selected="selected"><?php echo $row1['Nome']; ?></option>
<?php
}
	else{
	?>
	<option value="<?php echo $row1['ID_Categoria'];?>"><?php echo $row1['Nome']; ?></option>
	<?php
	}
}
?>
</div>
<div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="Nome" value="<?php $sql = 
<<<SQL
    SELECT *
    FROM `assistiti` WHERE ID_Assistito = $id
SQL;

                if(!$result = $db->query($sql)){
                    die('Errore nella esecuzione della query [' . $db->error . ']');
                }	 
				while($row = $result->fetch_assoc()){
					 echo $row['Nome'];
				}
				?>" />
</div>
<div class="form-group">
                    <label>Cognome:</label>
                    <input type="text" name="Cognome" value="<?php $sql = 
<<<SQL
    SELECT *
    FROM `assistiti` WHERE ID_Assistito = $id
SQL;

                if(!$result = $db->query($sql)){
                    die('Errore nella esecuzione della query [' . $db->error . ']');
                }	 
				while($row = $result->fetch_assoc()){
					 echo $row['Cognome'];
				}
				?>" />
</div>
<div class="form-group">
                    <label>Telefono:</label>
                    <input type="text" name="Telefono" value="<?php $sql = 
<<<SQL
    SELECT *
    FROM `assistiti` WHERE ID_Assistito = $id
SQL;

                if(!$result = $db->query($sql)){
                    die('Errore nella esecuzione della query [' . $db->error . ']');
                }	 
				while($row = $result->fetch_assoc()){
					 echo $row['Telefono'];
				}
				?>" />
</div>
<div class="form-group">
                    <label>Codice Fiscale:</label>
                    <input type="text" name="Codice_Fiscale" value="<?php $sql = 
<<<SQL
    SELECT *
    FROM `assistiti` WHERE ID_Assistito = $id
SQL;

                if(!$result = $db->query($sql)){
                    die('Errore nella esecuzione della query [' . $db->error . ']');
                }	 
				while($row = $result->fetch_assoc()){
					 echo $row['Codice_Fiscale'];
				}
				?>" />
</div>
<div class="form-group">
                    <label>Indirizzo:</label>
                    <input type="text" name="Indirizzo" value="<?php $sql = 
<<<SQL
    SELECT *
    FROM `assistiti` WHERE ID_Assistito = $id
SQL;

                if(!$result = $db->query($sql)){
                    die('Errore nella esecuzione della query [' . $db->error . ']');
                }	 
				while($row = $result->fetch_assoc()){
					 echo $row['Indirizzo'];
				}
				?>" />
</div>
<div class="form-group">
                    <label>Comune:</label>
                    <input type="text" name="Comune" value="<?php $sql = 
<<<SQL
    SELECT *
    FROM `assistiti` WHERE ID_Assistito = $id
SQL;

                if(!$result = $db->query($sql)){
                    die('Errore nella esecuzione della query [' . $db->error . ']');
                }	 
				while($row = $result->fetch_assoc()){
					 echo $row['Comune'];
				}
				?>" />
</div>
<div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="Email" value="<?php $sql = 
<<<SQL
    SELECT *
    FROM `assistiti` WHERE ID_Assistito = $id
SQL;

                if(!$result = $db->query($sql)){
                    die('Errore nella esecuzione della query [' . $db->error . ']');
                }	 
				while($row = $result->fetch_assoc()){
					 echo $row['Email'];
				}
				?>" />
</div>
<div class="form-group">
                    <label>Descrizione:</label>
                    <input type="text" name="Descrizione" value="<?php $sql = 
<<<SQL
    SELECT *
    FROM `assistiti` WHERE ID_Assistito = $id
SQL;

                if(!$result = $db->query($sql)){
                    die('Errore nella esecuzione della query [' . $db->error . ']');
                }	 
				while($row = $result->fetch_assoc()){
					 echo $row['Descrizione'];
				}
				?>" />
</div>
                    
					<div class="form-group">>
						<input type="submit" name="" value="Modifica" />
					</div>
            </form>
			<p><a href="elencoAssistiti.php">Elenco Assistiti</a></p>
			<br />
			
		</div>
		
	</body>
	
</html>