<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Prova di form per raccolta dati</title>
        <meta charset="utf-8">
        <!-- parte richiesta dal framework Bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        <?php
            if(isset($_GET['scelta'])){
                switch($_GET['scelta']){
                    case "calcola":{
                        $a = $_GET['inputA'];

                        for($i = 0; $i <= $a; $i++){
                            echo('<table>')
                            for($j = i; $j <= $a; $j++){
                                $tab = $i * $j;
                                echo('<table>
                                <tr>
                                    <th>'.$tab'</th>
                                </tr>');
                            }
                            echo('</table>');
                        }
                        
                        break;
                    }
                }
            }
            else{
                echo('<div class="container-fluid">
                    <h1>Form Inserimento Dati</h1>
                    <form action="e04.php" method="get">
                        <div class="mb-3">
                            <label for="inputA" class="form-label">Inserisci valore del raggio</label>
                            <input class="form-control form-control-lg" type="text" name="inputA" id="inputA" placeholder="Valore raggio" aria-label="default input example">
                        </div>
                        <input type="hidden" name="scelta" id="scelta" value="calcola">
                        <button class="btn btn-success" type="submit">Trova A</button>
                    </form>            
                </div>');
            }
        ?>
        <!-- sezione script richiesta dal framework Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>