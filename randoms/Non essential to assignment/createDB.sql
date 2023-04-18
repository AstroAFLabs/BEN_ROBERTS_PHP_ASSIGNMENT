DROP DATABASE IF EXISTS acme_door_levers;
CREATE DATABASE acme_door_levers;
USE acme_door_levers;
CREATE TABLE IF NOT EXISTS acme_products (productName varchar(40), description varchar(40), productUsage varchar(15), finish varchar(30), product_price float(8,2), product_image varchar(60), imageurl varchar(50));


-- C:\xampp\htdocs\PHP\ASSESSMENT4\root\createDB.sql