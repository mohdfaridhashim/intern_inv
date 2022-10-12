<?php
    include 'includes/headerUser.php';

    /*session_start();
    if(isset($_SESSION["username"])){
        header("location:http://intern_inv.test/dashboard/");
    }*/

    //cuba guna redirect

?>

<!DOCTYPE html>
<html>
    <head>

    <style>
        .footer{
            position: fixed;
            right: 0;
            bottom: 0;
            width: 100%;
            background-color: white;
            color: black;
            text-align: right;
            margin-right: 5%;
        }
    </style>

    </head>  

    <body>
        <h4> <?php echo $page->title; ?> Page. </h4>
        <br><br>

        <center><h3>
            Welcome 
        </h3></center>

        <div class="footer">
            <p> <?php
                    echo date("l").", ".date("d-m-Y")."<br>"; 
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    echo date("h:i:s a");
                ?>
            </p>
        </div>
    
    </body>

</html>

<?php $users->get("admin")->setOutputFormatting(false)->set('pass', 'password')->save(); ?>