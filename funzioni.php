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

	// verifica su eventuali errori di connessione
	if ($mysqli->connect_error) {
		echo "Connessione fallita: ". $connessione->connect_errno . ".";
		exit();
	}
	
	
	
	
	
	function Login($username, $password){
		
		$query = "SELECT * FROM utenti";
		$result = $mysqli->query($query);
		
		while($row = $result -> fetch_assoc()){
			if($row["Username"] == $username && $row["Password"] == $password){
				if($row["Ammistratore"] == 1){
					//visualizza pagina per admin
				}
				else{
					//visualizza pagina utente
				}
			}
		}
	}
	
	//funzioni Assititi Da Admin
	function CreaAssistito($nome, $cognome, $telefono, $codiceFisc, $indirizzo, $comune, $email, $descrzione, $categoria){
		$query = "INSERT INTO assistiti (Nome, Cognome, Telefono, CodiceFiscale, Indirizzo, Comune, Email, Descrizione, Categoria) VALUES('$nome', '$cognome', '$telefono', '$codiceFisc', '$indirizzo', '$comune', '$email' , '$descrizione', $categoria)";
		if(!$mysqli -> query($query)){
			die($mysqli->error);
		}
	}
	
	function ModificaAssistito($ID_Assistito, $nome, $cognome, $telefono, $codiceFisc, $indirizzo, $comune, $email, $descrzione, $categoria){
		$query = "UPDATE assititi WHERE ID_Assistito= $ID_Assistito SET Nome='$nome', Cognome='$cognome', Telefono='$telefono', CodiceFiscale='$codiceFisc', Indirizzo='$idirizzo', Comune='$comune', Email = '$email', Descrizione='$descrizione', Categoria='$categoria'";
		if(!$mysqli -> query($query)){
			die($mysqli->error);
		}
	}
	
	function EliminaAssistito ($ID_Assistito){
		$query = "DELETE FROM asssititi WHERE ID_Assistito=".$ID_Assistito;
		if(!$mysqli -> query($query)){
			die($mysqli->error);
		}	
	}
	
	//Funzioni Operatori da Admin
	function CreaOpratore($nome, $cognome, $telefono, $email){
		$query = "INSERT INTO operatori (Nome, Cognome, Email) VALUES('$nome', '$cognome', '$telefono', '$email')";
		if(!$mysqli -> query($query)){
			die($mysqli->error);
		}
	}
	
	function ModificaOperatore($ID_Operatore, $nome, $cognome, $telefono, $email){
		$query = "UPDATE operatori WHERE ID_Assistito= $ID_Operatore SET Nome='$nome', Cognome='$cognome', Telefono='$telefono', Email = '$email'";
		if(!$mysqli -> query($query)){
			die($mysqli->error);
		}
	}
	
	function EliminaOperatore ($ID_Operatore){
		$query = "DELETE FROM operatori WHERE ID_Operatore=".$ID_Operatore;
		if(!$mysqli -> query($query)){
			die($mysqli->error);
		}	
	}
	
	//Funzioni Interventi da Admin
	function CreaIntervento($ID_Operatore, $ID_Assistito, $data, $orainizio, $oraFine, $descrizione){
		$query = "INSERT INTO interventi (ID_Operatore, ID_Assistito, Data, Ora_Inizio, Ora_Fine, Descrizione) VALUES($ID_Operatore, $ID_Assistito, '$data', '$oraInizio', '$oraFine','$descrizione')";
		if(!$mysqli -> query($query)){
			die($mysqli->error);
		}
	}
	
	function ModificaIntervento($ID_Intervento, $ID_Operatore, $ID_Assistito, $data, $orainizio, $oraFine, $descrizione){
		$query = "UPDATE interventi WHERE ID_Intervento= $ID_Intervento SET ID_Operatore=$ID_Operatore, ID_Assistito=$ID_Assistito, Data='$data',Ora_Inizio='$oraInizio', Ora_Fine = '$oraFine', Descrizione='$descrizione'";
		if(!$mysqli -> query($query)){
			die($mysqli->error);
		}
	}
	
	function EliminaIntervento ($ID_Intervento){
		$query = "DELETE FROM interventi WHERE ID_Intervento=".$ID_Intervento;
		if(!$mysqli -> query($query)){
			die($mysqli->error);
		}	
	}

	
	function getStartAndEndDate($week, $year){

		$time = strtotime("1 January $year", time());
		$day = date('w', $time);
		$time += ((7*$week)+1-$day)*24*3600;
		$return[0] = date('Y-n-j', $time);
		$time += 6*24*3600;
		$return[1] = date('Y-n-j', $time);
		return $return;
	}
	
	function VisualizzaTurniOperatore ($data, $ID_Operatore){
		$date = new DateTime($data);
		$settimana = $date->format("W");
		
		$date1 = new DateTime($data);
		$anno = $date1->format("Y");
		getStartAndEndDate($settimana, $anno);
					
		$query = "SELECT * FROM Interventi INNER JOIN Operatori ON Interventi.ID_Operatore = Operatori.ID_Operatore".
		"INNER JOIN Assititi ON Interventi.ID_Assistito = Assititi.ID_Assistito".
		"WHERE	(Interventi.Data >= '$return[0]' AND Interventi.Data <= '$return[1]') AND (Operatori.ID_Operatore = $ID_Operatore)";
		
		if(!$mysqli -> query($query)){
			die($mysqli->error);	
		}
		
		$result = $mysqli -> query($query);
		
		return $result;
	
	}
	
	function VisualizzaTurniAssistito ($ID_Assistito, $data){
		$date = new DateTime($data);
		$settimana = $date->format("W");
		
		$date1 = new DateTime($data);
		$anno = $date1->format("Y");
		getStartAndEndDate($settimana, $anno);
					
		$query = "SELECT * FROM Interventi INNER JOIN Operatori ON Interventi.ID_Operatore = Operatori.ID_Operatore".
		"INNER JOIN Assititi ON Interventi.ID_Assistito = Assititi.ID_Assistito".
		"WHERE	(Interventi.Data >= '$return[0]' AND Interventi.Data <= '$return[1]') AND (Assititi.ID_Assistito = $ID_Assistito)";
		
		if(!$mysqli -> query($query)){
			die($mysqli->error);	
		}
		
		$result = $mysqli -> query($query);
		
		return $result;
	}

	function ContaOre($oraInizio, $oraFine, $ID_Intervento){
		
	}
	
?>