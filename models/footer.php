<footer class="footer">
    <div class="container">
        <p>&copy; Hecho por: Jesús Padrón</p>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalTitle">Login.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="loginAlert"></div>
                <form>
                    <input type="hidden" id="loginActive" name="loginActive" value="1">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                    </div>
                    <div class="form-group divHide">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Your Name">
                    </div>
                    <div class="form-group divHide">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Your Last Name">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p id="suiche"><a href="#" id="toggleLogIn"  >Sign Up</a></p>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="loginSingup" type="submit">Login.</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.divHide').hide();

    $('#toggleLogIn').click(function(){
        if($('#loginActive').val()==1){
            $('#loginActive').val('0');
            $('#loginModalTitle').html('Sing Up.');
            $('#loginSingup').html('Sing Up');
            $('#toggleLogIn').html('Login');
            $('.divHide').show();
        } else{
            $('#loginActive').val('1');
            $('#loginModalTitle').html('Login.');
            $('#loginSingup').html('Login');
            $('#toggleLogIn').html('Sing Up');
            $('.divHide').hide();
        }

    });

    $('#loginAlert').hide();

    $('#loginSingup').click(function(){
       $.ajax({
           type: 'POST',
           url:'controllers/actions.php?action=loginSingup',
           data:'email='+$('#email').val() + '&password='+$('#password').val()+"&loginActive="+$('#loginActive').val()+ '&firstname='+$('#firstName').val()+'&lastname='+$('#lastName').val(),
           success: function(result){
               if(result=='1'){
                    window.location.assign("http://localhost/jesustify/index.php");
               }else{
                   $('#loginAlert').html(result).show();
               }
           }
       })
    });


   $('#fav').click(function(){
       if($('#favActive').val()==1){

           $('#fav').html('Quitar de favoritos');
           $('#favActive').val('2');
           $('#fav').attr('class','btn btn-danger');
       } else{
           $('#fav').html('Agregar a tus favoritos!');
           $('#favActive').val('1');
           $('#fav').attr('class','btn btn-primary');


       }



        $.ajax({
            type:'POST',
            url: 'controllers/actions.php?action=favManga',
            data:'favType='+$('#favActive').val() + '&mangaFav='+$('#favManga').html(),
            success: function(result){
                if(result=='1'){
                    alert('Agregado/Quitado En tus favoritos !');
                }else{
                    alert (result);
                }
            }




        })


    });




    $('#updateAccount').click(function(){
       $.ajax({
           type: 'POST',
           url: 'controllers/actions.php?action=updateAccount',
           data: 'firstname='+$('#txtfirstname').val() + '&lastname=' + $('#txtlastname').val() + '&email=' + $('#txtemail').val() + '&password=' + $('#txtpassword').val(),
           success:function(result){
              if(result=='1'){
                  window.location.assign("http://localhost/jesustify/index.php?page=profiles");
              }else{
                  $('#loginAlert').html(result).show();
              }
             }




       })


    });

    $('#addgenre').click(function(){
       $.ajax({
          type:'POST',
           url:'controllers/actions.php?action=addgenre',
           data:'genreName=' +$('#genre').val(),
           success: function(result){
              if(result=='1'){
                  window.location.assign("http://localhost/jesustify/index.php?page=adminpanel");
              }else{
                  $('#addAlert0').html(result).show();

              }
           }


       })



    });

   $('#addAuthor').click(function(){
       $.ajax({
           type: 'POST',
           url: 'controllers/actions.php?action=addAuthor',
           data: 'completename='+$('#autorname').val() + '&status=' + $('#autorstatus').val(),
           success: function(result) {
               if (result == '1') {
                   window.location.assign("http://localhost/jesustify/index.php?page=adminpanel");

               } else {
                   $('#addAlert').html(result).show();
               }

           }
       })

    });

   $('#actAuthor').click(function(){
      $.ajax({
        type:'POST',
        url: 'controllers/actions.php?action=actAuthor',
        data:'newAuthorName='+$('#autorMangaAct').val()+'&newAuthorStatus='+$('#newAuthorStatus').val(),
        success: function(result){
            if(result=='1') {
                window.location.assign("http://localhost/jesustify/index.php?page=adminpanel");
            }else{
                $('#addAlert2').html(result).show();
            }
        }

      })



   });

   $('#actManga').click(function(){
      $.ajax({
          type: 'POST',
          url: 'controllers/actions.php?action=actManga',
          data: 'newMangaName='+$('#selectManga2').val()+ '&newStatusManga='+$('#newMangaStatus').val(),
          success: function(result){
              if(result=='1'){
                  window.location.assign("http://localhost/jesustify/index.php?page=adminpanel");

              }else{
                  $('#addAlert5').html(result).show();
              }
          }


      })



   });



   $('#actUser').click(function(){
      $.ajax({
          type:'POST',
          url:'controllers/actions.php?action=actUser',
          data: 'newRol='+$('#newTypeUser').val()+'&newUser='+$('#userAct').val(),
          success: function(result){
              if(result=='1'){
                  window.location.assign("http://localhost/jesustify/index.php?page=adminpanel");
              }else{
                  $('#addAlert3').html(result).show();
              }

          }


      })



   });





    $('#addCap').click(function(){
        $.ajax({
            type:'POST',
            url:'controllers/actions.php?action=addCap',
            data: 'charapterName='+$('#capituloname').val()+'&elmanga='+$('#selectManga').val(),
            success: function(result){
                if(result=='1'){
                    window.location.assign("http://localhost/jesustify/index.php?page=adminpanel");
                }else{
                    $('#addAlert3').html(result).show();
                }

            }


        })



    });


    $(document).ready(function (e) {
        $("#uploadimage").on('submit',(function(e) {
            e.preventDefault();
            $("#message").empty();
            $('#loading').show();
            $.ajax({
                //url: "controllers/actions.php?action=addImg", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
               // data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                url: 'controllers/actions.php?action=addManga',
                data:new FormData(this),

                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $('#loading').hide();
                    $("#message").html(data);
                }
            });
        }));
// Function to preview image after validation
        $(function() {
            $("#file").change(function() {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                {
                    $('#previewing').attr('src','noimage.png');
                    $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                }
                else
                {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        function imageIsLoaded(e) {
            $("#file").css("color","green");
            $('#image_preview').css("display", "block");
            $('#previewing').attr('src', e.target.result);
            $('#previewing').attr('width', '250px');
            $('#previewing').attr('height', '270px');
        };
    });





</script>


</body>
</html>
