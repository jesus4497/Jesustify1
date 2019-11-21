<?php
    include("controllers/functions.php");
    include ("controllers/connection.php");
    include("models/header.php");

    if(isset($_GET['page'])==false && isset($_SESSION['id'])==false){
        include("models/homeb.php");
    }

    if(isset($_GET['page'])==false && isset($_SESSION['id']) && isset($_GET['manga'])==false){
        include("models/homeb.php");
    }


    if(isset($_SESSION['id']) && isset($_GET['page']) && $_GET['page']=='home') {
        include ("models/homeb.php");
    }else if(isset($_GET['page']) && $_GET['page']=='home'){
        include("models/homeb.php");
    }

    if(isset($_GET['page']) && $_GET['page']=='mangas') {
        include("models/mangas.php");
    }

    if(isset($_GET['page']) && $_GET['page']=='profiles') {
        include("models/accountSetting.php");
    }

    if(isset($_GET['page']) && $_GET['page']=='about'){
        include("models/about.php");
    }

if(isset($_GET['page']) && $_GET['page']=='mangasFav'){
    include("models/mangasFav.php");
}

    if(isset($_GET['page']) && $_GET['page']=='adminpanel'){
        include("models/adminPanel.php");
    }


    if(isset($_GET['manga'])){
        include("models/manga.php");

    }

    include ("models/footer.php");

?>