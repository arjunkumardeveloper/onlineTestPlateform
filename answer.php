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

$correct = '';
$wrong = '';
$total = '';
$per = '';
$no = '';
$msg = '';
if (isset($_POST['category'])) {
    $cid = $_POST['category'];
    // echo $cid;
    $correct = 0;
    $no = 0;
    $wrong = 0;

    $sql = "SELECT * FROM quesanswer WHERE `category` = '$cid'";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['correct'] == $_POST[$row['id']]) {
            $correct++;
        } else if ($_POST[$row['id']] == "4") {
            $no++;
        } else {
            $wrong++;
        }
    }
    // echo $no;

    $total = $correct + $wrong + $no;
    if ($total > 0) :
        $per = ($correct)*100/($total);
        $username = $_SESSION['username'];
        // $cid = $_SESSION['cid'];
        $result = array("total"=>$total, "correct"=>$correct, "wrong"=>$wrong,
        "percentage"=>$per, "uname"=>$username, "cid"=>$cid, "no"=>$no);
        // print_r($result);
        // exit();
        $msg = submitResult($result);
    endif;
} else {
     header('LOCATION: welcome.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['name']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<body>  
    <div class="wrapper">
    <a href="welcome.php" style="color:white; text-decoration:none;">
    <p>Welcome <?php echo ucfirst($_SESSION['name']); ?></a>
        <span><a href="logout.php">Logout</a></span></p>
    </div>
    <div class="box1">
        <h3 style="color:green;"><?php echo $_SESSION['name']; echo $msg; ?></h3>
        
        <table>
            <tr>
                <th>Total Question</th>
                <td><?php echo $total; ?></td>
            </tr>
            <tr>
                <th>Correct Answer</th>
                <td><?php echo $correct; ?></td>
            </tr>
            <tr>
                <th>Wrong Answer</th>
                <td><?php echo $wrong; ?></td>
            </tr>
            <tr>
                <th>Not Attempt</th>
                <td><?php echo $no; ?></td>
            </tr>
            <tr>
                <th>Total Percentage</th>
                <td>
                    <?php
                        echo $per."%";
                    ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>