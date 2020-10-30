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
    $rows = fetchQuestionEdit($id);
    // print_r($row);
    // exit();
}

if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $ques = $_POST['question'];    
    $option1 = $_POST['option1'];    
    $option2 = $_POST['option2'];    
    $option3 = $_POST['option3'];    
    $option4 = $_POST['option4'];
    $canswer = $_POST['canswer'];
    
    // $arr = array($option1, $option2, $option3, $option4);
    // $ans = array_search($canswer, $arr);

    $insert = array("category"=>$category, "question"=>$ques, "op1"=>$option1, 
    "op2"=>$option2, "op3"=>$option3, "op4"=>$option4, "canswer"=>$canswer);
    // echo "<pre>";
    // print_r($insert);
    // echo "</pre>";
    // exit();
    $id = $_POST['id'];

    updateQuestion($insert, $id);
}

?>

    <div class="container">
    <p>Add Question and Answer</p>
    <?php echo $msg; ?>
        <div class="question">
            <form action="editQuestion.php" method="post">
            <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                <div class="form-group">
                    <label for="category">Choose Subject</label>
                    <select name="category" id="category" 
                    class="form-control category" required>
                        <option value="">Select category</option>
                        <?php
                        $data = fetchCategory();
                        foreach ($data as $row) :
                            ?>
                        <option 
                            <?php 
                            if ($row['id'] == $rows['category']) {
                                echo "selected";
                            } ?>
                        value="<?php echo $row['id'] ?>">
                            <?php echo $row['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" name="question" id="question"
                    value="<?php echo $rows['question']; ?>"
                    class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="option1">Option 1</label>
                    <input type="text" name="option1" id="option1"
                    value="<?php echo $rows['option1']; ?>"
                    class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="option2">Option 2</label>
                    <input type="text" name="option2" id="option2"
                    value="<?php echo $rows['option2']; ?>"
                    class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="option3">Option 3</label>
                    <input type="text" name="option3" id="option3"
                    value="<?php echo $rows['option3']; ?>"
                    class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="option4">Option 4</label>
                    <input type="text" name="option4" id="option4"
                    value="<?php echo $rows['option4']; ?>"
                    class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="canswer">Correct Answer Index</label>
                    <input type="text" name="canswer" id="canswer"
                    value="<?php echo $rows['correct']; ?>" class="form-control"
                    required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Question" name="submit">
                    <a href="manageQuestion.php">Back</a>
                </div>
            </form>
        </div>
    </div>
<?php
require 'footer.php';
?>