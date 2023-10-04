USE s102060145_db; -- using Yeojin's database, if using your own database, change it to s111111111_db where 1s are replaced by your student id

-- deleting pre-existing tables with the same name
DROP TABLE IF EXISTS SALEDETAILS;
DROP TABLE IF EXISTS SALES;
DROP TABLE IF EXISTS MEMBER;
DROP TABLE IF EXISTS ITEM;

-- creating ITEM table
CREATE TABLE ITEM (
	itemID int(10) NOT NULL AUTO_INCREMENT,
	name varchar(40),
	description varchar(50),
	brand varchar(20),
	category varchar(20),
	price decimal(6,2),
	quantity int,
	dateAdded date,
	dateExpiry date,
	weight int,
	CONSTRAINT PRIMARY KEY (itemID)
);

-- creating MEMBER table
CREATE TABLE MEMBER(
	memberID int(10) NOT NULL AUTO_INCREMENT,
	firstName varchar(20),
	lastName varchar(20),
	joinDate date,
	phone varchar(10),
	address varchar (50),
	CONSTRAINT PRIMARY KEY (memberID)
);

-- creating SALES table
CREATE TABLE SALES (
	transactionID int NOT NULL AUTO_INCREMENT,
	memberID int NOT NULL,
	orderDate date NOT NULL,
	CONSTRAINT PRIMARY KEY (transactionID),
	CONSTRAINT FOREIGN KEY (memberID) REFERENCES MEMBER (memberID)
);

-- creating SALEDETAILS table
CREATE TABLE SALEDETAILS (
	transactionID int NOT NULL,
	itemID int NOT NULL,
	quantity int NOT NULL,
	CONSTRAINT PRIMARY KEY (transactionID, itemID),
	CONSTRAINT FOREIGN KEY (transactionID) REFERENCES SALES (transactionID),
	CONSTRAINT FOREIGN KEY (itemID) REFERENCES ITEM (itemID)
);

-- inserting values into ITEM table
INSERT INTO ITEM (name, description, brand, category, price, quantity, dateAdded, dateExpiry, weight)
VALUES ('Organic Royal Gala Apples', 'Fresh organic Royal Gala Apples', 'Nature is Best', 'Fruits', 2.99, 50, '2023-09-15', '2023-09-30', 150);

INSERT INTO ITEM (name, description, brand, category, price, quantity, dateAdded, dateExpiry, weight)
VALUES ('Spaghetti', 'Pack of spaghetti noodles', 'Barilla', 'Pasta', 3.50, 50, '2023-09-15', '2024-09-15', 500);

INSERT INTO ITEM (name, description, brand, category, price, quantity, dateAdded, dateExpiry, weight)
VALUES ('Canned Beans', 'Assorted beans mix', 'Macro', 'Canned Goods', 1.10, 100, '2023-09-15', '2025-12-31', 420);

INSERT INTO ITEM (name, description, brand, category, price, quantity, dateAdded, dateExpiry, weight)
VALUES ('Shapes Pizza Crackers', 'Delicious pizza-flavored crackers', 'Arnott''s', 'Snacks', 5.50, 75, '2023-09-15', '2025-09-15', 190);

INSERT INTO ITEM (name, description, brand, category, price, quantity, dateAdded, dateExpiry, weight)
VALUES ('Australian Potato Wedges', 'Homegrown delicious potato wedges', 'Woolworths', 'Frozen Foods', 4.50, 30, '2023-09-15', '2026-09-15', 705);

-- inserting values into MEMBER table
INSERT INTO MEMBER (firstName, lastName, joinDate, phone, address)
VALUES ('James', 'Smith', '2023-09-15', 0412123123, '2 Smith St Glenferrie');

INSERT INTO MEMBER (firstName, lastName, joinDate, phone, address)
VALUES ('Jane', 'Smith', '2023-09-16', 0412786433, '10 Smith St Glenferrie');

INSERT INTO MEMBER (firstName, lastName, joinDate, phone, address)
VALUES ('Amy', 'Green', '2023-09-15', 0412123783, '66 Smith St Hawthorn');

INSERT INTO MEMBER (firstName, lastName, joinDate, phone, address)
VALUES ('Calvin', 'Truong', '2023-08-12', 0412123178, '55 Park Ave Richmond');

INSERT INTO MEMBER (firstName, lastName, joinDate, phone, address)
VALUES ('Jimmy', 'O''Brian', '2023-10-15', 0412123393, '55A Collins St Melbourne');

-- inserting values into SALES table
INSERT INTO SALES (memberID, orderDate) 
VALUES ('1', '2023-10-15');

INSERT INTO SALES (memberID, orderDate) 
VALUES ('2', '2023-10-16');

INSERT INTO SALES (memberID, orderDate) 
VALUES ('3', '2023-10-16');

INSERT INTO SALES (memberID, orderDate) 
VALUES ('4', '2023-10-20');

INSERT INTO SALES (memberID, orderDate) 
VALUES ('5', '2023-10-20');


-- inserting values into SALEDETAILS table
INSERT INTO SALEDETAILS (transactionID, itemID, quantity) 
VALUES ('1', '1', 2);

INSERT INTO SALEDETAILS (transactionID, itemID, quantity) 
VALUES ('1', '4', 1);

INSERT INTO SALEDETAILS (transactionID, itemID, quantity) 
VALUES ('2', '2', 3);

INSERT INTO SALEDETAILS (transactionID, itemID, quantity) 
VALUES ('2', '3', 3);

INSERT INTO SALEDETAILS (transactionID, itemID, quantity) 
VALUES ('3', '1', 10);

INSERT INTO SALEDETAILS (transactionID, itemID, quantity) 
VALUES ('4', '5', 3);

INSERT INTO SALEDETAILS (transactionID, itemID, quantity) 
VALUES ('5', '5', 10);

