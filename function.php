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

/**
 * Register User
 * 
 * @param $user comment
 * 
 * @return registerUser
 */
function registerUser($user)
{
    global $conn;

    $name = $user['name'];
    $uname = $user['uname'];
    $pass = $user['pass'];
    $tdate = date('Y-m-d');

    $query = "SELECT * FROM users WHERE `username` =  '$uname' ";
    $res = mysqli_query($conn, $query);
    $row = mysqli_num_rows($res);

    if ($row == 0) {
        $sql = "INSERT INTO users (`name`, `username`, `password`, `tdate`)
        VALUES ('$name', '$uname', '$pass', '$tdate')";
        if (mysqli_query($conn, $sql)) {
            $msg = "<p style='color:green;'>Registration Successfull !</p>";
            return $msg;
        }
    } else {
        $msg = "<p style='color:red;'>This Username Is Already Exists.</p>";
        return $msg;
    }
}

/**
 * Login User
 * 
 * @param $login comment
 * 
 * @return loginUser()
 */
function loginUser($login) 
{
    global $conn;

    $uname = $login['uname'];
    $pass = $login['pass'];

    $sql = "SELECT * FROM users WHERE `username` =  '$uname' 
    AND `password` = '$pass' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    if ($row['username'] == $uname && $row['password'] == $pass) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['username'] = $row['username'];
        header('LOCATION: welcome.php');
    } else {
        $msg = "<p style='color:red;'>Login Faild...Try Again !</p>";
        return $msg;
    }
    
}

/**
 * Fetch User For Admin
 * 
 * @return fetchUser()
 */
function fetchUser()
{
    global $conn;
    $row = array();

    $sql = "SELECT * FROM users";
    $res = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_assoc($res)) {
        $row[] = $data;
    }
    return $row;
}

/**
 * Delete User
 * 
 * @param $id comment
 * 
 * @return deleteUser()
 */
function deleteUser($id)
{
    global $conn;

    $sql = "DELETE FROM users WHERE id =  '$id' ";
    if (mysqli_query($conn, $sql)) {
        $msg = "Delete Successfully";
        return $msg;
    }
    
}

/**
 * Add Question
 * 
 * @param $insert comment
 * 
 * @return addQuestion()
 */
function addQuestion($insert)
{
    global $conn;
    $ques = $insert['question'];
    $op1 = $insert['op1'];
    $op2 = $insert['op2'];
    $op3 = $insert['op3'];
    $op4 = $insert['op4'];
    $canswer = $insert['canswer'];
    $category = $insert['category'];

    $sql = "INSERT INTO quesanswer (`question`, `option1`, `option2`, `option3`, 
    `option4`, `correct`, `category`) VALUES ('$ques', '$op1', '$op2', '$op3', 
    '$op4', '$canswer', '$category')";
    if (mysqli_query($conn, $sql)) {
        $msg = "<span style='color:green;'>Question Added Successfully</span>";
        return $msg;
    }
}

/**
 * Fetch Question
 * 
 * @return fetchQuestion()
 */
function fetchQuestion()
{
    global $conn;
    $row = array();

    $sql = "SELECT * FROM quesanswer";
    $res = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_assoc($res)) {
        $row[] = $data;
    }
    return $row;
}

/**
 * Fetch Question For Test
 * 
 * @param $cid comment
 * 
 * @return fetchQuestion()
 */
function fetchQuestionUser($cid)
{
    global $conn;
    $row = array();

    $sql = "SELECT * FROM quesanswer WHERE category = '$cid' ";
    $res = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_assoc($res)) {
        $row[] = $data;
    }
    return $row;
}

/**
 * Delete Question
 * 
 * @param $id comment
 * 
 * @return deleteQuestion()
 */
function deleteQuestion($id)
{
    global $conn;

    $sql = "DELETE FROM quesanswer WHERE id = '$id' ";
    if (mysqli_query($conn, $sql)) {
        $msg = "Delete Successfylly";
        return $msg;
    }

}

/**
 * Fetch Question for edit
 * 
 * @param $id comment
 * 
 * @return fetchQuestionEdit()
 */
function fetchQuestionEdit($id)
{
    global $conn;

    $sql = "SELECT * FROM  quesanswer WHERE id = '$id' ";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res);
    return $data;
}

/**
 * Update Question
 * 
 * @param $insert comment
 * @param $id     comment
 * 
 * @return updateQuestion()
 */
function updateQuestion($insert, $id)
{
    global $conn;
    $ques = $insert['question'];
    $op1 = $insert['op1'];
    $op2 = $insert['op2'];
    $op3 = $insert['op3'];
    $op4 = $insert['op4'];
    $canswer = $insert['canswer'];
    $category = $insert['category'];

    $sql = "UPDATE quesanswer SET `question` = '$ques', `option1` = '$op1',
    `option2` = '$op2', `option3` = '$op3', `option4` = '$op4', 
    `category` = '$category', `correct` = '$canswer' WHERE id = '$id' ";
    // echo $sql;
    // exit();
    if (mysqli_query($conn, $sql)) {
        header('location:manageQuestion.php');
    }
}


/**
 * Add Category
 * 
 * @param $cname comment
 * 
 * @return addCategory()
 */
function addCategory($cname)
{
    global $conn;

    $sql = "INSERT INTO category (`name`) VALUES ('$cname')";
    if (mysqli_query($conn, $sql)) {
        $msg = "Category Added Successfully";
    }
    return $msg;
}

/**
 * Fetch Category
 * 
 * @return fetchCategory()
 */
function fetchCategory()
{
    global $conn;
    $row = array();

    $sql = "SELECT * FROM category";
    $res = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_assoc($res)) {
        $row[] = $data;
    }
    return $row;
}

/**
 * Delete Category
 * 
 * @param $id comment
 * 
 * @return deleteCategory()
 */
function deleteCategory($id)
{
    global $conn;

    $sql = "DELETE FROM category WHERE id = '$id' ";
    if (mysqli_query($conn, $sql)) {
        $msg = "Delete Successfully";
        return $msg;
    }
}

/**
 * Add Result
 * 
 * @param $result comment
 * 
 * @return submitResult()
 */
function submitResult($result)
{
    global $conn;
    $total = $result['total'];
    $correct = $result['correct'];
    $wrong = $result['wrong'];
    $percentage = $result['percentage'];
    $uname = $result['uname'];
    $cid = $result['cid'];
    $no = $result['no'];
    $tdate = date('Y-m-d');

    $sql = "INSERT INTO result (`totalquestion`, `correct`, `wrong`, `percentage`,
    `username`, `cid`, `tdate`, `no`) VALUES ('$total', '$correct', '$wrong', 
    '$percentage', '$uname', '$cid', '$tdate', '$no')";
    // echo $sql;
    // exit();
    if (mysqli_query($conn, $sql)) {
        $msg = " your response has been recorded !";
        return $msg;
    }
}

/**
 * Fetch Result
 * 
 * @return fetchResult()
 */
function fetchResult()
{
    global $conn;
    $row = array();

    $sql = "SELECT * FROM result ORDER BY id DESC";
    $res = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_assoc($res)) {
        $row[] = $data;
    }
    return $row;
}

/**
 * Delete Result
 * 
 * @param $id Comment
 * 
 * @return deleteResult()
 */
function deleteResult($id)
{
    global $conn;
    $sql = "DELETE FROM result WHERE id = '$id' ";
    if (mysqli_query($conn, $sql)) {
        $msg = "Delete Successfully";
        return $msg;
    }
}
?>