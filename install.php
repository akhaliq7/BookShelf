<?php
// Get the PDO DSN string
$database_name = 'library_app.sqlite';


// Database Connection
$db = new SQLite3($database_name);

// Create Table "books" into Database if not exists
$query = "CREATE TABLE IF NOT EXISTS books (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    title VARCHAR NOT NULL,
    first_name VARCHAR NOT NULL,
    last_name VARCHAR NOT NULL,
    `year` INTEGER NOT NULL,
    isbn10 INTEGER,
    isbn13 INTEGER,
    `url` VARCHAR,
    my_price REAL,
    other_price REAL,
    other_price2 REAL
    )";
$db->exec($query);
?>