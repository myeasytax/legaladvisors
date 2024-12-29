CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,        -- Unique identifier for the user
    name VARCHAR(255) NOT NULL,               -- Full name of the user
    email VARCHAR(255) NOT NULL UNIQUE,       -- Email address (must be unique)
    password VARCHAR(255) NOT NULL,           -- Encrypted password
    role ENUM('user', 'admin') DEFAULT 'user',-- User role (e.g., regular user or admin)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for account creation
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Timestamp for last update
);
