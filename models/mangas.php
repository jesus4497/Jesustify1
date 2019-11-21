<div class="container" id="mangacontenedor">
    <h1>Nuestra coleccion de mangas !</h1>
    <hr>
    <div class="row">


        <?php

        $query="SELECT * FROM `mangas` ";
        if($result  = mysqli_query($link,$query)){

            while($rowa=mysqli_fetch_array($result)){
                $query2 = "SELECT * FROM  `mangas` WHERE `id`='".mysqli_real_escape_string($link,$rowa['id']). "'";
                if ($resulti = mysqli_query($link, $query2)) {
                    $rowi = mysqli_fetch_array($resulti);
                    if($rowi['idstatus']<>2) {

                        ?>
                        <div class="col-md-4 cartas">
                            <div class="card">

                                <?php $imagen = mysqli_fetch_array(mysqli_query($link, "select imagen from mangas WHERE  id = '{$rowi['id']}}'")); ?>
                                <img src="<?php echo "./img/{$imagen['imagen']}"; ?>"
                                     class="avatar img-circle img-thumbnail" alt="avatar">

                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $rowi['name']; ?></h4>
                                    <p class="card-text"><span
                                                id="descripcionManga">Descripción: </span><?php echo $rowi['description']; ?>
                                    </p>
                                    <hr>
                                    <p class="card-text"><span>Género: </span><?php
                                        $queryk = "SELECT `name` FROM `genre` WHERE `id`='" . mysqli_real_escape_string($link, $rowi['idgenre']) . "'";
                                        $resultk = mysqli_query($link, $queryk);
                                        $rowk = mysqli_fetch_array($resultk);
                                        echo $rowk['name'];


                                        ?></p>
                                    <p class="card-text">


                                        <small class="text-muted">
                                            Autor: <?php $querya = "SELECT `name` FROM `authors` WHERE `id`='" . mysqli_real_escape_string($link, $rowi['idauthor']) . "'";
                                            $resulta = mysqli_query($link, $querya);
                                            $rowa = mysqli_fetch_array($resulta);
                                            echo $rowa['name'];
                                            ?>
                                        </small>
                                    <p></p>
                                    <small>
                                        Estatus: <?php $queryb = "SELECT `idstatus` FROM `authors` WHERE `id`='" . mysqli_real_escape_string($link, $rowi['idauthor']) . "'";
                                        $resultb = mysqli_query($link, $queryb);
                                        $rowb = mysqli_fetch_array($resultb);

                                        $queryc = "SELECT `name` FROM `status` WHERE `id`='" . mysqli_real_escape_string($link, $rowb['idstatus']) . "'";
                                        $resultc = mysqli_query($link, $queryc);
                                        $rowc = mysqli_fetch_array($resultc);
                                        echo $rowc['name'];

                                        ?>

                                    </small>
                                    </p>
                                    <?php if (isset($_SESSION['id'])) { ?>
                                        <a class="btn btn-outline-primary btn-block" id="contador"
                                           href="?manga=<?php echo $rowi['id'] ?>">Read</a>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-outline-success btn-block my-2 my-sm-0"
                                                data-toggle="modal" data-target="#myModal">LogIn to know more !
                                        </button>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>


                        <?php

                    }

                }


            }
        }







        ?>

    </div>
</div>
