-- Insert sample users into the `users` table
INSERT INTO users (name, email, password, role)
VALUES
('John Doe', 'john.doe@example.com', '$2y$10$examplehashedpassword1', 'user'),
('Jane Smith', 'jane.smith@example.com', '$2y$10$examplehashedpassword2', 'admin'),
('Alice Johnson', 'alice.johnson@example.com', '$2y$10$examplehashedpassword3', 'user'),
('Bob Brown', 'bob.brown@example.com', '$2y$10$examplehashedpassword4', 'user'),
('Clara Evans', 'clara.evans@example.com', '$2y$10$examplehashedpassword5', 'admin');
