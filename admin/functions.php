<?php


function confirm_query($result){
    global $connection;
    if(!$result){

        die('QUERY FAILED' . mysqli_error($connection));
    }

}




function insert_categories(){
    global $connection;

    if (isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
         echo"this field should not be empty";
        } else{
         $query = "INSERT INTO categories(cat_title) ";
         $query .= "VALUE('{$cat_title}') ";
         $create_category_querie= mysqli_query($connection, $query);
         if(!$create_category_querie){
         die('querie failed' . mysqli_error($connection));
         }}}
}



function findAllCategories(){
    global $connection;
    #find all categories
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($select_categories)){
    $cat_id =  $row['cat_id'];
    $cat_title =  $row['cat_title'];
    echo "<tr>";
    echo "<td>$cat_id</td>";
    echo "<td>$cat_title</td>";
    #ask about this
    echo "<td> <a href='categories.php?delete={$cat_id}'>delete</a></td>";
    echo "<td> <a href='categories.php?edit={$cat_id}'>edit</a></td>";
    echo "<tr>";
}}


function deleteCategories(){
global $connection;
#delete querie
if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
    $delete_querie = mysqli_query($connection,$query);
    header("Location: categories.php");
    }
}

function UpdateAndIncludeQuery(){
    global $connection;
    if(isset($_GET['edit'])){

        $cat_id = $_GET['edit'];
        include "includes/update_categories.php";
    } 
}

?>