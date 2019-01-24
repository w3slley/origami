
<?php 
session_start();
if(!isset($_POST['backup'])){
    header('Location: ../initial_page.php');
}
else{
    $server = 'localhost';
    $username = 'wvict';
    $password = '#secureInformation.$';
    $db = 'notes';
    
    $conn = mysqli_connect($server, $username, $password, $db);
    $id = $_SESSION['id'];
    $file_name = '/var/www/html/notes/backupNotes/backup-notes'.$_SESSION['id'].'.txt';
    
    $sql = 'SELECT * FROM notes WHERE user_id = '.$id.' ORDER BY id DESC';
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        $script = fopen($file_name, 'w') or die("Unable to open file!");
        while($row = mysqli_fetch_assoc($result)){
            $note_title = $row['note_title'].', '.$row['date_created'];
            $note_content = $row['note_content'];
            $x = $note_title."\r\n\r\n".$note_content."\r\n\r\n ########## \r\n\r\n";
            $content = str_replace("<br />", "\r\n", $x);
            fwrite($script, $content);
        }
        fclose($script);
    
        //header('Location: ../backupNotes/backup-notes'.$_SESSION['id'].'.txt');
        //With these lines of code I managed to create an downloable link so that when users click the button to backup their notes, they already can download it.
        $path = '../backupNotes/backup-notes'.$_SESSION['id'].'.txt';
    
        header("Content-Type: application/octet-stream");    //
    
        header("Content-Length: " . filesize($path));    
    
        header('Content-Disposition: attachment; filename='.$path);
    
        readfile($path); 
    }
    else{
        echo 'ERROR!';
    }
    
}
?>
