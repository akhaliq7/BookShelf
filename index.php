<?php
$message = "";
if(isset($_POST['submit'])) {
    
    if(empty($_POST['title'])) {
        echo "Please fill in book title <br />";
    }

    if(empty($_POST['author-first'])) {
        echo "Please fill in author's first name <br />";
    } 
    
    if(empty($_POST['author-last'])) {
        echo "Please fill in author's last name <br />";
    }
    
    if(empty($_POST['year-published'])) {
        echo "Please fill in year published <br />";
    } 
    if(empty($_POST['isbn10'])) {
        // isbn10
        echo "Please fill in isbn-10 value <br />";
    }
    if(empty($_POST['isbn13'])) {
        // isbn13
        echo "Please fill in isbn-13 value <br />";
    }
    if(empty($_POST['url'])) {
        // url
        echo "Please fill in the product's url <br />";
    }
    if(empty($_POST['my-price'])) {
        // our price
        echo "Please fill in my price <br />";
    }
    if(empty($_POST['other-price'])) {
        // other price
        echo "Please fill in similar price <br />";
    }
    if(empty($_POST['other-price2'])) {
        // other price 2
        echo "Please fill in another second similar price <br />";
    } else {
        // Includes database connection
        include "install.php";

        // Gets the data from post
        $title = $_POST['title'];
        $first_name = $_POST['author-first'];
        $last_name = $_POST['author-last'];
        $year = $_POST['year-published'];
        // isbn10
        $isbn10 = $_POST['isbn10'];
        // isbn13
        $isbn13 = $_POST['isbn13'];
        // url
        $url = $_POST['url'];
        // my price
        $my_price = $_POST['my-price'];
        // other price
        $other_price = $_POST['other-price'];
        // other price 2
        $other_price2 = $_POST['other-price2'];

        // Makes query with post data
        $query = "INSERT INTO books (title, first_name, last_name, `year`, isbn10, isbn13, `url`, my_price, other_price, other_price2)
            VALUES ('$title', '$first_name', '$last_name', '$year', '$isbn10', '$isbn13', '$url', '$my_price', '$other_price', '$other_price2')";

        // Executes the query
        // If data inserted then set success message otherwise set error message
        if($db->exec($query)) {
            $message = "Data inserted successfully.";
        } else {
            $message = "Sorry, Data was not inserted.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Library Catalog App</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <div class="wrapper">
    <header class="headerGrid headerFlexParent header">  
        <h1 class="h1">Library Catalog Application</h1>
    </header>
    <nav class="navGrid navFlexParent nav"><p><a href="list.php" class="a">catalog</a></p></nav>
    <main class="mainGrid mainFlexParent">
        <form action="" method="post" class="formGrid">
            <fieldset>
                <div>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Book Title">
                </div>
                <div>
                    <label for="author-first">Author's First Name</label>
                    <input type="text" id="author-first" name="author-first" placeholder="Author's First Name">
                </div>
                <div>
                    <label for="author-last">Author's Last Name</label>
                    <input type="text" id="author-last" name="author-last" placeholder="Author's Last Name">
                </div>
                <div>
                    <label for="year-published">Year Published</label>
                    <input type="number" id="year-published" name="year-published" min="1300" max="2100" 
                        placeholder="e.g. 1901">
                </div>
                <div>
                    <label for="isbn10">ISBN-10</label>
                    <input type="number" id="isbn10" name="isbn10" placeholder="ISBN-10">
                </div>
                <div>
                    <label for="isbn13">ISBN-13</label>
                    <input type="number" id="isbn13" name="isbn13" placeholder="ISBN-13">
                </div>
                <div>
                    <label for="url">URL</label>
                    <input type="url" id="url" name="url" placeholder="URL">
                </div>
                <div>
                    <label for="my-price">My Price</label>
                    <input type="number" id="my-price" name="my-price" placeholder="My Price" step="0.01" min=0> 
                </div>
                <div>
                    <label for="other-price">Other Price</label>
                    <input type="number" id="other-price" name="other-price" placeholder="Other Price" step="0.01" min=0>
                </div>
                <div>
                    <label for="other-price2">Other Price 2</label>
                    <input type="number" id="other-price2" name="other-price2" placeholder="Other Price 2" step="0.01" min=0 >
                </div>
                <div>
                    <button type="submit" name="submit" class="">Submit</button>
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