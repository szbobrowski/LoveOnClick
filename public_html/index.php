<?php

    session_start();

    include("config.inc.php");

    if (isset($config) && is_array($config)) {

        try {
            $dbh = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'] . ';charset=utf8mb4', $config['db_user'], $config['db_password']);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Nie mozna polaczyc sie z baza danych: " . $e->getMessage();
            exit();
        }

    } else {
        exit("Nie znaleziono konfiguracji bazy danych.");
    }

?>

<!DOCTYPE html>

<html lang="pl">
    <head>

        <title>LoveOnClick</title>
        <meta charset="utf-8">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Loved+by+the+King&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="style_before_logged.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 id="intro"> <span style="color: palevioletred; font-weight: bold; font-size: 130%;">LoveOnClick</span> - najlepsze miejsce w sieci, aby znaleźć swoją sympatię</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4" class="border">
                    <div class="field">
                        <p>Dowiedz się więcej o tym jak działamy!</p>
                        <form action="read_more.html">
                            <input type="submit" value="Informacje" class="go" />
                        </form>
                    </div> 
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 border" class="border">
                    <div class="field">
                        <p>Załóż konto i zobacz ile wspaniałych osób możesz poznać!</p>
                        <form action="register.php">
                            <input type="submit" value="Rejestracja" class="go" />
                        </form>
                    </div>   
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 border" class="border">
                    <div class="field">
                        <p>Masz już konto? Zaloguj się!</p>
                        <form action="login.php">
                            <input type="submit" value="Logowanie" class="go" />
                        </form>
                    </div> 
                </div>
            </div>
        </div>

    </body>
</html>