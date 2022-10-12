
<!DOCTYPE html>
<html>

  <head>
    <title> <?php echo $page->title; ?> </title>
  </head>

  <body>
    <h1> <?php echo $page->title; ?> </h1>
    <h2> Type: <?php echo $page->planet_type; ?>, 
         Age: <?php echo $page->planet_age; ?> 
    </h2>
    <p> 
        <?php echo $page->planet_summary; ?>
    </p>
  </body>

</html>