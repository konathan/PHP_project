CREATE DATABASE employee_vacation;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    passcode VARCHAR(225) NOT NULL,
    user_type VARCHAR(255) NOT NULL
);

CREATE TABLE vacation (
    vac_id INT AUTO_INCREMENT PRIMARY KEY,
    date_sub DATE NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    days_in_total INT NOT NULL,
    reason VARCHAR(255) NOT NULL,
    app_status VARCHAR(225) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);