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

$cid = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <title>Document</title>
</head>
<style>
    .hide {
        display:none;
    }
</style>
<body>
    <div class="wrapper">
        <p>Welcome <?php echo ucfirst($_SESSION['name']); ?>
        <span><a href="logout.php">Logout</a></span></p>
    </div>
    
    <div class="box1">
        <form action="answer.php?id=<?php echo $cid; ?>" method="post">
            <?php
            $sql = "SELECT * FROM quesanswer WHERE category =  '$cid' ";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($res);
            if ($row > 0) {
                $i = 1;
                while ($data = mysqli_fetch_assoc($res)) {
                    if ($i == 1) {
                        ?>
                        <table id="table<?php echo $i; ?>" class="arjun">
                            <tr>
                            <a href="welcome.php" class="backButton">Back</a>
                                <th>
                                    <?php echo $i . "." ?>
                                    <?php echo $data['question']; ?>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <b>I</b>&emsp;
                                    <input type="radio" value="0" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option1']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>II</b>&nbsp;&nbsp;
                                    <input type="radio" value="1" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option2']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>III</b>&nbsp;
                                    <input type="radio" value="2" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option3']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>IV</b>&nbsp;
                                    <input type="radio" value="3" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option4']; ?>
                                </td>
                            </tr>
                            <tr>
                                <input type="radio" name="<?php echo $data['id'] ?>" 
                                value="4" checked="checked" style="display:none;" >
                            </tr>
                            <tr>
                                <td>
                                <button class="next" id="<?php echo $i; ?>" 
                                type="button">Next</button>
                                </td>
                            </tr>
                        </table>
                        <?php
                        $i++;
                    } else if (($i > 1) && ($i < $row)) {
                        ?>
                        <table id="table<?php echo $i; ?>" class="arjun">
                            <tr>
                                <th>
                                    <?php echo $i . "." ?>
                                    <?php echo $data['question']; ?>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <b>I</b>&emsp;
                                    <input type="radio" value="0" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option1']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>II</b>&nbsp;&nbsp;
                                    <input type="radio" value="1" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option2']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>III</b>&nbsp;
                                    <input type="radio" value="2" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option3']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>IV</b>&nbsp;
                                    <input type="radio" value="3" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option4']; ?>
                                </td>
                            </tr>
                            <tr>
                                <input type="radio" name="<?php echo $data['id'] ?>" 
                                value="4" checked="checked" style="display:none;" >
                            </tr>
                            <tr>
                                <td>
                                <button class="previous" id="<?php echo $i; ?>" 
                                type="button">Previous</button>
                                <button class="next" id="<?php echo $i; ?>" 
                                type="button">Next</button>
                                </td>
                            </tr>
                        </table>
                        <?php
                        $i++;
                    } else if ($i == $row) {
                        ?>
                        <table id="table<?php echo $i; ?>" class="arjun">
                            <tr>
                                <th>
                                    <?php echo $i . "." ?>
                                    <?php echo $data['question']; ?>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <b>I</b>&emsp;
                                    <input type="radio" value="0" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option1']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>II</b>&nbsp;&nbsp;
                                    <input type="radio" value="1" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option2']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>III</b>&nbsp;
                                    <input type="radio" value="2" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option3']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>IV</b>&nbsp;
                                    <input type="radio" value="3" 
                                    name="<?php echo $data['id']; ?>">
                                    <?php echo $data['option4']; ?>
                                </td>
                            </tr>
                            <tr>
                                <input type="radio" name="<?php echo $data['id'] ?>" 
                                value="4" checked="checked" style="display:none;" >
                            </tr>
                            <tr>
                                <td>
                                <button class="previous" id="<?php echo $i; ?>" 
                                type="button">Previous</button>
                                <input type="submit" value="Submit">
                                </td>
                            </tr>
                        </table>

                        <?php
                        $i++;
                    }
                }
            } else {
                // header('LOCATION: welcome.php');
                ?>
                <a href="welcome.php" class="backButton">Back</a><br><br>
                <?php
                echo "<span style='color: red; padding-top: 10px'>
                NO TEST AVAILABLE</span>";
            }
            ?>
            <input type="hidden" name="category" value="<?php echo $cid; ?>">
        </form>
    </div>
    <script>
        $(document).ready(function (){
            // alert('hii');
            $('.arjun').addClass('hide');
            // $('.arjun').hide();
            $('#table'+1).removeClass('hide');

            $(document).on('click', '.next', function(){
                last = parseInt($(this).attr('id'));
                // alert(last);
                next = last+1;
                // alert(next);
                $('#table'+last).addClass('hide');
                $('#table'+next).removeClass('hide');
            });
            $(document).on('click', '.previous', function(){
                last = parseInt($(this).attr('id'));
                // alert(last);
                pre = last-1;
                // alert(pre);
                $('#table'+last).addClass('hide');
                $('#table'+pre).removeClass('hide');
            });
        });
    </script>
</body>
</html>