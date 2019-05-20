<?php
session_start();
date_default_timezone_set('Asia/Dhaka');
include "connection.php";
/* Login Block */
if (isset($_POST['submit']) && !empty($_POST['submit'])) {

    $user_name = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$user_name' AND password='$password'";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        $_SESSION['login']['status'] = 'success';
        $_SESSION['login']['message'] = 'Successfully Logged IN!';
        $_SESSION['login']['logged_id'] = $row->id;
        $_SESSION['login']['logged_full_name'] = $row->full_name;
        $_SESSION['login']['logged_email'] = $row->email;
        $_SESSION['login']['logged_status'] = true;
        $_SESSION['login']['user_type'] = $row->type;
        header("location:../dashboard.php");
    } else {
        $_SESSION['login']['status'] = 'error';
        $_SESSION['login']['message'] = '<span style="color:red;">Given Credential not matched!</span>';
        header("location:../index.php");
    }
}

/* Logout Block */
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    unset($_SESSION['login']['logged_status']);
    session_destroy($_SESSION['login']);
    header("location:../index.php");
}

/* User List Method */

function getAllUsers() {
    global $connection;
    //empty array
    $response = [];
    //var default value
    $status = FALSE;
    $data = [];
    $message = "Data not found";
    //query
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($user = $result->fetch_object()) {
            $data[] = $user;
        }
        $status = true;
        $message = "Data  Found";
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    } else {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
    return $response;
}

//ajax form check code
if (isset($_POST['operation_type']) && $_POST['operation_type'] == 'user_add') {
    $feedback = [];

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $status = $_POST['status'];

    //default error status

    $error_status = false;
    $response = emptyCheck($full_name);
    if ($response) {
        $error_status = $response;
    }
    $response = emptyCheck($email);
    if ($response) {
        $error_status = $response;
    }

    //check to click a email or email has allreary exists

    $tableName = "users";
    $fieldName = "email";
    $fieldValue = $email;

    $duplicate_response = duplicateCheck($tableName, $fieldName, $fieldValue);
    if ($duplicate_response) {
        $error_status = $duplicate_response;
    }
    $response = emptyCheck($password);
    if ($response) {
        $error_status = $response;
    }
    $response = emptyCheck($type);
    if ($response) {
        $error_status = $response;
    }
    $response = emptyCheck($status);
    if ($response) {
        $error_status = $response;
    }
    if ($error_status) {

        if ($duplicate_response) {
            $message = "Email Has Already Exists!";
        } else {
            $message = "All Fields Are Required.";
        }

        $feedback = [
            'status' => 'error',
            'message' => $message,
        ];

        echo json_encode($feedback);
    } else {
        $password = md5($password);
        $sql = "INSERT INTO users values('','$full_name','$email','$password','$status','$type')";
        if ($connection->query($sql)) {
            $feedback = [
                'status' => 'success',
                'message' => 'Data have Successfully Added.',
            ];

            echo json_encode($feedback);
        } else {
            $feedback = [
                'status' => 'error',
                'message' => 'Faild To Add data',
            ];

            echo json_encode($feedback);
        }
    }
}

function emptyCheck($field) {
    if (isset($field) && !empty($field)) {
        return false;
    } else {
        return true;
    }
}

//user edit form check
if (isset($_GET['user_edit_id']) && !empty($_GET['user_edit_id'])) {
    global $connection;
    //query
    $sql = "SELECT * FROM users WHERE id=" . $_GET['user_edit_id'];
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_object();
        echo json_encode($user);
    }
}

//user edit form check
if (isset($_POST['operation_type']) && $_POST['operation_type'] == 'user_edit') {
    $feedback = [];

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $id = $_POST['user_edit_id'];

    //default error status

    $error_status = false;
    $response = emptyCheck($full_name);
    if ($response) {
        $error_status = $response;
    }
    $response = emptyCheck($email);
    if ($response) {
        $error_status = $response;
    }

    //check to click a email or email has allreary exists

    $tableName = "users";
    $fieldName = "email";
    $fieldValue = $email;

    $duplicate_response = duplicateCheck($tableName, $fieldName, $fieldValue, $id);
    if ($duplicate_response) {
        $error_status = $duplicate_response;
    }
    $response = emptyCheck($type);
    if ($response) {
        $error_status = $response;
    }
    $response = emptyCheck($status);
    if ($response) {
        $error_status = $response;
    }
    if ($error_status) {
        if ($duplicate_response) {
            $message = "Email Has Already Exists!";
        } else {
            $message = "All Fields Are Required.";
        }

        $feedback = [
            'status' => 'error',
            'message' => $message,
        ];

        echo json_encode($feedback);
    } else {
        $sql = "UPDATE users SET full_name='$full_name',email='$email',is_active=$status,type=$type WHERE id=$id";
        if ($connection->query($sql)) {

            if (isset($password) && !empty($password)) {
                $password = md5($password);
                $sql = "UPDATE users SET password='$password' WHERE id=$id";
                if ($connection->query($sql)) {
                    
                }
            }

            $feedback = [
                'status' => 'success',
                'message' => 'Data have Successfully Updated.',
            ];

            echo json_encode($feedback);
        } else {
            $feedback = [
                'status' => 'error',
                'message' => 'Faild To Update data',
            ];

            echo json_encode($feedback);
        }
    }
}

//user delete form check
if (isset($_POST['delete_id']) && !empty($_POST['delete_id'])) {
    global $connection;
    //query
    $sql = "DELETE FROM " . $_POST['table_name'] . " WHERE id=" . $_POST['delete_id'];
    if ($connection->query($sql)) {
        $feedback = [
            'status' => 'Success',
            'message' => 'Data Have Deleted',
        ];
    } else {
        $feedback = [
            'status' => 'Error',
            'message' => 'Failed To Delete',
        ];
    }
    echo json_encode($feedback);
}

//all delete check

if (isset($_POST['table_name_all']) && !empty($_POST['table_name_all'])) {
    global $connection;
    //query
    $sql = "DELETE FROM " . $_POST['table_name_all'];
    if ($connection->query($sql)) {
        $feedback = [
            'status' => 'Success',
            'message' => 'Deleted All Data',
        ];
    } else {
        $feedback = [
            'status' => 'Error',
            'message' => 'Failed To Delete',
        ];
    }
    echo json_encode($feedback);
}
//user details form check
if (isset($_GET['user_details_id']) && !empty($_GET['user_details_id'])) {
    global $connection;
    //query
    $sql = "SELECT * FROM users WHERE id=" . $_GET['user_details_id'];
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_object();
        echo json_encode($user);
    }
}

/* Category List Method */

function getAllCategories() {
    global $connection;
    //empty array
    $response = [];
    //var default value
    $status = FALSE;
    $data = [];
    $message = "Data not found";
    //query
    $sql = "SELECT * FROM categories ORDER BY id DESC";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($user = $result->fetch_object()) {
            $data[] = $user;
        }
        $status = true;
        $message = "Data  Found";
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    } else {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
    return $response;
}

//category form check code
if (isset($_POST['operation_type']) && $_POST['operation_type'] == 'category_add') {
    $feedback = [];

    $name = $_POST['name'];

    //default error status

    $error_status = false;
    $response = emptyCheck($name);
    if ($response) {
        $error_status = $response;
    }
    //check to click a cat name or name has allreary exists

    $tableName = "categories";
    $fieldName = "name";
    $fieldValue = $name;

    $duplicate_response = duplicateCheck($tableName, $fieldName, $fieldValue);
    if ($duplicate_response) {
        $error_status = $duplicate_response;
    }

    if ($error_status) {
        if ($duplicate_response) {
            $message = "Name Has Already Exists!";
        } else {
            $message = "Name Fields Are Required.";
        }

        $feedback = [
            'status' => 'error',
            'message' => $message,
        ];

        echo json_encode($feedback);
    } else {
        $password = md5($password);
        $sql = "INSERT INTO categories values('','$name')";
        if ($connection->query($sql)) {
            $feedback = [
                'status' => 'success',
                'message' => 'Data have Successfully Added.',
            ];

            echo json_encode($feedback);
        } else {
            $feedback = [
                'status' => 'error',
                'message' => 'Faild To Add data',
            ];

            echo json_encode($feedback);
        }
    }
}

//category edit form check
if (isset($_GET['cat_edit_id']) && !empty($_GET['cat_edit_id'])) {
    global $connection;
    //query
    $sql = "SELECT * FROM categories WHERE id=" . $_GET['cat_edit_id'];
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_object();
        echo json_encode($user);
    }
}

//category edit form check
if (isset($_POST['operation_type']) && $_POST['operation_type'] == 'category_edit') {
    $feedback = [];

    $name = $_POST['name'];
    $id = $_POST['category_edit_id'];

    //default error status

    $error_status = false;
    $response = emptyCheck($name);
    if ($response) {
        $error_status = $response;
    }
    //check to click a cat name or name has allreary exists

    $tableName = "categories";
    $fieldName = "name";
    $fieldValue = $name;

    $duplicate_response = duplicateCheck($tableName, $fieldName, $fieldValue, $id);
    if ($duplicate_response) {
        $error_status = $duplicate_response;
    }
    if ($error_status) {
        if ($duplicate_response) {
            $message = "Name Has Already Exists!";
        } else {
            $message = "Name Fields Are Required.";
        }

        $feedback = [
            'status' => 'error',
            'message' => $message,
        ];

        echo json_encode($feedback);
    } else {
        $sql = "UPDATE categories SET name='$name' WHERE id=$id";
        if ($connection->query($sql)) {
            $feedback = [
                'status' => 'success',
                'message' => 'Data have Successfully Updated.',
            ];
        } else {
            $feedback = [
                'status' => 'error',
                'message' => 'Faild To Update data',
            ];
        }
        echo json_encode($feedback);
    }
}

//category details form check
if (isset($_GET['cat_details_id']) && !empty($_GET['cat_details_id'])) {
    global $connection;
    //query
    $sql = "SELECT * FROM categories WHERE id=" . $_GET['cat_details_id'];
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_object();
        echo json_encode($user);
    }
}

/* QA List Method */

function getAllqa($category_id = null) {
    global $connection;
    //empty array
    $response = [];
    //var default value
    $status = FALSE;
    $data = [];
    $message = "Data not found";
    //query
    $sql = "";
    $sql .= "SELECT qa.id as questions_id, qa.questions, qa.answers, c.name as category_name FROM question_answers as qa JOIN categories as c ON qa.category_id=c.id";

    if (isset($category_id) && !empty($category_id)) {
        $sql .= " WHERE qa.category_id=$category_id";
        $sql .= " ORDER BY qa.id DESC";
    }
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($user = $result->fetch_object()) {
            $data[] = $user;
        }
        $status = true;
        $message = "Data  Found";
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    } else {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
    return $response;
}

//QA Add form check code
if (isset($_POST['operation_type']) && $_POST['operation_type'] == 'qa_add') {
    $feedback = [];

    if (!isset($_POST['category'])) {
        $category = NULL;
    } else {
        $category = $_POST['category'];
    }
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    //default error status

    $error_status = false;
    $response = emptyCheck($category);
    if ($response) {
        $error_status = $response;
    }
    $response = emptyCheck($question);
    if ($response) {
        $error_status = $response;
    }
    //check to click a qa name or name has allreary exists

    $tableName = "question_answers";
    $fieldName = "questions";
    $fieldValue = $question;

    $duplicate_response = duplicateCheck($tableName, $fieldName, $fieldValue);
    if ($duplicate_response) {
        $error_status = $duplicate_response;
    }
    $response = emptyCheck($answer);
    if ($response) {
        $error_status = $response;
    }

    if ($error_status) {
        if ($duplicate_response) {
            $message = "Question Has Already Exists!";
        } else {
            $message = "All Fields Are Required.";
        }

        $feedback = [
            'status' => 'error',
            'message' => $message,
        ];

        echo json_encode($feedback);
    } else {
        $sql = "INSERT INTO question_answers values('','$category','$question','$answer')";
        if ($connection->query($sql)) {
            $feedback = [
                'status' => 'success',
                'message' => 'Data have Successfully Added.',
            ];

            echo json_encode($feedback);
        } else {
            $feedback = [
                'status' => 'error',
                'message' => 'Faild To Add data',
            ];

            echo json_encode($feedback);
        }
    }
}

//QA edit form check
if (isset($_GET['qa_edit_id']) && !empty($_GET['qa_edit_id'])) {
    global $connection;
    //query
    $sql = "SELECT * FROM question_answers WHERE id=" . $_GET['qa_edit_id'];
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $qa = $result->fetch_object();
        echo json_encode($qa);
    }
}

//Qa edit form check
if (isset($_POST['operation_type']) && $_POST['operation_type'] == 'qa_edit') {
    $feedback = [];

    if (!isset($_POST['category'])) {
        $category = NULL;
    } else {
        $category = $_POST['category'];
    }
    $question = $_POST['questions'];
    $answer = $_POST['answers'];
    $id = $_POST['qa_edit_id'];

    //default error status

    $error_status = false;
    $response = emptyCheck($category);
    if ($response) {
        $error_status = $response;
    }
    $response = emptyCheck($question);
    if ($response) {
        $error_status = $response;
    }
    //check to click a qa name or name has allreary exists

    $tableName = "question_answers";
    $fieldName = "questions";
    $fieldValue = $question;

    $duplicate_response = duplicateCheck($tableName, $fieldName, $fieldValue, $id);
    if ($duplicate_response) {
        $error_status = $duplicate_response;
    }
    $response = emptyCheck($answer);
    if ($response) {
        $error_status = $response;
    }

    if ($error_status) {
        if ($duplicate_response) {
            $message = "Question Has Already Exists!";
        } else {
            $message = "All Fields Are Required.";
        }

        $feedback = [
            'status' => 'error',
            'message' => $message,
        ];

        echo json_encode($feedback);
    } else {
        $sql = "UPDATE question_answers SET category_id='$category',questions='$question',answers='$answer' WHERE id=$id";
        if ($connection->query($sql)) {
            $feedback = [
                'status' => 'success',
                'message' => 'Data have Successfully Updated.',
            ];
        } else {
            $feedback = [
                'status' => 'error',
                'message' => 'Faild To Update data',
            ];
        }
        echo json_encode($feedback);
    }
}

if (isset($_GET['search_qa_by_cat_id']) && !empty($_GET['search_qa_by_cat_id'])) {

    $res = getAllqa($_GET['search_qa_by_cat_id']);
    if (isset($res['status']) && $res['status'] == true) {
        foreach ($res['data'] as $data) {
            ?>
            <div class="accordion"><?php echo $data->questions; ?></div>
            <div class="texto"><?php echo $data->answers; ?></div>
            <?php
        }
    }
}

//QA details form check
if (isset($_GET['qa_details_id']) && !empty($_GET['qa_details_id'])) {

    global $connection;
    //query
    $sql = "SELECT qa.id as questions_id, qa.questions, qa.answers, c.name as category_name FROM question_answers as qa JOIN categories as c ON qa.category_id=c.id WHERE qa.id=" . $_GET['qa_details_id'];

    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_object();
        echo json_encode($user);
    }
}

//search option code
if (isset($_POST['any_search']) && !empty($_POST['any_search'])) {
    global $connection;
    // query
    $searchKey = $_POST['search_key'];
    $sql = "SELECT * FROM question_answers WHERE questions LIKE '%$searchKey%'";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($data = $result->fetch_object()) {
            ?>
            <h2><a href="question_answer_details.php?question_id=<?php echo $data->id; ?>"><?php echo $data->questions; ?></a></h2>
            <?php
        }
    } else {
        echo 'Sorry no data was found for the search key ' . "\"$searchKey\"";
    }
}

if (isset($_GET['question_id']) && !empty($_GET['question_id'])) {
    $question_id = $_GET['question_id'];
    $searchTime = date("Y-m-d h:i:s");
    // insert into history table
    $sql = "INSERT INTO histories values('','$question_id','$searchTime')";
    $connection->query($sql);
    // query
    $sql = "SELECT * FROM question_answers WHERE id=" . $question_id;
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $search_question_details = $result->fetch_object();
    }
}

//duplicate action Check Function
function duplicateCheck($tableName, $fieldName, $fieldValue, $id = NULL) {
    global $connection;
    $sql = "";
    $sql .= "SELECT * FROM " . $tableName . " WHERE " . $fieldName . " ='$fieldValue'";
    if (isset($id) && !empty($id)) {
        $sql .= " AND id !=" . $id;
    }
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function getAllhistory() {
    global $connection;
    //empty array
    $response = [];
    //var default value
    $status = FALSE;
    $data = [];
    $message = "Data not found";
    //query
    $sql = "";
    $sql .= "SELECT h.id as history_id, h.search_time, qa.questions FROM histories as h JOIN question_answers as qa ON  h.question_id=qa.id ORDER BY h.id DESC";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($user = $result->fetch_object()) {
            $data[] = $user;
        }
        $status = true;
        $message = "Data  Found";
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    } else {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
    return $response;
}


//products add code 


function getAllProducts() {
    global $connection;
    //empty array
    $response = [];
    //var default value
    $status = FALSE;
    $data = [];
    $message = "Data not found";
    //query
    $sql = "SELECT * FROM products ORDER BY id DESC";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($user = $result->fetch_object()) {
            $data[] = $user;
        }
        $status = true;
        $message = "Data  Found";
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    } else {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
    return $response;
}

//ajax form check code
if (isset($_POST['operation_type']) && $_POST['operation_type'] == 'products_add') {
    $feedback = [];
    $titles = $_POST['titles'];
    $categories = $_POST['categories'];
    $prices = $_POST['prices'];
    $availabilities = $_POST['availabilities'];
    $productsDetailes = $_POST['productsDetailes'];
    $addToCart = $_POST['addToCart'];
    //default error status
    $error_status = false;
    
    $response = emptyCheck($titles);
    if ($response) {
        $error_status = $response;
    }
    //check to click a email or email has allreary exists
    $tableName = "products";
    $fieldName = "titles";
    $fieldValue = $titles;

    $duplicate_response = duplicateCheck($tableName, $fieldName, $fieldValue);
    if ($duplicate_response) {
        $error_status = $duplicate_response;
    }
    $response = emptyCheck($categories);
    if ($response) {
        $error_status = $response;
    }
    $response = emptyCheck($prices);
    if ($response) {
        $error_status = $response;
    }
    $response = emptyCheck($availabilities);
    if ($response) {
        $error_status = $response;
    }
    
    $response = emptyCheck($productsDetailes);
    if ($response) {
        $error_status = $response;
    }
    
    $response = emptyCheck($addToCart);
    if ($response) {
        $error_status = $response;
    }
    if ($error_status) {

        if ($duplicate_response) {
            $message = "Titles Has Already Exists!";
        } else {
            $message = "All Fields Are Required.";
        }

        $feedback = [
            'status' => 'error',
            'message' => $message,
        ];

        echo json_encode($feedback);
    } else {
        
        $sql = "INSERT INTO products values('','','$titles','$categories','$prices','$availabilities','$productsDetailes','$addToCart')";
        if ($connection->query($sql)) {
            $feedback = [
                'status' => 'success',
                'message' => 'Data have Successfully Added.',
            ];

            echo json_encode($feedback);
        } else {
            $feedback = [
                'status' => 'error',
                'message' => 'Faild To Add data',
            ];

            echo json_encode($feedback);
        }
    }
}

//get user count function
//for each for total entry

function getTotalEntry($tableName){
    global $connection;
    $sql = "";
    $sql .= "SELECT * FROM " . $tableName;
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        return $result->num_rows;
    } else {
        return "No Data";
    }
}


//type name by id
function getTypeNameByTypeId($type){
    switch ($type){
        case 1:
            return "Super Admin";
            break;
        case 2:
            return "User";
            break;
        case 3:
            return "Client";
            break;
        default :
            return "Type Not Found";
            break;
    }
}
