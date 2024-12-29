<?php
include '../db-connect.php';

function up()
{
    global $pdo;

    $sql = "
        CREATE TABLE IF NOT EXISTS services (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
    ";

    $pdo->exec($sql);
    echo "Services table created successfully.\n";
}

function down()
{
    global $pdo;

    $sql = "DROP TABLE IF EXISTS services;";
    $pdo->exec($sql);
    echo "Services table dropped successfully.\n";
}

