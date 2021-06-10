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
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@200&display=swap" rel="stylesheet">

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
            <form class="form-horizontal" role="form" action="login.php" method="POST">
                <h2 class="subheader">Logowanie</h2>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email </label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Email" class="form-control" name= "email" style="width: 80%;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Hasło</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Hasło" name="password" class="form-control" style="width: 80%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-block" id="create_account">Zaloguj się</button>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> 
        <br><br>
    </body>
</html>

<?php

    $flag = true;
    $msg = "Komunikat zwrotny";

    if ( empty($_POST['email']) && empty($_POST['password']) ) {
        $flag = false;
        exit();
    }

    if ( empty($_POST['email']) || empty($_POST['password']) ) {
        $flag = false;
        $msg = "Nie wprowadzono wszystkich danych";  
    }

    $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $_POST['email']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ( $flag ) {
        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
        } else {
            $flag = false;
            $msg = "Nieprawidłowe hasło lub email"; 
        }
    }
    
    if ( $flag ) {
        print '<br>poprawne dane<br>';
        // code to manage a logged-in user
        header("Location:profile_page.php");
        exit();
    } else {
        print '
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4"></div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div>
                    <p style="font-size: 20px">Wprowadź poprawne dane, aby się zalogować- <i>'.$msg.'</i></p>
                </div>   
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4"></div>
        </div>
        ';
    }

?>