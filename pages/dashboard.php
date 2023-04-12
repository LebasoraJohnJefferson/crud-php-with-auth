<?php 
    include '../src/config.php';
    $connections = db();

    if(isset($_GET['list_id'])){
        $edit_list_id = $_GET['list_id'];
        $_SESSION['list_id']=$edit_list_id;
        $list_data = mysqli_query($connections,"SELECT * FROM to_do_list WHERE list_id='$edit_list_id'");

        if(mysqli_num_rows($list_data)){
            $list_detail = mysqli_fetch_assoc($list_data);
        }
    }
    
    $token = $_SESSION['token_id'];
    if(!isset($token)){
        echo header("location:../"); 
        unset($_SESSION['token_id']);
    }

    $username_exist = mysqli_query($connections,"SELECT * FROM users WHERE user_id='$token'");
    if(mysqli_num_rows($username_exist)){
        $row = mysqli_fetch_assoc($username_exist);
    }else{
        $_SESSION['msg']= 'User Does`nt Exist';
        echo header("location:../"); 
    }
    
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To do List | Dashboard</title>
        <link rel="stylesheet" href="../src/css/dashboard.css">
    </head>
    <body>
        <div class="log-out-container">
            <a href="../src/actions/logout.php" class='logout'>LOG OUT</a>
        </div>
        <div class="wrapper">
            <h1>To-Do List of <?php
                if(mysqli_num_rows($username_exist)){
                    echo 'Welcome '. $row['full_name'];
                }
            ?></h1>
            <form method='POST' action='../src/actions/create-task.php'>
                <input name='list_name' type="text" id="new-task" placeholder="Add New Task">
                <button type="submit" id="add-task" name="add-task">Add</button>
            </form>
            <ul id="task-list">
                <!-- render all list -->
                <?php
                    $result = mysqli_query($connections, "SELECT * FROM to_do_list WHERE user_id='$token'  ORDER BY list_id DESC");
                    while($row_col = mysqli_fetch_assoc($result)){
                        echo '<li>';
                        echo '<span class="task">' . $row_col['list_name'] . '</span>';
                        echo '<span class="delete" data-id="' . $row_col['list_id'] . '">
                            <a style="color:blue;margin-right:3px;" href="./dashboard.php?list_id='.$row_col['list_id'].'">Edit</a>
                            <a style="color:red;" href="../src/actions/delete-task.php?list_id='.$row_col['list_id'].'">Delete</a>
                        </span>';
                        echo '</li>';
                    };
                ?>
            </ul>
        </div>
        <?php if(isset($_SESSION['list_id']) && isset($list_detail)){ ?>
        <div class='edit-task-container'>
            <form class='edit-form' method='POST' action='../src/actions/edit-task.php'>
                <input name='list_name' value="<?php echo $list_detail['list_name'] ?>" type="text" id="new-task" placeholder="Edit Task">
                <button type="submit" id="edit-task" name="edit-task">EDIT</button>
            </form>
        </div>
        <?php } ?>
    <body>
    <script src="script.js"></script>
  </body>
    </body>
    </html>