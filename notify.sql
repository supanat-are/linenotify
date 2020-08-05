CREATE DATABASE IF NOT EXISTS list;

CREATE TABLE IF NOT EXISTS users (
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    address varchar(50) NOT NULL,
    phone varchar(10) NOT NULL,
    data varchar(999) NOT NULL,
    PRIMARY KEY (id)

);