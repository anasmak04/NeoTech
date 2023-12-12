CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(50),
    id_role INT,
    FOREIGN KEY (id_role) REFERENCES role(id),
    username VARCHAR(50),
    password VARCHAR(255),
    confirmPwd VARCHAR(255)
)

CREATE TABLE role(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
)

CREATE TABLE product (
     id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    description VARCHAR(50),
    price INT
)