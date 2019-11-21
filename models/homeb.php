<div class="jumbotron animated fadeIn fast">
    <h1 class="display-3">Read Your Favorites Mangas !</h1>
    <p class="lead">The website where you can read all the mangas you want !.</p>
    <hr class="my-4">
    <p>If you want to learn more about us just click below !.</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 car"  src="./img/ca1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Your Favorite Web Site to read Manga!</h3>
                <p>You have ton of amazing mangas !</p>
            </div>
        </div>

        <div class="carousel-item">
            <img class="d-block w-100 car" src="./img/ca2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>With a lot of genres !</h3>
                <p>Like ecchis, Shounen and more...</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 car" src="./img/ca3.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>SingUp TO KNOW MORE!</h3>
                <p>A LOT OF MANGAS ARE WAITING FOR YOU!</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>




<div class="container mang">
    <?php $query="SELECT * FROM `mangas`";
    $result=mysqli_query($link,$query);
    $maxStat=0;
    while($row=mysqli_fetch_array($result)){
        if($row['stat'] > $maxStat){
            $maxStat=$row['stat'];
        }
    }
    $query="SELECT * FROM `mangas` WHERE `stat`=$maxStat";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);





    ?>


    <div class="row">
        <h1>El manga más visitado </h1>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row['name'] ?></h4>
                <p class="card-text"><?php echo $row['description'] ?></p>
                <?php if (isset($_SESSION['id'])) { ?>
                    <a class="btn btn-outline-primary btn-block" id="contador"
                       href="?manga=<?php echo $row['id'] ?>">Read</a>
                <?php } else { ?>
                    <button type="button" class="btn btn-outline-success btn-block my-2 my-sm-0"
                            data-toggle="modal" data-target="#myModal">LogIn to know more !
                    </button>
                <?php } ?>
            </div>
            <?php $imagen = mysqli_fetch_array(mysqli_query($link, "select imagen from mangas WHERE  id = '{$row['id']}}'"));?>
            <img src="<?php echo "./img/{$imagen['imagen']}";?>" class="avatar img-circle img-thumbnail" alt="avatar">
        </div>
    </div>

</div>
