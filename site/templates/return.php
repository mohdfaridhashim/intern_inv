<?php
    include 'includes/headerUser.php';
    include 'dbconn.php';
    include 'connect.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo $page->title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #return {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 90%;
                margin-left: 5%;
                text-align: center;
            }

            #return td, #return th {
                border: 1px solid #000;
                padding: 8px
            }

            #return tr:nth-child(even){
                background-color: #95CADB;
            }


            #return th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #151A7B;
                color: white;
            }

            .return {
                /*background-color: #E63B60;
                color: white;
                margin: auto;
                font-size: 15px;
                border: #E63B60;*/
            }

        </style>
    </head>

    <body>

            <h2><center> Return Status </center></h2>
            
            <?php if($page->editable()) { ?>

                <div class="panel-body">
                    <table id="return">
                        <tr>
                            <th> Staff Name </th>
                            <th style="width:30%;"> Inventory </th>
                            <th style="width:15%;"> Quantity </th>
                            <th style="width:15%;"> Return Date </th>
                            <th style="width:15%;"> Status </th>
                        </tr>

                        <?php 
                        
                        $connect = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($connect, 'intern');

                        $query =  "SELECT * FROM application a JOIN inventory i ON i.inv_id=a.inv_id JOIN returns r ON r.app_id=a.app_id";
                        $query_run = mysqli_query($connect, $query);
                        
                        while($row = mysqli_fetch_array($query_run)){
                            ?>

                            <tr>
                                <td> <?php echo $row['staff_name']; ?> </td>
                                <td> <?php echo $row['inv_name'];?> </td>
                                <td> <?php echo $row['inv_qty'];?> </td>
                                <td> <?php echo $row['return_date'];?> </td>
                                <td> <?php 
                                
                                        if($row['return_status']==0){
                                            echo 'Pending';
                                        }
                                        if($row['return_status']==1){
                                            echo 'Returned';
                                        } ?>
                                </td>
                           <?php } 
                        ?>

                        
                    </table>
                </div>

            <?php }
            
            else { ?>
                <div class="panel-body">
                    <table id="return">
                        <tr>
                            <th> Inventory </th>
                            <th style="width:15%;"> Quantity </th>
                            <th style="width:15%;"> Return Date </th>
                            <th style="width:10%;"> Action </th>
                        </tr>

                        <tr>
                            <td> inventory name </td>
                            <td> qty </td>
                            <td> tarikh </td>
                            <td style="text-align: center">
                                <button type="button" class="return" onclick="returnConfirm()"> Return  </button>
                            </td>        
                        </tr>

                        <tr>
                            <td> inventory name </td>
                            <td> qty </td>
                            <td> tarikh </td>
                            <td style="text-align: center">
                                <button class="return" onclick="returnConfirm()"> Return </button>
                            </td>
                        </tr>

                        <tr>
                            <td> inventory name </td>
                            <td> qty </td>
                            <td> tarikh </td>
                            <td style="text-align: center">
                                <button class="return" onclick="returnConfirm()"> Return </button>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php }
            ?>

            <script>
                function returnConfirm() {
                    alert("Inventory has been returned. Thank you.");
                }
            </script>
    </body>

</html>