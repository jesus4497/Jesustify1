<?php
include("models/dumper.php");
if($_POST['table'] == "mangafy"){
    $db_dumper = Shuttle_Dumper::create(array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db_name' => 'mangafy',
    ));
    $db_dumper->dump("mangafy.sql");

    header('Content-Type: application/sql');
    header("Content-Disposition: attachment; filename=mangafy.sql");
    header('Pragma: no-cache');
    readfile("mangafy.sql");
    unlink("mangafy.sql");
}
else {
    $table_dumper = Shuttle_Dumper::create(array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db_name' => 'mangafy',
        'include_tables' => array($_POST['table']),
    ));
    $table_dumper->dump("{$_POST['table']}.sql");

    header('Content-Type: application/sql');
    header("Content-Disposition: attachment; filename={$_POST['table']}.sql");
    header('Pragma: no-cache');
    readfile("{$_POST['table']}.sql");
    unlink("{$_POST['table']}.sql");

}




//header("Location: index.php?page=adminPanel");