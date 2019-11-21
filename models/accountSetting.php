<?php
        $query="SELECT * FROM users where id='{$_SESSION['id']}'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);


    ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 profileEdit">
            <form class="form-horizontal" role="form">
                <div class="alert alert-danger" role="alert" id="loginAlert"></div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" id="txtfirstname" placeholder="First name" type="text" value="<?php echo $row['firstname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" id="txtlastname" placeholder="Last name" type="text" value="<?php echo $row['lastname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" id="txtemail" placeholder="Email" type="email" value="<?php echo $row['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Change Password:</label>
                    <div class="col-md-8">
                        <input class="form-control" id="txtpassword" placeholder="********************" type="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <button class="btn btn-primary" id="updateAccount" value="Save Changes">Save Changes</button>
                        <span></span>
                        <input class="btn btn-danger"  value="Cancel" type="reset">
                    </div>
                </div>
            </form>


        </div>

        <div class="col-md-6 profileEdit">
                <div class="text-center">
                    <?php $avatar = mysqli_fetch_array(mysqli_query($link, "select avatar from users WHERE  id = '{$_SESSION['id']}'"));?>
                    <img src="<?php echo (empty($avatar['avatar']) ? "img/avatar.png" : "{$_SESSION['id']}/img/{$avatar['avatar']}");?>" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h4 style="text-align: center"><?php echo $row['firstname']; ?></h4>
                    <h6>Sube una foto de perfil...</h6>
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" class="text-center center-block well well-sm" name="avatar">
                        <button type="submit" name="set_avatar" class="btn btn-primary">Subir Imagen</button>
                    </form>
                </div>
        </div>


    </div>

</div>

<?php


if(isset($_POST['set_avatar'])){
    $avatar = mysqli_fetch_array(mysqli_query($link, "select avatar from users where id = '{$_SESSION['id']}'"));

    if(empty($avatar['avatar'])) {
        mkdir("".$_SESSION['id'],0777);
        mkdir("{$_SESSION['id']}/img",0777);
    }
    else {
        unlink("{$_SESSION['id']}/img/{$avatar['avatar']}");
    }

    $avatartemp = $_FILES['avatar']['tmp_name'];
    $avatarname = $_FILES['avatar']['name'];
    $ext = pathinfo($avatarname,PATHINFO_EXTENSION);
    $avatarname = "avatar." . $ext;
    if(mysqli_query($link, "update users set avatar = '$avatarname' where id = '{$_SESSION['id']}'"))
    {
        $oldmask = umask(0);
        move_uploaded_file($avatartemp, "{$_SESSION['id']}/img/$avatarname");
        umask($oldmask);
    }
}
?>