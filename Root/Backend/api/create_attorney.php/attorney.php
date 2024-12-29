<?php
include 'db-connect.php'; // Include your database connection script

try {
    // SQL to create the attorneys table
    $sql = "
        CREATE TABLE IF NOT EXISTS attorneys (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            profile_picture VARCHAR(255) NULL,
            business_profile TEXT NOT NULL,
            website_url VARCHAR(255) NULL,
            expertise TEXT NOT NULL,
            professional_credentials TEXT NOT NULL,
            professional_memberships TEXT NULL,
            bar_memberships TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        );
    ";

    // Execute the query
    $pdo->exec($sql);
    echo "Attorneys table created successfully.\n";
} catch (PDOException $e) {
    echo "Error creating table: " . $e->getMessage() . "\n";
}
