-- cerate tables of database 
CREATE TABLE patients(
 patient_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,
 first_name VARCHAR(50) NOT NULL ,
 last_name VARCHAR(50) NOT NULL,
 age INT NOT NULL ,
 gender ENUM('male' , 'female') NOT NULL,
 phone_number VARCHAR(20) UNIQUE NOT NULL,
 email VARCHAR(100) UNIQUE NOT NULL ,
 adress VARCHAR(255) 
); 

-- create table of departements 
CREATE TABLE departements (
 departement_id INT PRIMARY KEY AUTO_INCREMENT ,
 departement_name VARCHAR(50),
 departement_location VARCHAR(50)
);


-- create table of doctors
CREATE TABLE doctors (
 doctor_id INT PRIMARY KEY AUTO_INCREMENT,
 first_name VARCHAR(50) NOT NULL,
 last_name  VARCHAR(50) NOT NULL,
 specialization VARCHAR(50) NOT NULL,
 phone_number VARCHAR(15) NOT NULL UNIQUE,
 email VARCHAR(100) NOT NULL UNIQUE,
 id_departement INT NULL,
 FOREIGN KEY (id_departement) 
 REFERENCES departements(departement_id) 
 ON DELETE SET NULL
);