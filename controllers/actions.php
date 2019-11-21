<?php
    include('functions.php');
    include('connection.php');

    if($_GET['action']=='loginSingup'){
        $error ="";
        if(!$_POST['email']){
            $error = "An email is required";
        }elseif(!$_POST['password']){
            $error = " A password is requiered";
        }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
        }

        if($error != "") {
            echo $error;
            exit();
        }

        if($_POST['loginActive']==0){
            $query="SELECT `id` FROM `users` WHERE `email`='".mysqli_real_escape_string($link,$_POST['email'])."'";
            $result = mysqli_query($link,$query);
            $row = mysqli_fetch_array($result);
            if($row > 0 ){
                $error = "The email is in use";
            }else{
                $query = "INSERT INTO `users` (`email`,`password`,`firstname`,`lastname`) VALUES('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."','".mysqli_real_escape_string($link,$_POST['firstname'])."','".mysqli_real_escape_string($link,$_POST['lastname'])."')";
                if(mysqli_query($link,$query)){
                    $_SESSION['id']=mysqli_insert_id($link);
                    //para encryptar la contraseña
                    $pass= mysqli_real_escape_string($link,$_POST['password']);
                    $hash = password_hash($pass,PASSWORD_DEFAULT);
                    $query = "UPDATE `users` SET password='$hash' WHERE id= ".mysqli_insert_id($link)." LIMIT 1";
                    mysqli_query($link,$query);
                    echo 1;



                }else{
                    $error="There was a problem please try again later";
                }
            }
            if($error != "") {
                echo $error;
                exit();
            }


        }else{
            $query="SELECT `id` FROM `users` WHERE `email`='".mysqli_real_escape_string($link,$_POST['email'])."'";
            $result=mysqli_query($link,$query);
            $row = mysqli_fetch_array($result);
            if($row>0){
                $id=$row['id'];
                $query="SELECT `password` FROM `users` WHERE `id` = '$id' LIMIT 1";
                $result=mysqli_query($link,$query);
                $row=mysqli_fetch_array($result);
                if (password_verify($_POST['password'],$row['password'])) {
                    echo 1;
                    $_SESSION['id']=$id;
                } else {
                    echo 'Invalid password.';
                }

            }else{
                $error = 'Could not find that email, please try again later';
                echo $error;
            }

        }




    }

if($_GET['action'] == 'updateAccount') {
    global $link;
    if($_POST['password']!= "") {
        $pass = mysqli_real_escape_string($link, $_POST['password']);
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $query = "UPDATE `users` SET email='" . $_POST['email'] . "', firstname='" . $_POST['firstname'] . "', lastname='" . $_POST['lastname'] . "',   password='$hash' WHERE id='" . $_SESSION['id'] . "'";
    }else{
        $query = "UPDATE `users` SET email='" . $_POST['email'] . "', firstname='" . $_POST['firstname'] . "', lastname='" . $_POST['lastname'] . "' WHERE id='" . $_SESSION['id'] . "'";
    }
    if(mysqli_query($link, $query)) {
        echo "1";
    }
    else {
        die('Unable to update record: ' .mysqli_error($link));
    }
}


if($_GET['action']=='addAuthor'){
    global $link;
    if($_POST['completename']==""){
        echo "Por favor Ingrese el nombre del autor";
    }else {
        $query="SELECT `id` FROM `status` WHERE `name`='".mysqli_real_escape_string($link,$_POST['status'])."' LIMIT 1";
        $result = mysqli_query($link,$query);
        $row = mysqli_fetch_array($result);
        $estatus = $row['id'];

        $query = "INSERT INTO `authors` (`name`,`idstatus`) VALUES ('" . mysqli_real_escape_string($link, $_POST['completename']) . "', '".mysqli_real_escape_string($link,$estatus)."' )";
        if (mysqli_query($link, $query)) {
            echo "1";
        } else {
            echo "Unable to add author";
        }
    }
}

if($_GET['action']=='actAuthor'){
     global $link;
     if($_POST['newAuthorName']==""){
         echo "Por favor ingrese un autor";
     }else{
         $query="SELECT `id` FROM `status` WHERE `name`='".mysqli_real_escape_string($link,$_POST['newAuthorStatus'])."' LIMIT 1";
         $result=mysqli_query($link,$query);
         $row=mysqli_fetch_array($result);
         $newStatus=$row['id'];

         $query="UPDATE `authors` SET `idstatus`='".mysqli_real_escape_string($link,$newStatus)."' WHERE `name` = '".mysqli_real_escape_string($link,$_POST['newAuthorName'])."'  LIMIT 1";
         if(mysqli_query($link,$query)){
             echo "1";
         }else{
             echo "Unable to update author";
         }

     }
}


if($_GET['action']=='actManga'){
    if($_POST['newMangaName']==""){
        echo "Por favor ingrese un manga";
    }else{
        global $link;
        $query="SELECT `id` FROM `status` WHERE `name`='".mysqli_real_escape_string($link,$_POST['newStatusManga'])."'";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        $newStatusManga=$row['id'];

        $query="UPDATE `mangas` SET `idstatus`='".mysqli_real_escape_string($link,$newStatusManga)."' WHERE `name`='".mysqli_real_escape_string($link,$_POST['newMangaName'])."'";
        if(mysqli_query($link,$query)){
            echo "1";
        }else{
            echo "Unable to update manga";
        }
    }
}


if($_GET['action']=='actUser'){
    global $link;
    if($_POST['newUser']==""){
        echo "Por favor seleccione un usuario";
    }else{
        $query="SELECT `id` FROM `userstype` WHERE `name`='".mysqli_real_escape_string($link,$_POST['newRol'])."'";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        $newRol=$row['id'];

        $query="UPDATE `users` SET `idusertype`='".mysqli_real_escape_string($link,$newRol)."' WHERE `email`='".mysqli_real_escape_string($link,$_POST['newUser'])."' ";
        if(mysqli_query($link,$query)){
            echo "1";
        }else{
            echo "Unable to update user";
        }
    }


}


if($_GET['action']=='addgenre'){
    if($_POST['genreName'] == ""){
        echo "Please enter a genre";
    }else{
        global $link;
        $query="SELECT `id` FROM `genre` WHERE `name`='".mysqli_real_escape_string($link,$_POST['genreName'])."'";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        if($row > 0){
            echo "The genre is already added";

        }else{
            $query="INSERT INTO `genre` (`name`) VALUES('".mysqli_real_escape_string($link,$_POST['genreName'])."')";
            if(mysqli_query($link,$query)){
                echo "1";
            }else{
                echo "unable to add genre";
            }
        }

    }
}

if($_GET['action']=='addCap'){
    if($_POST['charapterName']==""){
        echo "introduzca el nombre del capitulo";
    }else if($_POST['elmanga']==""){
        echo "Seleccione un manga";
    }else{
        global $link;
        $query="SELECT `id` FROM `chapters` WHERE `name`='".mysqli_real_escape_string($link,$_POST['charapterName'])."'";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        if($row > 0 ){
            echo "El capitulo ya ha sido agregado";
        }else{
            $query="INSERT INTO `chapters` (`idmanga`,`name`) VALUES('".mysqli_real_escape_string($link,$_POST['elmanga'])."','".mysqli_real_escape_string($link,$_POST['charapterName'])."')";
            if(mysqli_query($link,$query)){
                echo "1";
            }else{
                echo "unable to add manga";
            }
        }
    }
}






if($_GET['action']=='addManga') {

    if (($_POST['manganame'] || $_POST['descripcionManga']) == "") {
        echo "Please complete all the fields";
    } else {
        global $link;
        $query = "SELECT `id` FROM `mangas` WHERE `name`='" . mysqli_real_escape_string($link, $_POST['manganame']) . "'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        if ($row > 0) {
            echo "The manga is already added";
        } else {
            if ($_POST['autorManga'] < 0) {
                echo "Por favor seleccione un autor";
            } else {
                $idauthor = $_POST['autorManga'];
                $idstatusmanga1=1;

                $query = "INSERT INTO `mangas` (`name`,`description`,`idauthor`,`idgenre`,`idstatus`)  VALUES ('" . mysqli_real_escape_string($link, $_POST['manganame']) . "','" . mysqli_real_escape_string($link, $_POST['descripcionManga']) . "','".mysqli_real_escape_string($link,$idauthor)."','".mysqli_real_escape_string($link,$_POST['generoManga'])."', '".mysqli_real_escape_string($link,$idstatusmanga1)."')";

                if (mysqli_query($link, $query)) {
                    if(isset($_FILES["file"]["type"]))
                    {
                        $validextensions = array("jpeg", "jpg", "png");
                        $temporary = explode(".", $_FILES["file"]["name"]);
                        $file_extension = end($temporary);
                        if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
                            ) && ($_FILES["file"]["size"] < 10000000)//Approx. 10Mb files can be uploaded.
                            && in_array($file_extension, $validextensions)) {
                            if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
                            }
                            else
                            {
                                if (file_exists("upload/" . $_FILES["file"]["name"])) {
                                    echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                                }
                                else
                                {
                                    $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                                    $targetPath = "../img/".$_FILES['file']['name']; // Target path where file is to be stored
                                    move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                                    echo "<span id='success'>Manga Agregado correctamente...!!</span><br/>";
                                    $query="SELECT `id` FROM `mangas` WHERE `name`='".mysqli_real_escape_string($link,$_POST['manganame'])."'";
                                    $result=mysqli_query($link,$query);
                                    $row=mysqli_fetch_array($result);
                                    echo $row['id'];
                                    $query="UPDATE mangas SET imagen='".mysqli_real_escape_string($link,$_FILES["file"]["name"])."' WHERE `id`='".mysqli_real_escape_string($link,$row['id'])."'";
                                    if(mysqli_query($link,$query)){
                                        echo "<span id='success'>Manga!</span><br/>";
                                    }
                                }
                            }

                        }
                        else
                        {
                            echo "<span id='invalid'>Invalid file Size or Type<span>";
                        }

                    }

                } else {
                    echo "<span id='invalid'>Dick<span>";

                }

            }
        }
    }



}


if($_GET['action']=='favManga'){

    if($_POST['favType']==2){
        $query="SELECT `id` FROM `mangas` WHERE `name`='".mysqli_real_escape_string($link,$_POST['mangaFav'])."'";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        $idFav=$row['id'];

        $query="INSERT INTO `mangasfav` (`idmanga`,`iduser`) VALUES('".mysqli_real_escape_string($link,$idFav)."','".mysqli_real_escape_string($link,$_SESSION['id'])."')";
        if(mysqli_query($link,$query)){
            echo "1";
        }else{
            echo "Imposible agregar a favoritos";
        }

    }else{
        $query="SELECT `id` FROM `mangas` WHERE `name`='".mysqli_real_escape_string($link,$_POST['mangaFav'])."'";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        $idFav=$row['id'];

        $query="SELECT `id` FROM `mangasfav` WHERE (`idmanga`='".mysqli_real_escape_string($link,$idFav)."' AND `iduser`='".mysqli_real_escape_string($link,$_SESSION['id'])."')";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        $idFavDel=$row['id'];

        $query="DELETE FROM `mangasfav` WHERE `id` ='".mysqli_real_escape_string($link,$idFavDel)."' ";
        if(mysqli_query($link,$query)){
            echo "1";
        }else{
            echo "Imposible quitar de favoritos";
        }
    }

}




