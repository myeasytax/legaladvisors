CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Unique identifier for the payment
    user_id INT NOT NULL,                       -- Foreign key to the users table
    subscription_id INT NULL,                   -- Foreign key to the subscriptions table (optional for subscription payments)
    booking_id INT NULL,                        -- Foreign key to the bookings table (optional for booking payments)
    amount DECIMAL(10, 2) NOT NULL,             -- Payment amount
    currency VARCHAR(10) DEFAULT 'USD',         -- Payment currency
    payment_method VARCHAR(255) NOT NULL,       -- Payment method (e.g., Credit Card, PayPal)
    payment_status ENUM('pending', 'completed', 'failed') DEFAULT 'pending', -- Payment status
    transaction_id VARCHAR(255) UNIQUE NULL,    -- Unique transaction ID from the payment gateway
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for payment creation
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Timestamp for last update
    FOREIGN KEY (user_id) REFERENCES users(id), -- Reference to users table
    FOREIGN KEY (subscription_id) REFERENCES subscriptions(id), -- Reference to subscriptions table
    FOREIGN KEY (booking_id) REFERENCES bookings(id) -- Reference to bookings table
);
