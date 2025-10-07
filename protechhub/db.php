-- Create the 'users' table for user authentication
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the 'services' table (if you want to manage services dynamically)
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2),
    provider_name VARCHAR(255),
    rating DECIMAL(2, 1),
    location VARCHAR(255),
    contact_phone VARCHAR(20),
    image_url VARCHAR(255),
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the 'bookings' table
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    service_id INT, -- Optional: if services are from 'services' table
    service_name VARCHAR(255) NOT NULL,
    service_price DECIMAL(10, 2),
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(20) NOT NULL,
    preferred_date DATE NOT NULL,
    preferred_time VARCHAR(50) NOT NULL,
    service_address TEXT NOT NULL,
    special_requests TEXT,
    status ENUM('Pending', 'Confirmed', 'Completed', 'Cancelled') DEFAULT 'Pending',
    booked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
    -- FOREIGN KEY (service_id) REFERENCES services(id) -- Uncomment if using 'services' table
);

-- Create an 'admins' table for the admin dashboard
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a default admin user (password 'adminpass' will be hashed)
INSERT INTO admins (username, password, email) VALUES ('admin', '$2y$10$e.g.hashedpasswordhere', 'admin@urbantechhub.com');
-- You'll need to hash 'adminpass' using password_hash() in PHP and replace the placeholder.
-- Example: password_hash('adminpass', PASSWORD_DEFAULT)