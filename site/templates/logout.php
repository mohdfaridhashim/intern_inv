<?php 
    $session->logout(); 
    $session->redirect("/login");
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo $page->title; ?> </title>

    </head>
</html>