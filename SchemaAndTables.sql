CREATE SCHEMA loginsystem;

CREATE TABLE loginsystem.users (
  id INT NOT NULL AUTO_INCREMENT,
  first VARCHAR(128) NOT NULL,
  last VARCHAR(128) NOT NULL,
  uid VARCHAR(128) UNIQUE NOT NULL,
  pwd VARCHAR(1000) NOT NULL,
  PRIMARY KEY (id));

CREATE TABLE loginsystem.inventory (
  inv_id INT NOT NULL AUTO_INCREMENT,
  description VARCHAR(45) NULL,
  quantityStored INT NULL,
  quantityOrdered INT NULL,
  PRIMARY KEY (inv_id));