<?php
session_start();
include('config.php');

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
            #logout-btn{
                transition-duration:0.4s;
                text-align:center;
                border:none;
                background-color:#fc0398;
                border-radius:4px;
                padding:5px;
            }
            #logout-btn:hover{
                background-color:#e843d8;
                color:white;
            }
           
            #prof-pic {
                height: 396px;
                width: 396px;
                border: 4px solid;
                border-color: #000000;
                cursor:pointer;
            }
            #imageUpload{
                display:none;
            }
            #save_changes {
                transition-duration:0.4s;
                text-align:center;
                border:none;
                background-color:#fc0398;
                border-radius:4px;
                display:block;
                margin: 0 auto;
                padding: 10px;
            }
            #save_changes:hover {
                background-color:#e843d8;
                color:white;
            }
            .nav_hover {
                transition-duration: 0.2s;
            }
            .nav_hover:hover{
                background-color:#fc0398;
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
            $uid = $_SESSION['id'];
            $stmt = $dbh->prepare('SELECT * FROM users WHERE user_id = :user_id');
            $stmt->execute([':user_id' => $uid]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $fname=$data['firstname'];
            $lname=$data['lastname'];
            $sex = $data['sex'];
            $province=$data['province'];
            $birth_date=$data['birth_date'];
            $email=$data['email'];
            $desc = $data['description'];
            print 
                '<form action="" method="POST">
                    <input type="submit" name="logout" value="Wyloguj" id="logout-btn">
                </form>'; 
            ?>
            
            </div>
        </nav>
        
        <div class="container" style="background-color:#787474; height:820px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <div class="row">
                <div class="col-lg-6" >
                    <div class="card" style=" width: 400px; height:700px; border:4px solid;border-color:#000000; background-color:#333030; margin-left: 50px;margin-top:30px;">
                        <?php
                        $result = glob ('./images/' . $_SESSION['id'] . '.*');
                    
                        if (!empty($result)){
                            print '<img class="card-img-top" src="' . $result[0] . '" alt="Photo" id="prof-pic">';
                        } else {
                            print '<img class="card-img-top" src="./images/prof.jpg" alt="Photo" id="prof-pic">';
                        }
                        ?>
                        
                        <form action="profile_page.php" method="POST" enctype="multipart/form-data">
                            <input id="imageUpload" type="file" name="prof_photo" required="" capture>
                            <div class="container">
                            <p style="text-align: center; color:white;"> Kliknij na powyższe zdjęcie aby je zmienić</p>
                            </div>
                            <input type="submit" name="submit" value="Zapisz zmiany" id="save_changes">
                            <script>
                            $("#prof-pic").click(function(e) {
                                $("#imageUpload").click();
                            });
                            </script>
                        </form>
                        
                        <div class="card-body">
                            <h1 class="card-title" style="color:white;"><?php print htmlspecialchars($fname, ENT_QUOTES | ENT_HTML401, 'UTF-8') . ' ' . htmlspecialchars($lname, ENT_QUOTES | ENT_HTML401, 'UTF-8')?></h1>
                            <hr style="border:2px solid black;"/>
                            <?php
                            $year = substr($birth_date, 0, 4);
                            $age = 2021 - intval($year);
                            ?>
                            <h2 class="card-subtitle" style="color:white;"><?php print $province ?></h2>
                            <hr style="border:2px solid black;"/>
                            <h3 style="color:white; margin-top: -5px;"> <?php print $age . ' lat' ?> </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" style="height: 600px;  margin-left:-50px; ">
                    <div class="container justify-content-center;" style="margin-top: 30px;">
                    <div class="card" style="margin-bottom:30px; border: 1px solid; border-color:#000000 ">
                        <div class="card-header" style="border:1px; border-color:#000000; background-color:#000000; color:white; ">Opis</div>
                            <div class="card-body" style="background-color: #333030;  height: 650px;">
                                <p class="card-text" style="color:white;"><?php print htmlspecialchars($desc, ENT_QUOTES | ENT_HTML401, 'UTF-8') ?></p>
                            </div>
                        </div>
                        <br />
                    </div>
                    </div>
                </div>
            </div>
        </div>

<?php
if (isset($_FILES['prof_photo'])) {
    $errors= array();
    $file_name = $_FILES['prof_photo']['name'];
    $file_size = $_FILES['prof_photo']['size'];
    $file_tmp = $_FILES['prof_photo']['tmp_name'];
    $file_type = $_FILES['prof_photo']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['prof_photo']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    $file_name = $_SESSION['id'] . '.' . $file_ext;
    if(empty($errors)==true) {
        $result = glob ('./images/' . $_SESSION['id'] . '.*');
        if (!empty($result)){
            unlink('./images/' . $_SESSION['id'] . '.*');
        }
        move_uploaded_file($file_tmp,"images/".$file_name);
        
     }else{
         print '
         <div class="container" style="background-color: red; margin-top:20px;">
         <p style="text-align:center;"> Wystąpił błąd! Obsługiwane formaty to .jpg .jpeg .png </p>
         </div>';
        //print_r($errors);
    }
}

if (isset($_POST['logout'])){
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    header("Location:login.php");
    exit();
}

?>
    </body>
</html>