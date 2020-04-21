<?php
if(isset($_POST['search'])){
  $search = strip_tags($_POST['search']);
  header('Location: ../search.php?q='.$search);

}
else{
  header('Location: ../initial_page.php');
}
