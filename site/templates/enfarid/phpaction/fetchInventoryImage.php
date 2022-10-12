<?php
    require_once 'dbconn.php';

    $result = $connect->query("SELECT inv_img FROM inventory");
?>

<?php
    if($result->num_rows > 0) { ?>
        <div class="gallery">
            <?php while($row = $result->fetch_assoc()) { ?>
                <img src="data:inv_img/jpg;charset=utf8;base64, <?php echo base64_encode($row['inv_img']); ?>"/>
                <?php } ?>
        </div>
        <?php } else { ?>
        <p class="status error"> Image not found </p>
    <?php } ?>
