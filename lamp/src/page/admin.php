<html lang="fr">

<!-- En tete de la page -->
<head>

    <meta http-equiv="content-type" content="text/html charset=utf-8"/>
    <meta name="description" content="Design For Green experience">
    <meta name="keywords" content="design;green;comsuption;energy">
    <meta name="author" content="Team 8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Design4Green</title>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/display_hide.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>

    <?php
        include '../database_connexion.php';

        $id = trim($_POST['adminId']);
        $password = trim($_POST['adminPassword']);
        $password = hash('sha512', $password);
        $error = null;

        if (empty($id) || empty($password)) {
            $error = "Veuillez remplir tous les champs";
        }
        if ($id>50 || $password>255) {
            $error = "Les champs ne peuvent pas excéder 50 caractères";
        }

        if ($id=="D4G2019" && $password=="ab31f000bd236c6eac9f8c860114f52c4b9fd6ee8abea9c515b14d06119e392e9a5fbb487c4b9be4e1e6819788aafcf6dc1f555e56d23d5b483062e7cbe055bf") {

            $users = $bdd->query('SELECT * FROM user ORDER BY id');
            $users2 = $bdd->query('SELECT * FROM user ORDER BY id');
            $home = $bdd->query('SELECT DISTINCT home FROM consumption');
            $home2 = $bdd->query('SELECT DISTINCT home FROM consumption');
    ?>

    <!-- Header de la page -->
    <div id ="header" class="row">
        
        <?php if (isset($_GET['success'])) { ?>
            <div id="success" style="text-align:center"><i class="fas fa-check-circle"></i> <?php echo $_GET['success'] ?> <i class="fas fa-check-circle"></i></div>
        <?php } else if (isset($_GET['error'])) { ?>
            <div id="error" style="text-align:center"><i class="fas fa-exclamation-circle"></i> <?php echo $_GET['error'] ?> <i class="fas fa-exclamation-circle"></i></div>
        <?php } ?>

        <div class="col-sm-4">
            <img src="../img/logo.png" id="headerLogo" width="300px"/>
        </div>
        <div class="col-sm-5">
            <div id="headerTitle">Design 4 Green</div>
            <br><br>
            <span style="font-size:18px;">
                Energy Consumption
                <br>
            </span>
        </div>
    </div>

    <div id="main">
        <div class="container">

            <br><br><br><br>
            <div id="adminUser">
                <div id="userAddLink" class="blockLink alignCenter">
                    <i class="fas fa-user-plus"></i> Ajouter un utilisateur
                </div>
                <div id="userAdd" class="hide">
                    <i class="fas fa-times closeIcon2"></i>
                    <div class="blockTitle alignCenter" class="hide">
                        Ajouter un utilisateur
                    </div>
                    <div class="blockContent">
                        <form action="../php/userAdd.php" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        <input type="text" name="userId" id="id" class="form-control" placeholder="Identifiant" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i> </span>
                                        </div>
                                        <input type="password" name="userPassword" id="password" class="form-control" placeholder="Mots de passe" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col alignCenter">
                                    <br>
                                    <button type="submit" class="btn btn-success">Se connecter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>

                <div id="userAltLink" class="blockLink alignCenter">
                    <i class="fas fa-user-tag"></i> Modifier un utilisateur
                </div>
                <div id="userAlt" class="hide">
                    <i class="fas fa-times closeIcon2"></i>
                    <div class="blockTitle alignCenter" class="hide">
                        Modifier un utilisateur
                    </div>
                    <div class="blockContent">
                        <form action="../php/userAlt.php" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        <select name="oldId" id="oldId" class="custom-select">
                                            <option selected disabled>Identifiant</option>
                                                <?php
                                                    foreach ($users as $user) {
                                                        $id = $user['id'];
                                                ?>
                                                        <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        <input type="text" name="userId2" id="id2" class="form-control" placeholder="Nouvel identifiant" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i> </span>
                                        </div>
                                        <input type="password" name="userPassword2" id="password2" class="form-control" placeholder="Nouveau mots de passe" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col alignCenter">
                                    <br>
                                    <button type="submit" class="btn btn-success">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>

                <div id="userDelLink" class="blockLink alignCenter">
                    <i class="fas fa-user-minus"></i> Supprimer un utilisateur
                </div>
                <div id="userDel" class="hide">
                    <i class="fas fa-times closeIcon2"></i>
                    <div class="blockTitle alignCenter" class="hide">
                        Supprimer un utilisateur
                    </div>
                    <div class="blockContent">
                        <form action="../php/userDel.php" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        <select name="id3" id="id3" class="custom-select">
                                            <option selected disabled>Identifiant</option>
                                                <?php
                                                    foreach ($users2 as $user) {
                                                        $id = $user['id'];
                                                ?>
                                                        <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col alignCenter">
                                    <br>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div id="dataAddLink" class="blockLink alignCenter">
                    <i class="fas fa-plus-square"></i> Ajouter des données de consomation
                </div>
                <div id="dataAdd" class="hide">
                    <i class="fas fa-times closeIcon2"></i>
                    <div class="blockTitle alignCenter" class="hide">
                        Ajouter des données de consomation
                    </div>
                    <div class="blockContent">
                        <form action="../php/dataAdd.php" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-home"></i></span>
                                        </div>
                                        <select name="home" id="home" class="custom-select">
                                            <option selected disabled>Foyer</option>
                                                <?php
                                                    foreach ($home as $elem) {
                                                        $home = $elem['home'];
                                                ?>
                                                    <option value="<?php echo $home ?>"><?php echo $home ?></option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="date" id="date" class="form-control" placeholder="Date (JJ/MM/AAAA)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-ruler-vertical"></i></span>
                                        </div>
                                        <input type="text" name="value" id="value" class="form-control" placeholder="Valeur" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col alignCenter">
                                    <br>
                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div id="dataAltLink" class="blockLink alignCenter">
                    <i class="fas fa-cog"></i> Modifier des données de consomation à une date
                </div>
                <div id="dataAlt" class="hide">
                    <i class="fas fa-times closeIcon2"></i>
                    <div class="blockTitle alignCenter" class="hide">
                        Modifier des données de consomation à une date
                    </div>
                    <div class="blockContent">
                        <form action="../php/dataAlt.php" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-home"></i></span>
                                        </div>
                                        <select name="home2" id="home2" class="custom-select">
                                            <option selected disabled>Foyer</option>
                                                <?php
                                                    foreach ($home2 as $elem) {
                                                        $home = $elem['home'];
                                                ?>
                                                    <option value="<?php echo $home ?>"><?php echo $home ?></option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="date2" id="date2" class="form-control" placeholder="Date (JJ/MM/AAAA)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-ruler-vertical"></i></span>
                                        </div>
                                        <input type="text" name="value2" id="value2" class="form-control" placeholder="Valeur" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col alignCenter">
                                    <br>
                                    <button type="submit" class="btn btn-success">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

    
    <!-- bottom footer block -->
    <div id="footer">
        <div class="container">
            
            

        </div>
    </div>

    <?php

        } else {
            $error = "Mauvais identifiant ou mot de passe";
            header("Location: ../index.php?error=$error");
        }
    
    ?>
</body>

</html>
