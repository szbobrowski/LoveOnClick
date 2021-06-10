<?php
    session_start();
    include('config.inc.php');

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

    if (!isset($_SESSION['id']) && (!isset($_SESSION['email']))){
        header("Location:login.php");
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
        .slider {
          -webkit-appearance: none;
          appearance:none;
          width: 650px;
          height: 10px;
          background: #d3d3d3;
          outline:none;
          opacity: 0.7;
          -webkit-transition: .2s;
          transition: opacity .2s;
        }
        .slider:hover {
          opacity:1;
        }
        .slider::-moz-range-thumb {
          width: 25px;
          height: 10px;
          background: #e324aa;
          cursor: pointer;
        }
        input[type="range"] {
          width: 100%;
          margin: 0;
          box-sizing: border-box;
        }
        label {
            
        }
        label:hover {
            background-color:#fc0398;
            transition-duration:0.2s;
        }
        datalist {
          display: flex;
          width: 100%;
          justify-content: space-between;
          margin-top: -14px;
          padding-top: 0px;
          color: #e324aa;
        }
        option {
          width: 2ex;
          display: flex;
          justify-content: center;
          height: 42px;
          align-items: end;
          background-image: url(tick.png);
          height: 4ex;
          background-position-y: -15px;
          background-position-x: center;
          z-index: -1;
        }
        #logout-btn{
                transition-duration:0.4s;
                text-align:center;
                border:none;
                background-color:#fc0398;
                border-radius:4px;
        }
        #logout-btn:hover{
                background-color:#e843d8;
                color:white;
        }
        #end-btn {
            display: block;
            margin: 0 auto;
            margin-bottom: 20px;
            width:120px;
            height:60px;
            background-color:#fc0398;
            border-radius:4px;
            transition-duration:0.4s;
            text-align:center;
            border:none;
        }
        #end-btn:hover{
            background-color:#e843d8;
            color:white;
        }
        .nav_hover{
            transition-duration: 0.2s;
        }
        .nav_hover:hover{
            background-color:#fc0398;
        }
        .pink-clr {
            width:300px;
            color:black;
            font-family: Helvetica;
            text-transform: uppercase;
        }

        #fit {
            color: white;
            font-family: Helvetica;
            font-size: 25px;
            text-align: center;
            margin: 20px;
            padding: 25px;
            letter-spacing: 2px;
        }

        #likeit_container {
            text-align: center;
            margin: auto;
        }
        #prof-pic {
            height: 396px;
            width: 396px;
            border: 4px solid;
            border-color: #000000;
            cursor:pointer;
        }
        .likeit {
            font-family: Helvetica;
            font-size: 35px;
            padding: 25px;
            letter-spacing: 2px;
            background-color: #C0C0C0;
            font-weight: bold;
            color: black;
        }

        .likeit:hover {
            background-color:#fc0398;
            transition-duration: 0.5s;
            cursor: pointer;
        }

        </style>
        
        <script>
            function change(num) {
                document. getElementById('likeit' + num).style.backgroundColor = '#fc0398';
            }
        </script>

    </head>
    <body>
    
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#000000;">
        <div class="container">
        <div class="navbar-brand" style="color:white;">LoveOnClick</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link nav_hover" href="quiz.php" style="color:white;">Odpowiedz na pytania<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link nav_hover" href="profile_page.php" style="color:white;">Mój profil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link nav_hover" href="discover.php" style="color:white;">Odkrywaj osoby</a>
                </li>
            </ul>
        </div>

        <?php
            print 
                '<form action="" method="POST">
                    <input type="submit" name="logout" value="Wyloguj" id="logout-btn">
                </form>
                </nav>'; 

            $stmt = $dbh->prepare('SELECT * FROM users ORDER BY RAND() LIMIT 10');
            $stmt->execute();
            
            $users_array = array();

            $num_of_users_to_display = 5;
    
            for ($i = 1; $i <= $num_of_users_to_display; $i++) {
                $users_array[$i] = $stmt->fetch(PDO::FETCH_ASSOC);

                $first_name = $users_array[$i]['firstname'];
                $last_name = $users_array[$i]['lastname'];
                $province = $users_array[$i]['province'];
                $description = $users_array[$i]['description'];

                $birth_date= $users_array[$i]['birth_date'];
                $year = substr($birth_date, 0, 4);
                $age = 2021 - intval($year);

                $id_of_partner = $users_array[$i]['user_id'];
                $id_of_user = $_SESSION['id'];

                // calculate fit
                $fit = 50;

                $stmt2 = $dbh->prepare('SELECT * FROM user_answers');
                $stmt2->execute();

                $counter = 0;
                
                $ids_of_questions_answered_by_user = [];
                $ids_of_questions_answered_by_partner = [];

                while ($row[$counter] = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    
                    if ( $id_of_user == $row[$counter]['user_id'] ) {
                        array_push($ids_of_questions_answered_by_user, $row[$counter]['question_id']);
                    }

                    if ( $id_of_partner == $row[$counter]['user_id'] ) {
                        array_push($ids_of_questions_answered_by_partner, $row[$counter]['question_id']);
                    }                    

                    $counter += 1;
                }

                $ids_of_common_questions = array_intersect($ids_of_questions_answered_by_user, $ids_of_questions_answered_by_partner);
                $num_of_common_questions = count($ids_of_common_questions);

                if ( $num_of_common_questions == 0 ) {
                    $fit = rand(25, 85);
                } else {

                    $fit = 90;

                    $stmt3 = $dbh->prepare('SELECT * FROM user_answers ORDER BY question_id');
                    $stmt3->execute();

                    $counter = 0;
                    $importance = 0;
                    $desired_answer = '';

                    while ($row[$counter] = $stmt3->fetch(PDO::FETCH_ASSOC)) {

                        if ( in_array( $row[$counter]['question_id'], $ids_of_common_questions, FALSE) && $id_of_user == $row[$counter]['user_id'] ) {
                            $importance = $row[$counter]['question_importance'];
                            $desired_answer = $row[$counter]['partner_desired_answer'];
                        }

                        if ( in_array($row[$counter]['question_id'], $ids_of_common_questions, FALSE) && $id_of_partner == $row[$counter]['user_id'] ) {
                            if ( $desired_answer == $row[$counter]['own_answer'] ) {
                                $fit += $importance;
                            } else {
                                $fit -= $importance;
                            }
                        }

                        $counter += 1;
                    }

                    if ( $fit >= 100 ) $fit = rand(90, 99);
                    if ( $fit <= 0 ) $fit = rand(1, 10);
                }

                if ( $id_of_user == $id_of_partner ) $fit = 100;

                //end calculate fit

                print '
                <div class="container" style="background-color:#787474; height:770px; border-radius: 10px; margin-top: 50px; margin-bottom: 30px">
                <div class="row">
                    <div class="col-lg-6" >
                        <div class="card" style=" width: 400px; height:400px; border:4px solid;border-color:#000000; background-color:#333030; margin-left: 50px;       margin-top:30px;">';

                            $result = glob ('./images/' . $id_of_partner . '.*');
                        
                            if (!empty($result)){
                                print '<img class="card-img-top" src="' . $result[0] . '" alt="Photo" id="prof-pic">';
                            } else {
                                print '<img class="card-img-top" src="./images/prof.jpg" alt="Photo" id="prof-pic">';
                            }
                            
                print             
                    '</div>
                        </div>
            
                            <div class="col-lg-6" >
                                <div class="card" style=" width: 450px; height:300px; border:4px solid;border-color:#000000; background-color:#333030; margin-left: 40px;       margin-top:90px;">
                                    <p id="fit">
                                        Stopień dopasowania: ' . $fit . '%
                                    </p>
                                    <p id="likeit_container">
                                        <input id="likeit'.$i.'" class="likeit" type="button" onclick="change('.$i.')" value="podoba mi się">
                                    </p>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                                
                            <div class="container justify-content-center;" style="margin-top: 30px;">
                                    <div class="card" style="margin-bottom:30px; border: 1px solid; border-color:#000000 ">
                                        <div class="card-header" style="border:1px; border-color:#000000; background-color:#000000; color:white; text-align: center; font-weight: bold;">
                                            '. htmlspecialchars($first_name, ENT_QUOTES | ENT_HTML401, 'UTF-8') . ' ' . htmlspecialchars($last_name, ENT_QUOTES | ENT_HTML401, 'UTF-8') . ', ' . $age . ', ' . $province . '
                                        </div>
                                            <div class="card-body" style="background-color: #333030;  height: 200px;">
                                                <p class="card-text" style="color:white;">'. htmlspecialchars($description, ENT_QUOTES | ENT_HTML401, 'UTF-8') .'</p>
                                            </div>
                                        </div>
                            </div>
                            <br />
                                
                        </div>
                    </div>      
                ';

                if (isset($_POST['logout'])){
                    unset($_SESSION['id']);
                    unset($_SESSION['email']);
                    header("Location:login.php");
                    exit();
                }
            }
        ?>

    </body>
</html>