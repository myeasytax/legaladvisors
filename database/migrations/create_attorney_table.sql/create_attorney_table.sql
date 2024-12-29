CREATE TABLE attorneys (
    id INT AUTO_INCREMENT PRIMARY KEY,            -- Unique identifier for the attorney
    user_id INT NOT NULL,                         -- Foreign key to the users table
    profile_picture VARCHAR(255) NULL,           -- Path to the profile picture
    business_profile TEXT NOT NULL,              -- Description of the attorney's business profile
    website_url VARCHAR(255) NULL,               -- Attorney's business website URL
    expertise TEXT NOT NULL,                     -- List of legal practice areas (comma-separated or JSON format)
    professional_credentials TEXT NOT NULL,      -- Certifications or degrees of the attorney
    professional_memberships TEXT NULL,          -- Memberships in professional organizations
    bar_memberships TEXT NOT NULL,               -- Memberships in bar associations
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for attorney creation
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Timestamp for last update
    FOREIGN KEY (user_id) REFERENCES users(id)   -- Reference to the users table
);
