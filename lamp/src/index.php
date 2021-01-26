<html lang="fr">

<!-- En tete de la page -->

<head>

    <meta http-equiv="content-type" content="text/html charset=utf-8" />
    <meta name="description" content="Design For Green experience">
    <meta name="keywords" content="design;green;comsuption;energy">
    <meta name="author" content="Team 8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Design4Green</title>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/display_hide.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

    <!-- Header de la page -->
    <div id="header" class="row">

        <?php if (isset($_GET['success'])) { ?>
            <div id="success" style="text-align:center"><i class="fas fa-check-circle"></i> <?php echo $_GET['success'] ?> <i class="fas fa-check-circle"></i></div>
        <?php } else if (isset($_GET['error'])) { ?>
            <div id="error" style="text-align:center"><i class="fas fa-exclamation-circle"></i> <?php echo $_GET['error'] ?> <i class="fas fa-exclamation-circle"></i></div>
        <?php } ?>

        <div class="col-sm-4">
            <img src="img/logo.png" id="headerLogo" width="300px" />
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
            <div id="signIn">
                <div class="title">
                    Se connecter
                </div>
                <br><br>
                <form action="php/formSignIn.php" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-user-tag"></i></span>
                                </div>
                                <input type="text" name="id" id="id" class="form-control" placeholder="Identifiant" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i id="passwordVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col alignCenter">
                            <br>
                            <button type="submit" class="btn btn-success">Voir ma consommation</button>
                        </div>
                    </div>
                </form>
                <br><br>
            </div>

        </div>
    </div>


    <!-- bottom footer block -->
    <div id="footer">
        <div class="container">

            <div class="col alignCenter">
                <span id="adminLink">Se connecter</span>
            </div>
            <div id="admin" class="hide">
                <i class="fas fa-times closeIcon"></i>
                <br><br>
                <form action="page/admin.php" method="POST">
                    Connexion Administrateur
                    <br><br>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i id="idVerified" class="fas fa-check-circle verified hide"></i><i class="fas fa-user-tag"></i></span>
                                </div>
                                <input type="text" name="adminId" id="adminId" class="form-control" placeholder="Identifiant" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i> </span>
                                </div>
                                <input type="password" name="adminPassword" id="adminPassword" class="form-control" placeholder="Mots de passe" required>
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
    </div>
</body>

</html>