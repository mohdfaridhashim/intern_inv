<?php 	

    include 'dbconn.php';
    include 'connect.php';

    if(isset($_POST['addInv'])){

        if(count($_FILES)> 0){
            if(is_uploaded_file($_FILES['inventoryImage']['tmp_name'])){
                $image = file_get_contents($_FILES['inventoryImage']['tmp_name']);
                $iname = $_POST['inventoryName'];
                $iqty = $_POST['inventoryQty'];
                $istatus = $_POST['inventoryStatus'];

                $sql = "INSERT INTO inventory(inv_img, inv_name, inv_qty, inv_status) VALUES(?, ?, ?, ?)";
                $statement = $connect->prepare($sql);
                $statement->bind_param($image, $iname, $iqty, $istatus);
                $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
            }
        }
        
        /*$image = $_POST['inventoryImage'];
        $name = mysqli_real_escape_string($connect, $_POST['inv_name']);
        $qty = mysqli_real_escape_string($connect, $_POST['inv_qty']);
        $status = mysqli_real_escape_string($connect, $_POST['inv_status']);

        $pdoQuery = "INSERT INTO inventory('inv_img','inv_name','inv_qty','inv_status') VALUES (:image,:name,:qty,:status)";
        
        $pdoQuery_run = $connect->prepare($pdoQuery);

        $pdoQuery_exec = $pdoQuery_run->execute(array(":inv_img"=>$image,":inv_name"=>$name,":inv_qty"=>$qty,":inv_status"=>$status));

        if($pdoQuery_exec){
            echo '<script> alert("Data Inserted in Database") </script>';
        }
        else{
            echo '<script> alert("Data NOT Inserted in Database") </script>';
        }*/
    }

?>