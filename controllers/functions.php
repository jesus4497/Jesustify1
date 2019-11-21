<?php
    session_start();
    if(ISSET($_GET['function'])=='logout'){
        session_unset();
    }

/*function displaySongs($type){
    if($type=='public'){

    }
}*/

