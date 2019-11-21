<?php
function get_header(){
    require_once("../includes/headerAdmin.php");
}
function get_bread(){
    require_once("../includes/breadcumb.php");
}
function get_bread_two(){
    require_once("../includes/breadcumb_two.php");
}
function get_bread_three(){
    require_once("../includes/breadcumb_three.php");
}
function get_bread_four(){
    require_once("../includes/breadcumb_four.php");
}
function get_sidebar(){
    require_once("../includes/sidebar.php");
}
function get_part($addPart){

    require_once("../includes/".$addPart);
}
function get_footer(){
    require_once("../includes/footer.php");
}
function get_bread_five(){
    require_once("../includes/breadcumb_five.php");
}
function get_bread_six(){
    require_once("../includes/breadcumb_six.php");
}
function mysqli_result($res,$row=0,$col=0){
    $numrows = mysqli_num_rows($res);
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
}