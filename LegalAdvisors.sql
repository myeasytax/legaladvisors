CREATE DATABASE LegalAdvisors;

USE LegalAdvisors;

CREATE TABLE lawyers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    expertise TEXT NOT NULL, -- A list of expertise areas (comma-separated)
    location VARCHAR(255) NOT NULL,
    website VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Example Data
INSERT INTO lawyers (name, expertise, location, website)
VALUES
('John Doe', 'Family Law, Immigration Law', 'New York', 'https://johndoelaw.com'),
('Jane Smith', 'Corporate Law, Intellectual Property', 'San Francisco', 'https://janesmithlaw.com'),
('Alice Johnson', 'Criminal Law, Civil Litigation', 'Chicago', 'https://alicejohnsonlaw.com');
USE LegalAdvisors;

ALTER TABLE lawyers
ADD COLUMN professional_credentials TEXT NOT NULL,  -- Professional qualifications or certifications
ADD COLUMN professional_memberships TEXT,          -- List of professional memberships (comma-separated)
ADD COLUMN bar_memberships TEXT;                   -- List of bar memberships (comma-separated)

-- Example Data Update
UPDATE lawyers
SET 
    professional_credentials = 'JD, LLM',
    professional_memberships = 'American Bar Association, International Association of Lawyers',
    bar_memberships = 'New York State Bar, California State Bar'
WHERE id = 1;

UPDATE lawyers
SET 
    professional_credentials = 'JD, MBA',
    professional_memberships = 'Corporate Lawyers Association',
    bar_memberships = 'California State Bar'
WHERE id = 2;
