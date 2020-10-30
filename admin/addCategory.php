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

if (isset($_POST['addCateg'])) {
    $cname = $_POST['cname'];
    $msg = addCategory($cname);
    header('location:addCategory.php');
    // exit();
}

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
    $msg = deleteCategory($id);
}
?>
<script>
    // if ( window.history.replaceState ) {
    //     window.history.replaceState( null, null, window.location.href );
    // }
</script>
    <div class="container">
        <p>Add Category</p>
        <?php echo $msg; ?>
        <form action="addCategory.php" method="post">
            <div class="form-group">
                <label for="cname">Category Name</label>
                <input type="text" name="cname" id="cname"
                placeholder="Enter Category" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Category" name="addCateg">
            </div>
        </form>

        <hr>

        <table>
            <thead>
                <tr>
                    <th>Sr.No.</th>
                    <th>Category Name</th>
                    <th>Category Id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $data = fetchCategory();
                foreach ($data as $row) :
                    ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><a href="addCategory.php?id=<?php echo $row['id']; ?>">
                    Delete</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php
require 'footer.php';
?>