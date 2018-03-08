<?php
    function login(){
        $db = new mysqli('localhost', 'test', 'test', 'cooperativasociale');
            if ($db->connect_error) {
                die('Errore di connessione (' . $db->connect_errno . ') '
                . $db->connect_error);
        } 
        session_start();

        // se la pagina è richiesta in get...
        if($_SERVER["REQUEST_METHOD"] == "GET") {

                // se è stato passato il parametro l=ok cancella la variabile di sessione
                if($_GET["l"] == "ok") {
                        unset($_SESSION["username"]);
                }

        }

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
    
    
    
?>