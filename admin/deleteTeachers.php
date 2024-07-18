<?php
require 'Config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


    // fetch teacher from database
    $query = 'SELECT * FROM teachers WHERE id=$id';
    $result = mysqli_query($connection, $query);
    $teacher = mysqli_fetch_assoc($result);

//   delete user from data base
if (mysqli_num_rows($result)==1){
    var_dump($teacher);
}
$delete_user_query = "DELETE FROM teachers WHERE id=$id";
$delete_user_result = mysqli_query($connection,$delete_user_query);
if(mysqli_errno($connection)){
    $_SESSION["delete-user"] = "Counldn't delete {$teacher['Staffid']} from the Database";
}else{
    $_SESSION["delete-user-success"] = "user {$teacher['Staffid']} deleted successful";
}
}
header("location: ". ROOT_URL . 'admin/teacher.php');