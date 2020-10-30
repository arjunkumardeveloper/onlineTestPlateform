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
$msg = '';
require '../config.php';
require '../function.php';
require 'header.php';

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
    $msg = deleteUser($id);
}
?>

    <div class="container">
        <?php echo $msg; ?>
        <p>Register User</p>
        <table>
            <thead>
                <tr>
                    <th>Sr.No.</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>UserName</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sr = 1;
                $data = fetchUser();
                foreach ($data as $row) :
                    ?>
                <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo date('d-M-Y', strtotime($row['tdate'])); ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>
                        <a href="users.php?id=<?php echo $row['id']; ?>"
                         onclick="return conn()">Delete</a></td>
                </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function conn()
        {
            var arjun = confirm('Are you sure want to delete..?');
            if (arjun == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
<?php
require 'footer.php';
?>