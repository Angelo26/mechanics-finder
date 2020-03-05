<?php
    require 'includes/dbh.inc.php';

    $ab="cow";
    $sq=11;
    $apple=$ab.$sq;
    echo $apple;
    // $sql = "CREATE TABLE $apple (
    //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     firstname VARCHAR(30) NOT NULL,
    //     lastname VARCHAR(30) NOT NULL,
    //     email VARCHAR(50),
    //     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    //     )";
        
    //     if (mysqli_query($conn2, $sql)) {
    //         echo "Table MyGuests created successfully";
    //     } else {
    //         echo "Error creating table: " . mysqli_error($conn);
    //     }
        