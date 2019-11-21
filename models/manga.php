<?php
$query="SELECT * FROM `mangas` WHERE `id`='".mysqli_real_escape_string($link,$_GET['manga'])."'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
$id=$row['id'];

$query="UPDATE `mangas` SET `stat`=stat+1 WHERE `id`='".mysqli_real_escape_string($link,$id)."' ";
mysqli_query($link,$query);


?>



<div class="container mang">
    <div class="card mb-3">
        <?php $imagen = mysqli_fetch_array(mysqli_query($link, "select imagen from mangas WHERE  id = '{$row['id']}}'"));?>
        <img src="<?php echo "./img/{$imagen['imagen']}";?>" class="avatar img-circle img-thumbnail" alt="avatar">
      <div class="card-body">
          <h1 class="card-title" id="favManga"><?php echo $row['name']; ?></h1>
        <p class="card-text"><?php echo $row['description']; ?></p>
          <h4>Capitulos:</h4>
          <ul class="list-group list-group-flush">
              <?php $query="SELECT * FROM `chapters` WHERE `idmanga`='".mysqli_real_escape_string($link,$_GET['manga'])."'";
                    $result=mysqli_query($link,$query);
                    while($row=mysqli_fetch_array($result)){
              ?>
                        <li class="list-group-item"><?php echo $row['name']; ?> <a href="mangaDownload.php?file=manga.txt" class="btn btn-outline-primary my-2 my-sm-0 descargar">Descargar</a></li>
                  <?php  }?>


          </ul>
          <p></p>
        <p class="card-text"><small class="text-muted">Proximamente mas capitulos!</small></p>
          <?php $query="SELECT `id` FROM `mangasfav` WHERE(`idmanga`='".mysqli_real_escape_string($link,$id)."' AND `iduser`='".mysqli_real_escape_string($link,$_SESSION['id'])."') ";
                $result=mysqli_query($link,$query);
                $row=mysqli_fetch_array($result);
                if($row['id'] > 0){
                    ?>
                    <input type="hidden" id="favActive" name="favActive" value="2">
                    <button type="submit" class="btn btn-danger" id="fav">Quitar de favoritos!</button>
          <?php
                }else{?>
                    <input type="hidden" id="favActive" name="favActive" value="1">
                    <button type="submit" class="btn btn-primary" id="fav">Agregar a tus favoritos!</button>

              <?php  }



          ?>




      </div>
    </div>
</div>
