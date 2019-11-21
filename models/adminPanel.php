<div class="container">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Agregar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Actualizar</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="backup-tab" data-toggle="tab" href="#backup" role="tab" aria-controls="backup">Backup</a>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


            <div class="row">
                <div class="col-md-4">
                    <div class="alert alert-danger hidden" role="alert" id="addAlert0"></div>
                    <h2>Agrega un nuevo Genero</h2>
                    <form>
                        <div class="form-group">
                            <label for="genre">Nombre del genero</label>
                            <input  class="form-control" id="genre" placeholder="Ingrese un genero">
                        </div>
                        <button type="submit" id="addgenre" class="btn btn-primary">Agregar Genero</button>
                    </form>

                </div>







                <div class="col-md-4">
                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <h2>Agrega un nuevo Autor</h2>
                            <div class="box-content">
                                <div class="alert alert-danger hidden" role="alert" id="addAlert"></div>
                                <form class="form-horizontal" role="form">
                                    <fieldset>
                                        <div class="control-group">
                                            <label class="control-label" for="focusedInput">Nombre Completo:</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="autorname" type="text" placeholder="Nombre">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="focusedInput">Status:</label>
                                            <div class="form-group">
                                                <label for="autorstatus">Seleccion el status actual del autor</label>
                                                <select class="form-control" id="autorstatus">
                                                    <option><?php
                                                        $query="SELECT `name` FROM `status` WHERE id='1'";
                                                        $result= mysqli_query($link,$query);
                                                        $row = mysqli_fetch_assoc($result);
                                                        echo $row['name'];
                                                        ?></option>
                                                    <option><?php
                                                        $query="SELECT `name` FROM `status` WHERE id='2'";
                                                        $result= mysqli_query($link,$query);
                                                        $row = mysqli_fetch_assoc($result);
                                                        echo $row['name'];?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" id="addAuthor" class="btn btn-primary">Agregar Autor</button>
                                        </div>

                                </form>

                            </div>
                        </div><!--/span-->

                    </div><!--/row-->

                </div>

                <div class="col-md-4">
                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <h2>Agrega un nuevo Manga</h2>
                            <div class="box-content">
                                <div class="alert alert-danger hidden" role="alert" id="addAlert1"></div>

                                <form class="form-horizontal" id="uploadimage" action="" method="post" enctype="multipart/form-data">
                                    <div id="image_preview"><img id="previewing" src="noimage.png" /></div>
                                    <hr id="line">
                                    <div id="selectImage">
                                        <label>Selecciona una imagen.</label><br/>
                                        <input type="file" name="file" id="file" required />

                                    </div>

                                <h4 id='loading' >cargando..</h4>
                                <div id="message"></div>
                                    <fieldset>
                                        <div class="control-group">
                                            <label class="control-label" for="manganame">Nombre Del Manga:</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused"  name="manganame" type="text" placeholder="Nombre">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="focusedInput">Descripcion:</label>
                                            <textarea class="form-control" name="descripcionManga" rows="3"></textarea>
                                        </div>
                                        <div class="control-group">
                                            <div class="form-group">
                                                <label for="autormanga">Selecciona un Genero:</label>
                                                <small  class="form-text text-muted">Si su genero no esta en las opciones, por favor agregelo.</small>
                                                <select class="form-control" name="generoManga">
                                                    <option selected>Escoge Un Genero</option>
                                                    <?php $generos = mysqli_query($link, "SELECT `id`,`name` FROM `genre`  order by name asc ");
                                                    foreach ($generos as $genero) {
                                                        echo "<option value='{$genero['id']}'>{$genero['name']}</option>";
                                                    }
                                                    unset($ageneros);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="control-group">
                                            <div class="form-group">
                                                <label for="autormanga">Selecciona un autor:</label>
                                                <small  class="form-text text-muted">Si su autor no esta en las opciones, por favor agregelo.</small>
                                                <select class="form-control" name="autorManga">
                                                    <option selected>Escoge Un Autor</option>
                                                    <?php $autores = mysqli_query($link, "SELECT `id`,`name`,`idstatus` FROM `authors`  order by name asc ");
                                                    foreach ($autores as $autor) {
                                                        echo "<option value='{$autor['id']}'>{$autor['name']}</option>";
                                                    }
                                                    unset($autores);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>




                                        <div class="form-actions">
                                            <input type="submit" value="Agregar Manga" class="submit btn btn-primary"  />
                                        </div>
                                    </fieldset>
                                </form>

                            </div>
                        </div><!--/span-->

                    </div><!--/row-->
                </div>


                <div class="col-md-4">
                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <h2>Agregar un capitulo</h2>
                            <div class="box-content">
                                <div class="alert alert-danger hidden" role="alert" id="addAlert4"></div>
                                <form class="form-horizontal" role="form">
                                    <div class="control-group">
                                        <label class="control-label" for="focusedInput">Capitulo:</label>
                                        <div class="form-group">
                                            <label class="control-label" for="capituloname">Nombre Del Capitulo:</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused"  id="capituloname" type="text" placeholder="Nombre">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="selectManga">Selecciona El Manga:</label>
                                        <small  class="form-text text-muted">Si su manga no esta en las opciones, por favor agregelo.</small>
                                        <select class="form-control" id="selectManga">
                                            <option selected>Escoge Un Manga</option>
                                            <?php $mangas = mysqli_query($link, "SELECT `id`,`name` FROM `mangas`  order by name asc ");
                                            foreach ($mangas as $manga) {
                                                echo "<option value='{$manga['id']}'>{$manga['name']}</option>";
                                            }
                                            unset($autores);
                                            ?>
                                        </select>
                                    </div>
                            </div>
                            <p></p>

                            <div class="form-actions">
                                <button type="submit" id="addCap" class="btn btn-primary">Agreagar capitulo</button>
                            </div>

                            </form>

                        </div>
                    </div><!--/span-->

                </div><!--/row-->

            </div>





        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <div class="row">


                <div class="col-md-4">
                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <h2>Actualiza un Autor</h2>
                            <div class="box-content">
                                <div class="alert alert-danger hidden" role="alert" id="addAlert2"></div>
                                <form class="form-horizontal" role="form">
                                    <div class="control-group">
                                        <label class="control-label" for="focusedInput">Status:</label>
                                        <div class="form-group">
                                            <label for="autorstatus">Actualice el status actual del autor</label>
                                            <select class="form-control" id="newAuthorStatus">
                                                <option><?php
                                                    $query="SELECT `name` FROM `status` WHERE id='1'";
                                                    $result= mysqli_query($link,$query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['name'];
                                                    ?></option>
                                                <option><?php
                                                    $query="SELECT `name` FROM `status` WHERE id='2'";
                                                    $result= mysqli_query($link,$query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['name'];?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="autormanga">Selecciona un autor:</label>
                                        <small  class="form-text text-muted">Si su autor no esta en las opciones, por favor agregelo.</small>
                                        <select class="form-control" id="autorMangaAct">
                                            <option selected>Escoge Un Autor</option>
                                            <?php $autores = mysqli_query($link, "SELECT `id`,`name`,`idstatus` FROM `authors`  order by name asc ");
                                            foreach ($autores as $autor) {
                                                echo "<option value='{$autor['name']}'>{$autor['name']}</option>";
                                            }
                                            unset($autores);
                                            ?>
                                        </select>
                                    </div>
                            </div>
                            <p></p>

                            <div class="form-actions">
                                <button type="submit" id="actAuthor" class="btn btn-primary">Actualizar Autor</button>
                            </div>

                            </form>

                        </div>
                    </div><!--/span-->

                </div><!--/row-->


                <div class="col-md-4">
                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <h2>Actualiza un Usuario</h2>
                            <div class="box-content">
                                <div class="alert alert-danger hidden" role="alert" id="addAlert3"></div>
                                <form class="form-horizontal" role="form">
                                    <div class="control-group">
                                        <label class="control-label" for="focusedInput">Poder:</label>
                                        <div class="form-group">
                                            <label for="autorstatus">Actualice el poder actual del usuario</label>
                                            <select class="form-control" id="newTypeUser">
                                                <option><?php
                                                    $query="SELECT `name` FROM `userstype` WHERE id='1'";
                                                    $result= mysqli_query($link,$query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['name'];
                                                    ?></option>
                                                <option><?php
                                                    $query="SELECT `name` FROM `userstype` WHERE id='2'";
                                                    $result= mysqli_query($link,$query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['name'];?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="autormanga">Selecciona un Usuario:</label>
                                        <small  class="form-text text-muted">Si su usuario no esta en las opciones, por favor contactelo.</small>
                                        <select class="form-control" id="userAct">
                                            <option selected>Escoge Un Usuario</option>
                                            <?php $usuarios = mysqli_query($link, "SELECT `id`,`email`,`idusertype` FROM `users`  order by email asc ");
                                            foreach ($usuarios as $usuario) {
                                                echo "<option value='{$usuario['email']}'>{$usuario['email']}</option>";
                                            }
                                            unset($autores);
                                            ?>
                                        </select>
                                    </div>
                            </div>
                            <p></p>

                            <div class="form-actions">
                                <button type="submit" id="actUser" class="btn btn-primary">Actualizar Usuario</button>
                            </div>

                            </form>

                        </div>
                    </div><!--/span-->

                </div><!--/row-->


                <div class="col-md-4">
                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <h2>Actualiza un Manga</h2>
                            <div class="box-content">
                                <div class="alert alert-danger hidden" role="alert" id="addAlert5"></div>
                                <form class="form-horizontal" role="form">
                                    <div class="control-group">
                                        <label class="control-label" for="focusedInput">status:</label>
                                        <div class="form-group">
                                            <label for="newMangaStatus">Actualice el status actual del manga</label>

                                            <small  class="form-text text-muted">Si el manga se coloca en inactivo el manga no se monstrara.</small>
                                            <select class="form-control" id="newMangaStatus">
                                                <option><?php
                                                    $query="SELECT `name` FROM `status` WHERE id='1'";
                                                    $result= mysqli_query($link,$query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['name'];
                                                    ?></option>
                                                <option><?php
                                                    $query="SELECT `name` FROM `status` WHERE id='2'";
                                                    $result= mysqli_query($link,$query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['name'];?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="selectManga2">Selecciona un Manga:</label>
                                        <small  class="form-text text-muted">Si su manga no esta en las opciones, por favor agreguelo.</small>
                                        <select class="form-control" id="selectManga2">
                                            <option selected>Escoge Un Manga</option>
                                            <?php $mangas = mysqli_query($link, "SELECT `id`,`name`,`idstatus` FROM `mangas`  order by name asc ");
                                            foreach ($mangas as $manga) {
                                                echo "<option value='{$manga['name']}'>{$manga['name']}</option>";
                                            }
                                            unset($autores);
                                            ?>
                                        </select>
                                    </div>
                            </div>
                            <p></p>

                            <div class="form-actions">
                                <button type="submit" id="actManga" class="btn btn-primary">Actualizar Manga</button>
                            </div>

                            </form>

                        </div>
                    </div><!--/span-->

                </div><!--/row-->




        </div>







    </div>



        <div class="tab-pane fade" id="backup" role="tabpanel" aria-labelledby="backup-tab">

            <div class="row">

                <div class="col-md-4">
                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <div class="box-header" data-original-title>
                                <h2><i class="halflings-icon white user"></i><span class="break"></span>Back up de la base de datos</h2>
                            </div>
                            <div class="box-content">
                                <form method="post" action="download.php">
                                    <table>
                                        <tr>
                                            <td>Base de datos: mangafy</td>
                                            <td>
                                                <select name="table">
                                                    <option selected>mangafy</option>
                                                    <?php $tables = mysqli_query($link, "select table_name from information_schema.tables WHERE table_schema = 'mangafy'");
                                                    foreach ($tables as $table) {
                                                        echo "<option>{$table['table_name']}</option>";
                                                    }
                                                    unset($tables);
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input type='submit' name="backup" value="Backup"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div><!--/span-->

                    </div><!--/row-->

                </div>
            </div>







        </div>















            </div>













</div>



<?php
if(isset($_POST['addManga'])) {
    $image = addslashes(($_FILES['image']['tmp_name']));
    $image_name = $_FILES['image']['name'];
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    if ($image_size == false) {
        echo "Esa imagen no esta permitida";
    } else {
        if ($insert = mysqli_query($link, "INSERT INTO `images` (`name`,`image`) VALUES ('$image_name','$image')")) {
            echo "Imagen subida !";
        } else {
            echo "Hubo un error";
        }
    }

}

   ?>
