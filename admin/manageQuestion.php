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

require '../config.php';
require '../function.php';
require 'header.php';
$msg = '';

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
    $msg = deleteQuestion($id);
}
?>

    <div class="container">
        <p>Manage Question answer</p>
        <span style="color:red;"><?php echo $msg; ?></span>
        <div class="qa">
            <?php
            $i = 1;
            $data = fetchQuestion();
            foreach ($data as $row) :
                ?>
            <table>
                <thead>
                    <tr>
                        <th><?php echo $i++ . "."; ?>&nbsp;
                        <?php echo $row['question']; ?></th>
                        <th>
                            <a href="manageQuestion.php?id=<?php echo $row['id'] ?>">
                            Delete</a>||
                            <a href="editQuestion.php?id=<?php echo $row['id'] ?>">
                            Edit</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['option1'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $row['option2'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $row['option3'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $row['option4'] ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo "<b>Correct Answert Index: 
                            </b>".$row['correct']; ?>
                        </td>
                    </tr>
                    
                    <hr>
                </tbody>
            </table>
            <?php endforeach; ?>
        </div>
    </div>
<?php
require 'footer.php';
?>