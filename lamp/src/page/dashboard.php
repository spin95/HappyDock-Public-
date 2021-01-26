<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<?php
    $home = $_GET['home'];
    include '../database_connexion.php';
    $consumption = $bdd->query("SELECT * FROM consumption WHERE home='$home'");
    $consumption2 = $bdd->query("SELECT * FROM consumption WHERE home='$home'");
    $consumption3 = $bdd->query("SELECT * FROM consumption WHERE home='$home'");
    $date = $bdd->query("SELECT * FROM consumption WHERE home='$home'");
    $date2 = $bdd->query("SELECT * FROM consumption WHERE home='$home'");
    $info = $bdd->query("SELECT * FROM tenant WHERE home='$home'");
    $home2 = $bdd->query("SELECT * FROM home WHERE home='$home'");
?>

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript" src="../js/display_hide.js"></script>
    <script type="text/javascript" src="../js/chart.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
</head>

<body>

    <?php
        if ($_GET['home']) {
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
            </span>
        </div>
    </div>

    <div id="main">
        <div class="container">
            <br><br><br><br>
            
                <div id="dashboard">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Consommation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Logement</a>
                        </li>
                    </ul>
                    <br><br>
                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-primary">Graphique</li>
                                <li class="list-group-item">
                                    <canvas id="myChart">

                                    </canvas>
                                </li>
                            </ul>
                            <br><br><br>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-primary">Détail</li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col" style="text-align:right">
                                            <b>Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <br>
                                            <?php
                                                foreach ($date as $elem) {
                                                    $date = $elem['date'];
                                                    echo "<br>$date";
                                                }
                                            ?>
                                        </div>
                                        <div class="col">
                                            <b>Consommation</b>
                                            <br>
                                            <?php
                                                foreach ($consumption as $elem) {
                                                    $nbConsumption = $elem['consumption'];
                                                    echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$nbConsumption";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <?php
                                foreach ($info as $elem) {
                                    $firstname = $elem['firstname'];
                                    $lastname = $elem['lastname'];
                                    echo "Prénom : <b>$firstname</b><br>Nom : <b>$lastname</b>";
                                }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <?php
                                foreach ($home2 as $elem) {
                                    $home = $elem['home'];
                                    $type = $elem['type'];
                                    $area = $elem['area'];
                                    $room = $elem['room'];
                                    $heater = $elem['heater'];
                                    $creation = $elem['creation'];
                                    $nbWay = $elem['nbWay'];
                                    $way = $elem['way'];
                                    $postal = $elem['postal'];
                                    $city = $elem['city'];
                                ?>
                                <div class="row">
                                    <div class="col" style="text-align:right">
                                        Foyer :
                                    </div>
                                    <div class="col">
                                        <b><?php echo $home ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="text-align:right">
                                        Type :
                                    </div>
                                    <div class="col">
                                        <b><?php echo $type ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="text-align:right">
                                        Surface :
                                    </div>
                                    <div class="col">
                                        <b><?php echo $area ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="text-align:right">
                                        Pièces : :
                                    </div>
                                    <div class="col">
                                        <b><?php echo $room ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="text-align:right">
                                        Chauffage :
                                    </div>
                                    <div class="col">
                                        <b><?php echo $heater ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="text-align:right">
                                        Date :
                                    </div>
                                    <div class="col">
                                        <b><?php echo $creation ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="text-align:right">
                                        N° :
                                    </div>
                                    <div class="col">
                                        <b><?php echo $nbWay ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="text-align:right">
                                        Rue :
                                    </div>
                                    <div class="col">
                                        <b><?php echo $way ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="text-align:right">
                                        Code Postal :
                                    </div>
                                    <div class="col">
                                        <b><?php echo $postal ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="text-align:right">
                                        Ville :
                                    </div>
                                    <div class="col">
                                        <b><?php echo $city ?></b>
                                    </div>
                                </div>

                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <br><br><br><br><br><br>
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
            header("Location: ../index.php");
        }
    ?>
</body>

</html>


<script>

    $(document).ready(function() {

        const values = [];
        const dates = [];
        <?php
            foreach ($consumption3 as $elem) {
                $value = $elem['consumption'];
                ?>
                values.push('<?php echo $value ?>');
                <?php
            }
            foreach ($date2 as $elem) {
                $value = $elem['date'];
                ?>
                dates.push('<?php echo $value ?>')
                <?php
            }
        ?>
        


        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: dates,
                datasets: [{
                    label: 'Consommation',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: values
                }]
            },

            // Configuration options go here
            options: {}
        });

    });

</script>