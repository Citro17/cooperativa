<?php
    function login(){
        $db = new mysqli('localhost', 'test', 'test', 'cooperativasociale');
            if ($db->connect_error) {
                die('Errore di connessione (' . $db->connect_errno . ') '
                . $db->connect_error);
        } 
        session_start();


        // se la pagina è richiesta in post...
        if($_SERVER["REQUEST_METHOD"] == "POST") {

                // se sono stati passati i parametri username e password
                if(isset($_POST["username"]) && isset($_POST["password"])) {

        // tira fuori i dati dal database
$sql = <<<SQL
    SELECT *
    FROM `utenti`
SQL;

                        if(!$result = $db->query($sql)){
                            die('Errore nella esecuzione della query [' . $db->error . ']');
                        }

                        // tra essi cerca la coppia username/password e se la trova imposta la variabile di sessione
                        while($row = $result->fetch_assoc()){


                                if($row['NomeUtente'] == $_POST["username"] 
                                        && $row["Password"] == $_POST["password"]) {

                                        $_SESSION["username"] = $row['NomeUtente'];
                                        break;

                                }
                        }

                }
            }
        }
        
        function inserisciAssistito($nome, $cognome, $indirizzo, $residenza, $codiceFiscale, $telefono, $descrizione){
            if($_SERVER["REQUEST_METHOD"] == "POST") {
    
                //leggo
                $nome = trim($_POST["nome"]);
                $cognome = trim($_POST["cognome"]);
                $indirizzo = trim($_POST["indirizzo"]);
                $residenza = trim($_POST["residenza"]);
                $codiceFiscale = trim($_POST["codiceFiscale"]);
                $telefono = trim($_POST["telefono"]);
                $descrizione = trim($_POST["descrizione"]);

                $query = "INSERT INTO assistiti (Nome, Cognome, Telefono, Codice_Fiscale, Indirizzo, Comune, Descrizione, Categoria) "
                        . "VALUES ('$nome', '$cognome', '$indirizzo', '$residenza', '$codiceFiscale', '$telefono', '$descrizione')";

                            // Esecuzione della query e controllo degli eventuali errori
                            if (!$mysqli->query($query)) {
                                die($mysqli->error);
                            }

            }
        }
    
    
    
?>