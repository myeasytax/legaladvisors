CREATE TABLE subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,           -- Unique identifier for the subscription
    user_id INT NOT NULL,                        -- Foreign key to the users table
    attorney_id INT NULL,                        -- Foreign key to the attorneys table
    plan VARCHAR(50) NOT NULL,                   -- Subscription plan name
    payment_method VARCHAR(255) NOT NULL,        -- Payment method
    status ENUM('active', 'inactive', 'pending') DEFAULT 'active', -- Subscription status
    start_date DATE NOT NULL,                    -- Subscription start date
    end_date DATE NULL,                          -- Subscription end date
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for subscription creation
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Last update timestamp
    FOREIGN KEY (user_id) REFERENCES users(id),  -- Reference to users table
    FOREIGN KEY (attorney_id) REFERENCES attorneys(id) -- Reference to attorneys table
);

