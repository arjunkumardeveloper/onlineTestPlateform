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

if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $ques = $_POST['question'];    
    $option1 = $_POST['option1'];    
    $option2 = $_POST['option2'];    
    $option3 = $_POST['option3'];    
    $option4 = $_POST['option4'];
    $canswer = $_POST['canswer'];
    
    $arr = array($option1, $option2, $option3, $option4);
    $ans = array_search($canswer, $arr);

    $insert = array("category"=>$category, "question"=>$ques, "op1"=>$option1, 
    "op2"=>$option2, "op3"=>$option3, "op4"=>$option4, "canswer"=>$ans);
    // echo "<pre>";
    // print_r($insert);
    // echo "</pre>";

    $msg = addQuestion($insert);
}

?>

    <div class="container">
    <p>Add Question and Answer</p>
    <?php echo $msg; ?>
        <div class="question">
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="category">Choose Subject</label>
                    <select name="category" id="category" 
                    class="form-control category" required>
                        <option value="">Select category</option>
                        <?php
                        $data = fetchCategory();
                        foreach ($data as $row) :
                            ?>
                        <option value="<?php echo $row['id'] ?>">
                            <?php echo $row['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" name="question" id="question"
                    placeholder="Enter Question" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="option1">Option 1</label>
                    <input type="text" name="option1" id="option1"
                    placeholder="Enter Option 1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="option2">Option 2</label>
                    <input type="text" name="option2" id="option2"
                    placeholder="Enter Option2" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="option3">Option 3</label>
                    <input type="text" name="option3" id="option3"
                    placeholder="Enter Option 3" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="option4">Option 4</label>
                    <input type="text" name="option4" id="option4"
                    placeholder="Enter Option 4" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="canswer">Correct Answer</label>
                    <input type="text" name="canswer" id="canswer"
                    placeholder="Enter Correct Answer" class="form-control"
                    required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Add Question" name="submit">
                </div>
            </form>
        </div>
    </div>
<?php
require 'footer.php';
?>