mysql -u root -p

CREATE DATABASE rehab;

USE rehab;

CREATE TABLE Doctor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    phone CHAR(10) NOT NULL
);

CREATE TABLE Patient (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    dob DATE,
    gender ENUM('Male', 'Female', 'Other'),
    name VARCHAR(255) NOT NULL,
    phone CHAR(10), 
    FOREIGN KEY (doctor_id) REFERENCES Doctor(id)
);

CREATE TABLE Admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    phone CHAR(10) NOT NULL
);

CREATE TABLE RequestAppointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT,  
    patient_id INT,
    date DATE NOT NULL,
    time TIME NOT NULL,
    FOREIGN KEY (doctor_id) REFERENCES Doctor(id),
    FOREIGN KEY (patient_id) REFERENCES Patient(id)
);

CREATE TABLE VerifyAppointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    appointment_id INT,
    doctor_id INT,
    FOREIGN KEY (doctor_id) REFERENCES Doctor(id),
    FOREIGN KEY (appointment_id) REFERENCES RequestAppointment(id)
);

CREATE TABLE Treatment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    notes TEXT,
    FOREIGN KEY (patient_id) REFERENCES Patient(id)
);

CREATE TABLE AddDoctor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT,
    doctor_id INT,
    FOREIGN KEY (admin_id) REFERENCES Admin(id),
    FOREIGN KEY (doctor_id) REFERENCES Doctor(id)
);

CREATE TABLE PayPayment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    amount DECIMAL(10,2) NOT NULL,
    card_type VARCHAR(50) NOT NULL,
    exp_date DATE NOT NULL,
    zip_code VARCHAR(20) NOT NULL,
    card_number VARCHAR(19) NOT NULL,
    FOREIGN KEY (patient_id) REFERENCES Patient(id)
);

CREATE TABLE ManagePayment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT,
    payment_id INT,
    FOREIGN KEY (admin_id) REFERENCES Admin(id),
    FOREIGN KEY (payment_id) REFERENCES PayPayment(id)
);


INSERT INTO Doctor (id, username, password, email, name, phone) VALUES
('1002893', 'dsmith', 'password', 'dsmith@revisehealth.com', 'Dan Smith', '1294567890'),
('1002734', 'ejones', 'password', 'ejones@revisehealth.com', 'Emily Jones', '9876023210'),
('1002002', 'mbrown', 'password', 'mbrown@revisehealth.com', 'Michael Brown', '5554943333'),
('1002639', 'swilson', 'password', 'swilson@revisehealth.com', 'Sarah Wilson', '1112223333'),
('1002103', 'jlee', 'password', 'jlee@revisehealth.com', 'Jennifer Lee', '9998887777');

INSERT INTO Admin (id, username, password, email, name, phone) VALUES
('9410293', 'jdavis', 'admin', 'jdavis@revisehealth.com', 'Jessie Davis', '1234567890'),
('9410034', 'ckent', 'admin', 'ckent@revisehealth.com', 'Clark Kent', '9876543210'),
('9410779', 'mwhite', 'admin', 'mwhite@revisehealth.com', 'Manny White', '5554443333'),
('9410021', 'jwaters', 'admin', 'jwaters@revisehealth.com', 'June Waters', '1110423333'),
('9410330', 'bjohnson', 'admin', 'bjohnson@revisehealth.com', 'Barb Johnson', '9993987777');

INSERT INTO Patient (id, doctor_id, username, password, email, address, dob, gender, name, phone) VALUES
('0000482', '1002893', 'jdoe', 'patient', 'jdoe@gmail.com', '123 Main St, Austin, TX', '1990-01-01', 'Male', 'John Doe', '1234562590'),
('0000485', '1002734', 'jsmith', 'patient', 'jsmith@gmail.com', '456 Oak St, Town', '1985-05-15', 'Female', 'Jane Smith', '9883043210'),
('0000668', '1002002', 'mjohnson', 'patient', 'mjohnson@yahoo.com', '789 Elm St, Village', '1978-09-20', 'Male', 'Michael Johnson', '5554100333'),
('0000451', '1002639', 'swilliams', 'patient', 'swilliams@yahoo.com', '321 Pine St, Countryside', '1982-03-10', 'Female', 'Sarah Williams', '1155023333'),
('0000663', '1002103', 'ebrown', 'patient', 'ebrown@gmail.com', '654 Maple St, Suburb', '1995-11-30', 'Other', 'Emily Brown', '9939787777');

INSERT INTO RequestAppointment (id, doctor_id, patient_id, date, time) VALUES
('7777391', '1002893', '0000482', '2024-04-03', '10:00:00'),
('7777003', '1002734', '0000485', '2024-04-05', '14:30:00'),
('7777102', '1002002', '0000668', '2024-04-07', '11:15:00'),
('7777051', '1002639', '0000451', '2024-04-10', '09:45:00'),
('7777994', '1002103', '0000663', '2024-04-12', '13:00:00');

INSERT INTO VerifyAppointment (id, appointment_id, doctor_id) VALUES
('7642021', '7777391', '1002893'),
('7642044', '7777003', '1002734'),
('7642983', '7777102', '1002002'),
('7642593', '7777051', '1002639'),
('7642402', '7777994', '1002103');

INSERT INTO Treatment (id, patient_id, start_date, end_date, notes) VALUES
('910', '0000482', '2024-04-01', '2024-04-15', 'Prescribed medication for anxiety.'),
('002', '0000485', '2024-03-28', '2024-04-10', 'Therapy session.'),
('330', '0000668', '2024-04-05', '2024-04-20', 'Regular checkups for progress.'),
('134', '0000451', '2024-04-02', '2024-04-30', 'Relapse precaution.'),
('551', '0000663', '2024-03-30', '2024-04-25', 'Counseling sessions for stress management');

INSERT INTO AddDoctor (id, admin_id, doctor_id) VALUES
('9001', '9410293', '1002893'),
('9019', '9410034', '1002734'),
('9491', '9410779', '1002002'),
('9210', '9410021', '1002639'),
('9472', '9410330', '1002103');

INSERT INTO PayPayment (id, patient_id, amount, card_type, exp_date, zip_code, card_number) VALUES
('200', '0000482', '100.02', 'Visa', '2027-05-02', '29071', '4111-1111-1111-1111'),
('201', '0000485', '250.04', 'Mastercard', '2028-02-03', '27560', '5500-0000-0000-0004'),
('202', '0000668', '249.70', 'Amex', '2029-03-03', '24567', '3714-4963-5398-431'),
('203', '0000451', '150.98', 'Visa', '2028-02-05', '27406', '4111-1111-1111-1121'),
('204', '0000663', '65.99', 'Discover', '2024-09-11', '28213', '6011-0000-0000-0004');

INSERT INTO ManagePayment (id, admin_id, payment_id) VALUES
('300', '9410293', '200'),
('301', '9410034', '201'),
('302', '9410779', '202'),
('303', '9410021', '203'),
('304', '9410330', '204');
