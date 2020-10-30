<?php
/**
 * The file doc comment
 * php version 7.2.10
 * 
 * @category Class
 * @package  Package
 * @author   Original Author <author@example.com>
 * @license  https://www.cedcoss.com cedcoss 
 * @link     link
 */
session_start();
if ($_SESSION['name'] == "") {
    header('location: index.php');
}
require 'config.php';
require 'function.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo ucfirst($_SESSION['name']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <p>Welcome <?php echo ucfirst($_SESSION['name']); ?>
        <span><a href="logout.php">Logout</a></span></p>
    </div>
    <div class="box1">
        <div class="testbox">
        <p>Choose Your Test</p>
        <hr>
            <?php
            $data = fetchCategory();
            foreach ($data as $row) :
                ?>   
            <a href="home.php?id=<?php echo $row['id']; ?>">
                <?php echo $row['name'];  ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>