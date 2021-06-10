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
          width: 500px;
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
        </style>
        
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
                        <a class="nav-link nav_hover" href="quiz.php" style="color:white;">Odpowiedz na pytania <span class="sr-only">(current)</span></a>
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
				 </form>'; 
            ?>
            </div>
        </nav>
        <form action="quiz.php" method="POST">
        <div class="container" id="desc_div" style="background-color:#f2b463; border: 1px solid; border-color:#f7991e; text-align:center; padding:5px;">
            <p> Jeśli nie chcesz odpowiadać na konkretne pytanie, nie zaznaczaj żadnej odpowiedzi.</p>
        </div>
        <div class="container" style="margin-top:20px;">
        <?php

        $stmt1 = $dbh->prepare('SELECT * FROM user_answers WHERE user_id = :user_id');
        $stmt1->execute([':user_id' => $_SESSION['id']]);
        
        $answered_questions = array();
        while ($user_answers = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            array_push($answered_questions, $user_answers['question_id']);
        }
        if (!empty($answered_questions)){
            $answered_questions1 = implode(',', $answered_questions);
            $stmt = $dbh->prepare('SELECT * FROM questions WHERE question_id NOT IN (' . $answered_questions1 . ') order by RAND() LIMIT 10'); //10 randomly picked questions
            $stmt->execute();
        } else {
            $stmt = $dbh->prepare('SELECT * FROM questions order by RAND() LIMIT 10'); //10 randomly picked questions
            $stmt->execute();
        }
        //
        $questions_showed_id = array(); // array with question_ids of showed questions -> has to be bined with new database
        //while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        for ($i = 1; $i <= 10; $i++) {
            $row[$i] = $stmt->fetch(PDO::FETCH_ASSOC);
            if (empty($row[$i])){
                /*
                print 'brak pytan';
                print '
                <div class="container">
                    <input type="submit" name="finish1" value="Zakończ" id="end-btn">
                </div>';

                if (isset($_POST['finish1'])){
                    for ($i = 1; $i <= 10; $i++) {
                    
                        
                        $stmt2 = $dbh->prepare('INSERT INTO user_answers (user_id, question_id, own_answer, partner_desired_answer, question_importance) VALUES (:user_id, :question_id, :own_answer, :partner_desired_answer, :question_importance)');
                        $stmt2->execute([':user_id' => $_SESSION['id'], ':question_id' => $questions_showed_id[$i-1], ':own_answer' => $_POST['ans' . $i], ':partner_desired_answer' => $_POST['want' . $i], ':question_importance' => $_POST['importance' . $i]]);
        
                    }
                   
        
                }
                exit();
                */
            } else {
            print '
            <div class="row" style="background-color:#787474;">
                <div class="col-md-6">
                    <div class="container" style="margin-bottom: 20px;">
                    <div class="container" style="border: 1px solid; border-color: #000000; border-radius:5px; background-color:#fc0398; color:black;">
                        Pytanie ' . $row[$i]['question_id'] . ': ' . $row[$i]['content'] . '
                    </div>
                    <div class="pink-clr">
                        <input type="radio" name="ans'.$i.'" value="A" id="'.$row[$i]['question_id'].'1'.'">
                        <label for="'.$row[$i]['question_id'].'1'.'"> ' . $row[$i]['answer1'] . '</label>
                    </div>
                    <div class="pink-clr">
                        <input type="radio" name="ans'.$i.'" value="B" id="'.$row[$i]['question_id'].'2'.'">
                        <label for="'.$row[$i]['question_id'].'2'.'"> ' . $row[$i]['answer2'] . '</label>
                    </div>
                    <div class="pink-clr">';
                    if($row[$i]['answer3'] != NULL){
                        print'
                        <input type="radio" name="ans'.$i.'" value="C" id="'.$row[$i]['question_id'].'3'.'">
                        <label for="'.$row[$i]['question_id'].'3'.'"> ' . $row[$i]['answer3'] . '</label>';
                    }
                    print'
                    </div>
                    <div class="pink-clr">';
                    if($row[$i]['answer4'] != NULL){
                        print'
                        <input type="radio" name="ans'.$i.'" value="D" id="'.$row[$i]['question_id'].'4'.'">
                        <label for="'.$row[$i]['question_id'].'4'.'"> ' . $row[$i]['answer4'] . '</label>';
                    }
                    array_push($questions_showed_id, $row[$i]['question_id']);
                    print '
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <div class="container" style="border: 1px solid; border-color:#000000; border-radius:5px; background-color:#fc0398; color:black;">
                            Jak chciałabyś/chiałbyś aby odpowiedziała druga osoba?
                        </div>
                        <div class="container pink-clr">
                            <input type="radio" name="want'.$i.'" value="A" id="'.$row[$i]['question_id'].'11'.'">
                            <label for="'.$row[$i]['question_id'].'11'.'"> ' . $row[$i]['answer1'] . '</label>
                        </div>
                        <div class="container pink-clr">
                            <input type="radio" name="want'.$i.'" value="B" id="'.$row[$i]['question_id'].'22'.'">
                            <label for="'.$row[$i]['question_id'].'22'.'"> ' . $row[$i]['answer2'] . '</label>
                        </div>
                        <div class="container pink-clr">';
                        if($row[$i]['answer3'] != NULL){
                        print '
                            <input type="radio" name="want'.$i.'" value="C" id="'.$row[$i]['question_id'].'33'.'">
                            <label for="'.$row[$i]['question_id'].'33'.'"> ' . $row[$i]['answer3'] . '</label>';
                        }
                        print'
                        </div>
                        <div class="container pink-clr">';
                        if($row[$i]['answer4'] != NULL){
                        print '
                            <input type="radio" name="want'.$i.'" value="D" id="'.$row[$i]['question_id'].'44'.'">
                            <label for="'.$row[$i]['question_id'].'44'.'"> ' . $row[$i]['answer4'] . '</label>';
                        }
                        print '
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="container" style="width: max-width; margin-top:10px; margin-bottom:20px;" align="center">Jak ważne dla Ciebie jest to pytanie?
                        <br />
                        <input type="range" name="importance'.$i.'" id="'.$row[$i]['id'].'" min="1" max="10" class="slider" list="tickmarks">
                        <datalist id="tickmarks">
                            <option value="1" label="1"</option>
                            <option value="2" label="2"</option>
                            <option value="3" label="3"</option>
                            <option value="4" label="4"</option>
                            <option value="5" label="5"</option>
                            <option value="6" label="6"</option>
                            <option value="7" label="7"</option>
                            <option value="8" label="8"</option>
                            <option value="9" label="9"</option>
                            <option value="10" label="10"</option>
                        </datalist>
                    </div>
                </div>
            </div>';
                    }
        }
        if (isset($_POST['logout'])){
            unset($_SESSION['id']);
            unset($_SESSION['email']);
            header("Location:login.php");
            exit();
        }

        
        
        //https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/range - tickmarks
        /*
        input[type="radio"]:after {
          width: 15px;
          height: 15px;
          border-radius: 15px;
          top: -2px;
          left: -1px;
          position: relative;
          background-color: #d1d3d1;
          content: '';
          display: inline-block;
          visibility: visible;
          border: 2px solid white;
        }
        input[type="radio"]:checked:after {
          width: 15px;
          height: 15px;
          border-radius: 15px;
          top: -2px;
          left: -1px;
          position: relative;
          background-color: #ffa500;
          content: '';
          display: inline-block;
          visibility: visible;
          border: 2px solid white;
        }
        */
        ?>
        </div>
        <div class="container">
            <input type="submit" name="finish" value="Zakończ" id="end-btn">
        </div>
        </form>

        <?php

        if (isset($_POST['finish'])){
            for ($i = 1; $i <= 10; $i++) {
                if (($_POST['ans' . $i] == NULL) || ($_POST['want' . $i] == NULL)){
                    
                } else {
                
                $stmt2 = $dbh->prepare('INSERT INTO user_answers (user_id, question_id, own_answer, partner_desired_answer, question_importance) VALUES (:user_id, :question_id, :own_answer, :partner_desired_answer, :question_importance)');
                $stmt2->execute([':user_id' => $_SESSION['id'], ':question_id' => $questions_showed_id[$i-1], ':own_answer' => $_POST['ans' . $i], ':partner_desired_answer' => $_POST['want' . $i], ':question_importance' => $_POST['importance' . $i]]);
                }
            }
        

        }
        ?>
    </body>
</html>
            