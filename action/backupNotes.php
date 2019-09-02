
<?php
include "../classes/Notes.php";
$notes = new Notes();
session_start();
if(!isset($_POST['backup'])){
    header('Location: ../initial_page.php');
}
else{
    $id = $_SESSION['id'];
    $file_name = '../backupNotes/'.date('d-m-y').'.txt';


    $notes->backup_notes($id, $file_name);

    $path = '../backupNotes/'.date('d-m-y').'.txt';

    header("Content-Type: application/octet-stream");    //

    header("Content-Length: " . filesize($path));

    header('Content-Disposition: attachment; filename='.$path);

    readfile($path);
}
?>
