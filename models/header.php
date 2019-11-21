<html>
<head>
    <title>Mangafy</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Para llamar a bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css.map">
    <link href="jquery-ui/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <!-- jQuery first, then Tether, then Bootstrap JS. esto es importante ya que si no esta en este orden no correra bien -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="jquery-ui/jquery-ui.js"></script>
    <script src="js/tether.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>



</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="http://localhost/jesustify/index.php">Mangafy</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?page=home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <?php if(ISSET($_SESSION['id'])){ ?>
                <a class="nav-link" href="?page=profiles">Your Profile</a>
                <?php } ?>
            </li>

            <li class="nav-item">
                <?php if(ISSET($_SESSION['id'])){ ?>
                    <a class="nav-link" href="?page=mangasFav">Favorites Mangas</a>
                <?php } ?>
            </li>

            <li class="nav-item">
                 <a class="nav-link" href="?page=about">About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=mangas">Mangas</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <?php if(ISSET($_SESSION['id'])){ ?>
                <a href="?function=logout" class="btn btn-outline-success my-2 my-sm-0">LogOut</a>
            <?php

                $query = "SELECT `idusertype` FROM `users` WHERE id= '".mysqli_real_escape_string($link,$_SESSION['id'])."'";
                $result = mysqli_query($link,$query);
                $row = mysqli_fetch_array($result);
                if($row['idusertype']==1){?>
                    <a href="?page=adminpanel" class="btn btn-outline-primary my-2 my-sm-0" id="adminbtn">Admin Panel</a>
               <?php }

            }else{ ?>
            <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#myModal">Login/Sign Up</button>
            <?php }?>

        </div>
    </div>
</nav>

