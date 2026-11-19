<!-- 
    filename: autovettura.php
    date: 18.11.26 21:30
    Description: file PHP per la gestione della tabella autovettura
    - Visualizza medici presenti.
    - Visualizza il form per l'inserimento di un nuovo medico.
    - Inserisce i dati nella tabella mySQL.


    Medico: Nome, cognome, CF, NumeroAlbo, Telefono, Email.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Consulto Medico</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <!-- Creo la navbar con le opzioni generali -->
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="medico.php?scelta=vediCatalogo">Vedi Catalogo Medici</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="medico.php?scelta=formNuovoMedico">Nuovo medico</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php
                if(isset($_GET['scelta'])) $sc = $_GET['scelta']; else $sc = null;
                switch($sc){
                    case "vediCatalogo":{
                        // caso in cui devo visualizzare il catalogo, cioè tutte le auto nella tabella mySQL.

                        // mi collego al database e estraggo tutte le righe con una select di base.
                        $db = new mysqli("localhost","root","root","prova");
                        
                        // preparo la query mySQL da eseguire
                        $sql = "SELECT * FROM medico";

                        // eseguo la query e ricevo la risposta in una variabile 'resultSet' -> analoga alla promise usata nei JSON
                        // se la query va a buon fine, resultSet contiene un vettore con tutti i record estratti dalla query.
                        $resultSet = $db->query($sql);
                        $db->close();
                        ?>
                        <!-- preparo l'intestazione della tabella -->
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Cognome</th>
                                <th scope="col">Codice Fiscale</th>
                                <th scope="col">Numero Albo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // estraggo un record alla volta dalla resultSet e ne vado a stampare i valori richiamando le 'chiavi' -> 'colonne della tabella mysql'
                                while($record = $resultSet->fetch_assoc()){
                                        echo('<tr>
                                            <th scope="row">'.$record['id'].'</th>
                                            <td>'.$record['nome'].'</td>
                                            <td>'.$record['cognome'].'</td>
                                            <td>'.$record['codice_fiscale'].'</td>
                                            <td>'.$record['numero_albo'].'</td>
                                            <td>'.$record['telefono'].'</td>
                                            <td>'.$record['email'].'</td>
                                        </tr>');
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        break;
                    }
                    case "formNuovoMedico":{
                        /* utilizzando le classi Bootstrap 5.3.8 creo tutto il form con:
                            - caselle di testo (form control)
                            - radio button (form-check)
                            - input nascosco (<input type type="hidden"...>)
                            - bottone submit a fine del form.
                            Per il layour ho deciso di fare una riga (class="row") a 3 colonne(class="col")
                            ed una riga finale a singola colonna con testo allineato al centro (class="col text-center")

                            !ATTENZIONE!
                            tutto deve essere incluso in un tag <form ...> l'attributo action specifica la pagina da richiamare quando viene
                            premuto il buttone submit
                        */
                        ?>
                        <form action="autovettura.php" method="get">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="mb-3">
                                        <label for="inputMarca" class="form-label">Nome medico</label>
                                        <input class="form-control" type="text" id="inputMarca" name="inputMarca" placeholder="Nome medico" aria-label="Input marca autovettura">
                                        </div>
                                        <div class="mb-3">
                                        <label for="inputModello" class="form-label">Cognome medico</label>
                                        <input class="form-control" type="text" id="inputModello" name="inputModello" placeholder="Cognome medico" aria-label="Input modello autovettura">
                                        </div>   
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="mb-3">
                                            <label for="inputAnno" class="form-label">Codice fiscale medico</label>
                                            <input class="form-control" type="text" id="inputAnno" name="inputAnno" placeholder="Codice fiscale medico" aria-label="Input anno immatricolazione">
                                            </div>
                                            <div class="mb-3">
                                            <label for="inputProvincia" class="form-label">Numero Albo medico</label>
                                            <input class="form-control" type="text" id="inputProvincia" name="inputProvincia" placeholder="Numero Albo medico" aria-label="Input provincia">
                                            </div>   
                                        </div>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="mb-3">
                                            <label for="inputAnno" class="form-label">Numero di telefono medico</label>
                                            <input class="form-control" type="text" id="inputAnno" name="inputAnno" placeholder="Numero di telefono medico" aria-label="Input anno immatricolazione">
                                            </div>
                                            <div class="mb-3">
                                            <label for="inputProvincia" class="form-label">Email medico</label>
                                            <input class="form-control" type="text" id="inputProvincia" name="inputProvincia" placeholder="Email medico" aria-label="Input provincia">
                                            </div>   
                                        </div>
                                    </div>
                                </div>


                            </div> <!-- chiude la prima riga a tre colonne -->
                            <div class="row">
                                <div class="col text-center">
                                    <input type="hidden" name="scelta" value="aggiungiMedico">
                                    <button type="submit" class="btn btn-primary">Aggiungi Dati Medico</button>
                                </div>
                            </div> <!-- chiude la seconda riga a colonna singola -->
                        </form>
                        <?php
                        break;
                    }
                    case "aggiungiMedico":{
                        // recupero dal vettore $_GET i valori che l'untente ha inserito nei campi di testo
                        $marca = $_GET['inputNome'];
                        $modello = $_GET['inputCognome'];
                        $annoImm = $_GET['inputCodiceFiscale'];
                        $prov = $_GET['inputNumeroAlbo'];
                        $uniprop = $_GET['inputTelefono'];
                        $kilometri = $_GET['inputEmail'];

                        // mi collego al database
                        $db = new mysqli("localhost", "root", "root", "medico");
                        // preparo lo statement da eseguire; preferibile alla semplice query per evitare SQL injections.
                        // reference ufficiale: https://www.php.net/manual/en/mysqli.quickstart.prepared-statements.php
                        $stmt = $db->prepare("INSERT INTO autovettura(nome, cognome, codice_fiscale, numero_albo, telefono, email) VALUES(?,?,?,?,?,?)");
                        // eseguo il bind 'associo' il tipo di dato da inserire alla variabile che lo contiene 
                        $stmt->bind_param("ssssii", $nome, $cognome, $codice_fiscale, $numero_albo, $telefono, $email);
                        
                        // eseguo lo statement -> ritorna true se va a buon fine altrmenti un false.
                        if($stmt->execute())
                            echo('<div class="alert alert-success text-center"><h3>Medico inserito correttamente</h3></div>');
                        else
                            echo('<div class="alert alert-warning text-center"><h3>ERRORE in aggiunta medico</h3></div>');
                        $db->close();
                        break;
                    }
                }
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>