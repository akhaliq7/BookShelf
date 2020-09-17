<?php

// Includes the database connection
include "install.php";

// Makes query with rowid
$query = "SELECT rowid, * FROM books";

// Run the query and set query result in $result
// Here $db comes from "db_connect.php"
$result = $db->query($query);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>List of Books in Catalog</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <div class="wrapper">
    <header class="headerGrid headerFlexParent header">
    <h1 class="h1">Library Catalog</h1>
    </header>
    <nav class="navGrid navFlexParent nav"><p><a href="index.php" class="a">add book</a></p></nav>
    <main class="mainTableGrid mainTable">
        <table>
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Year Published</th>
                    <th>ISBN-10</th>
                    <th>ISBN-13</th>
                    <th>URL</th>
                    <th>My Price</th>
                    <th>Other Price</th>
                    <th>Other Price 2</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php while($row = $result->fetchArray()) {?>
            <tbody>
                <tr>
                    <td><?php echo $row['first_name']; echo '&nbsp'; echo $row['last_name'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td class="rightjust"><?php echo $row['year'];?></td>
                    <td class="rightjust"><?php echo $row['isbn10'];?></td>
                    <td class="rightjust"><?php echo $row['isbn13'];?></td>
                    <td><?php echo $row['url'];?></td>
                    <td class="rightjust"><?php echo "£" . $row['my_price'];?></td>
                    <td class="rightjust"><?php echo "£" . $row['other_price'];?></td>
                    <td class="rightjust"><?php echo "£" . $row['other_price2'];?></td>
                    <td>
                        <p><a class="a2" href="update.php?id=<?php echo $row['id'];?>">Edit</a></p>
                        <br>
                        <p><a class="a2" href="delete.php?id=<?php echo $row['id'];?>"confirm('Are you sure?');">Delete</a></p>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </main>
        <footer class="footerGrid footerFlexParent footer">
            <p>Copyright 2020 Book shelf application for listing books for sale.</p>
        </footer>
        </div>
    </body>
</html>