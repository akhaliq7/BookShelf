<?php
$message = ""; // initialize message

// Includes database connection
include "install.php";

// Updating the table row with submitted data according to rowid once form is submitted
if(isset($_POST['update'])) {

    // Gets the data from post
    $id = $_POST['id'];
    $title = $_POST['title'];
    $firstname = $_POST['author-first'];
    $lastname = $_POST['author-last'];
    $year = $_POST['year-published'];
    $isbn10 = $_POST['isbn10'];
    $isbn13 = $_POST['isbn13'];
    $url = $_POST['url'];
    $my_price = $_POST['my-price'];
    $other_price = $_POST['other-price'];
    $other_price2 = $_POST['other-price2'];

    // Make a query with post data
    $query = "UPDATE books set title='$title', first_name='$firstname', last_name='$lastname', 
       `year`='$year', isbn10='$isbn10', isbn13='$isbn13', `url`='$url', my_price='$my_price',
       other_price='$other_price', other_price2='$other_price2' WHERE rowid=$id";

    // Execute the query
    // If data inserted then set success message otherwise set error message
    // Here $db comes from "db_connect.php"
    if($db->exec($query)) {
        $message = "Catalog updated successfully.";
    } else {
        $message = "Sorry, there was a malfunction.";
    }
}

$id = $_GET['id']; // rowid from url
// Prepare query to get the row data with rowid
$query = "SELECT rowid, * FROM books WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Catalog</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <div class="wrapper">
    <header class="headerGrid headerFlexParent header">  
        <h1 class="h1">Update Catalog</h1>
    </header>
    <nav class="navGrid navFlexParent nav">
        <p><a class="a" href="index.php">add book</a></p> <hr> <p><a class="a" href="list.php">catalog</a></p>
    </nav>
    <main class="mainGrid mainFlexParent">
        <form action="" method="post" class="formGrid">
            <fieldset>
                <tr>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                </tr>
                <div class="pure-control-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo $data['title'];?>">
                </div>
                <div class="pure-control-group">
                    <label for="author-first">Author's First Name</label>
                    <input type="text" id="author-first" name="author-first" value="<?php echo $data['first_name'];?>">
                </div>
                <div class="pure-control-group">
                    <label for="author-last">Author's Last Name</label>
                    <input type="text" id="author-last" name="author-last" value="<?php echo $data['last_name'];?>">
                </div>
                <div class="pure-control-group">
                    <label for="year-published">Year Published</label>
                    <input type="number" id="year-published" name="year-published" min="1300" max="2100" 
                        value="<?php echo $data['year'];?>">
                </div>
                <div class="pure-control-group">
                    <label for="isbn10">ISBN-10</label>
                    <input type="number" id="isbn10" name="isbn10" value="<?php echo $data['isbn10'];?>">
                </div>
                <div class="pure-control-group">
                    <label for="isbn13">ISBN-10</label>
                    <input type="number" id="isbn13" name="isbn13" value="<?php echo $data['isbn13'];?>">
                </div>
                <div class="pure-control-group">
                    <label for="url">URL</label>
                    <input type="url" id="url" name="url" value="<?php echo $data['url'];?>">
                </div>
                <div class="pure-control-group">
                    <label for="my-price">My Price</label>
                    <input type="number" id="my-price" name="my-price" value="<?php echo $data['my_price'];?>" 
                    step="0.01" min=0> 
                </div>
                <div class="pure-control-group">
                    <label for="other-price">Other Price</label>
                    <input type="number" id="other-price" name="other-price" value="<?php echo $data['other_price'];?>" 
                    step="0.01" min=0>
                </div>
                <div class="pure-control-group">
                    <label for="other-price2">Other Price 2</label>
                    <input type="number" id="other-price2" name="other-price2" value="<?php echo $data['other_price2'];?>" 
                    step="0.01" min=0 >
                </div>
                <div class="pure-controls">
                    <button type="submit" name="update" class="pure-button pute-button-primary">Update</button>
                    <div><?php echo $message;?></div>
                </div>
            </fieldset>
        </form>
        </main>
        <footer class="footerGrid footerFlexParent footer">
            <p>Copyright 2020 Book shelf application for listing books for sale.</p>
        </footer>
        </div>
    </body>
</html>