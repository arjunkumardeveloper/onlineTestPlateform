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

 require 'header.php';
 require '../config.php';
 require '../function.php';
 $msg = '';

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
    $msg = deleteResult($id);
}
?>
<div class="container">
    <p>User result</p>
    <span style="color:red;"><?php echo $msg; ?></span>
    <table>
        <thead>
            <tr>
                <th>Sr.No.</th>
                <th>Date</th>
                <th>Username</th>
                <th>Category</th>
                <th>TotalQuestion</th>
                <th>Correct Answer</th>
                <th>Wrong Answer</th>
                <th>Not Attempt</th>
                <th>Total Percentage</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $data = fetchResult();
            foreach ($data as $row) :
                ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo date('d-M-Y', strtotime($row['tdate'])); ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['cid']; ?></td>
                <td><?php echo $row['totalquestion']; ?></td>
                <td><?php echo $row['correct']; ?></td>
                <td><?php echo $row['wrong']; ?></td>
                <td><?php echo $row['no']; ?></td>
                <td><?php echo $row['percentage']."%"; ?></td>
                <td><a href="userResult.php?id=<?php echo $row['id'] ?>">
                Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require 'footer.php';
?>