<?php

// Include database connection
include "install.php";

$id = $_GET['id']; // rowid from url

// Prepare the deleting query according to rowid
$query = "DELETE FROM books WHERE rowid=$id";

// Run the query to delete record
if($db->query($query)){
    $message = "Book was deleted successfully.<br />";
} else {
    $message = "Sorry,  book not deleted.<br />";
}
echo $message;
header("location:".$_SERVER['HTTP_REFERER']);
?>
<!-- / <a href="index.php">add book</a> / <a href="list.php">catalog</a> / -->