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
    if (isset($_SESSION['id']) && isset($_SESSION['email'])){
        header("Location:profile_page.php");
        exit();
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

        <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
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
            <form class="form-horizontal" role="form" action="register.php" method="POST">
                <h2 class="subheader">Rejestracja</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Imię</label>
                    <div class="col-sm-9">
                        <input type="text" name="firstName" id="firstName" placeholder="Imię" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Nazwisko</label>
                    <div class="col-sm-9">
                        <input type="text" name="lastName" id="lastName" placeholder="Nazwisko" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email </label>
                    <div class="col-sm-9">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                        <span class="help-block">Twój adres email nie będzie widoczny dla innych użytkowników portalu </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Hasło</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" id="password" placeholder="Hasło" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="passwordRepeated" class="col-sm-3 control-label">Powtórz Hasło</label>
                    <div class="col-sm-9">
                        <input type="password" name="passwordRepeated" id="passwordRepeated" placeholder="Hasło" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Data Urodzenia</label>
                    <div class="col-sm-9">
                        <input type="date" name="birthDate" id="birthDate" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Województwo</label>
                    <div class="col-sm-9">
                        <select id="provinces" name="provinces">
                            <option value="empty">-</option>
                            <option value="dolnoslaskie">dolnośląskie</option>
                            <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                            <option value="lubelskie">lubelskie</option>
                            <option value="lubuskie">lubuskie</option>
                            <option value="lodzkie">łódzkie</option>
                            <option value="malopolskie">małopolskie</option>
                            <option value="mazowieckie">mazowieckie</option>
                            <option value="opolskie">opolskie</option>
                            <option value="podkarpackie">podkarpackie</option>
                            <option value="podlaskie">podlaskie</option>
                            <option value="pomorskie">pomorskie</option>
                            <option value="slaskie">śląskie</option>
                            <option value="swietokrzyskie">świętokrzyskie</option>
                            <option value="warminsko-mazurskie">warmińsko-mazurskie</option>
                            <option value="wielkopolskie">wielkopolskie</option>
                            <option value="zachodniopomorskie">zachodniopomorskie</option>
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Płeć</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="radio-inline">
                                    <input type="radio" id="femaleRadio" value="Female" name="sex">Kobieta
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" value="Male" name="sex">Mężczyzna
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline">
                                    <input type="radio" id="noneRadio" value="None" name="sex" checked>Nie chcę ujawniać
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Opis</label>
                    <div class="col-sm-9">
                        <textarea id="description" name="description" rows="4" cols="80">Opowiedz coś o sobie</textarea>
                    </div>
                </div>
                <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <br>
                        <div class="g-recaptcha" data-sitekey="6LcAMwwbAAAAAARBSrm9bAoqIacpxWCRrIlnbEnk"></div>
                        <br>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary btn-block" id="create_account">Utwórz Konto</button>
                    </div>
                </div>
            </form>
        </div> 
        <br><br>
    </body>
</html>

<?php 

    $flag = true;
    $msg = "Komunikat zwrotny";

    if ( empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) ) $flag = false;
    if ( empty($_POST['password']) || empty($_POST['passwordRepeated']) || $_POST['provinces'] == "empty") $flag = false;
    if ( empty($_POST['birthDate']) || empty($_POST['description']) ) $flag = false;

    if ($flag) {

        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_repeated = $_POST['passwordRepeated'];
        $birth_date = $_POST['birthDate'];
        $description = $_POST['description'];
        $province = $_POST['provinces'];

        if ( $_POST['sex'] == "Male" ) {
            $gender = "mężczyzna";
        } elseif ( $_POST['sex'] == "Female" ) {
            $gender = "kobieta";
        } elseif ( $_POST['sex'] == "None" ) {
            $gender = "Nie ujawniono";
        }

    } else {
        $msg = "nie wprowadzono pewnych danych";
    }

    if ( empty($_POST['firstName']) && empty($_POST['lastName']) && empty($_POST['email']) ) {
        exit();
    }


    if ( $flag && strlen($password) < 5 ) {
        $flag = false;
        $msg = "hasło jest zbyt krótkie";
    } elseif ( $flag && $password != $password_repeated ) {
        $flag = false;
        $msg = "powtórzone hasło niezgodne z pierwszym";
    } elseif ( $flag && !preg_match('/^[a-zA-Z0-9\-\_\.]+\@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]{2,5}$/D', $email)) {
        $flag = false;
        $msg = "wprowdozny email jest nieprawidłowy";
    }

    if( $flag && !empty($_POST['g-recaptcha-response']) ) {
        $secret = '6LcAMwwbAAAAAL0mDI-gwSJLxlqhsMxmFr5wbyYo';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ( !($responseData->success) ) {
            $flag = false;
            $msg = "Potwierdź, że nie jesteś robotem";
        } 
    } 
    
    if ( empty($_POST['g-recaptcha-response']) ) {
        $flag = false;
        $msg = "Potwierdź, że nie jesteś robotem";
    }
    
    if ($flag) {

        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $dbh->prepare('
                INSERT INTO users (
                    user_id, firstname, lastname, email, password, birth_date, province, sex, description
                ) VALUES (
                    null, :first_name, :last_name, :email, :password, :birth_date, :province, :gender, :description
                )
            ');
            $stmt->execute([':first_name' => $first_name, ':last_name' => $last_name, ':email' => $email, ':password' => $hashed_pass, ':birth_date' => $birth_date,
            ':province' => $province, ':gender' => $gender, 'description' => $description]);
            
            print '
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4"></div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div>
                            <p style="font-size: 20px">Użytkownik zarejestrowany pomyślnie!</p>
                        </div>   
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4"></div>
                </div>
            ';
        } catch (PDOException $e) {
            print '
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4"></div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div>
                            <p style="font-size: 20px">Ten adres email już jest zajęty</p>
                        </div>   
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4"></div>
                </div>
                ';
        } 

            $stmt2 = $dbh->prepare('SELECT * FROM users WHERE email = :email');
            $stmt2->execute([':email' => $_POST['email']]);      
            $user = $stmt2->fetch(PDO::FETCH_ASSOC);


            $_SESSION['id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
        
            echo "<script type='text/javascript'>window.top.location='https://s112.labagh.pl/profile_page.php';</script>"; exit;
    } else {
        print '
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4"></div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div>
                    <p style="font-size: 20px">Wprowadź poprawne dane, aby się zarejestrować- <i>'.$msg.'</i></p>
                </div>   
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4"></div>
        </div>
        ';
    }

?>