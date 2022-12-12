CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS employee (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
    job VARCHAR(200) NOT NULL,
    PRIMARY KEY (ID)
    );

CREATE TABLE IF NOT EXISTS auth (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY(ID)
);

INSERT INTO auth (login, password)
VALUES ('login', '{SHA}W6ph5Mm5Pz8GgiULbPgzG37mj9g=');

INSERT INTO employee (name, job)
VALUES
    ('Popova A', 'Administrator'),
    ('Dymov N', 'Manager'),
    ('Serov L', 'Waiter'),
    ('Knueva T', 'Waiter'),
    ('Alekseev F', 'Waiter');

