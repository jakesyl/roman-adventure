<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Go On an Adventure in Rome">
    <meta name="author" content="Zach Panzarino">
    <title>Roman Adventure</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="img/icon.png">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="/"  onclick = $("#menu-close").click(); >Roman Adventure</a>
            </li>
            <li>
                <a href="/" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="start.php" onclick = $("#menu-close").click(); >Restart</a>
            </li>
        </ul>
    </nav>
    <header id="top" class="header" style="background: url(img/merchant.jpg) no-repeat center center scroll;-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;-o-background-size: cover;">
        <div class="text-vertical-center">
            <img src="img/vase.png" height="100px" width="100px"><br><br>
            <?php
            $name = $_GET['name'];
            $ship = $_GET['ship'];
            $trips = $_GET['trips'];
            $chances = $_GET['odds'];
            $money = $_GET['money'];
            $money = intval($money);
            if ($chances==="high"){
                $odds = rand(1,4);
                $money+=8;
            }
            if ($chances==="medium"){
                $odds = rand(1,5);
                $money+=5;
            }
            if ($chances==="low"){
                $odds = rand(1,7);
                $money+=2;
            }
            if ($odds<=2){
                echo "<p style='font-size:20px'><mark>Pirates attack the ".$ship."!<br>A pirate grabs you and ties you up.<br>\"".$name.", give me all your money\" says the pirate.<br><br>Do you give him the money?</mark></p>";
            echo '<form class="form-inline" action="merchantpirateyes.php" method="get">';
            echo '<input type="hidden" name="name" value="'.$name.'">';
            echo '<button type="submit" class="btn btn-default">Yes</button></form><br>';
            echo '<form class="form-inline" action="merchantpirateno.php" method="get">';
            echo '<input type="hidden" name="name" value="'.$name.'">';
            echo '<button type="submit" class="btn btn-default">No</button></form><br>';
            }
            else{
                echo "<p style='font-size:20px'><mark>No pirates attack you and you make a profit</mark></p>";
                echo '<form class="form-inline" action="merchant2.php" method="get">';
            echo '<input type="hidden" name="name" value="'.$name.'">';
            echo '<input type="hidden" name="ship" value="'.$ship.'">';
            echo '<input type="hidden" name="trips" value="'.$trips.'">';
            echo '<input type="hidden" name="money" value="'.$money.'">';
            echo '<button type="submit" class="btn btn-default">Return Home</button></form><br>';
            }
            ?>
            <br>
        </div>
    </header>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
</body>
</html>