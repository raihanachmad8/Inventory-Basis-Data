select *
from sys.databases;
GO

USE [master];
GO

IF EXISTS(SELECT * FROM sys.databASes WHERE name = 'InventoryJTI')
    DROP DATABASE [InventoryJTI];
GO

IF NOT EXISTS (SELECT * FROM sys.databASes WHERE name = 'InventoryJTI')
    CREATE DATABASE [InventoryJTI];
GO

USE [InventoryJTI];
GO

CREATE TABLE Level 
(
    ID_Level	VARCHAR(10),
    Category 	VARCHAR(15),
	PRIMARY KEY(ID_Level)
);

INSERT INTO Level (ID_Level, Category ) VALUES
	('L1', 'Admin '),
	('L2', 'Dosen '),
	('L3', 'Mahasiswa');


CREATE TABLE Status 
(
    ID_Status	VARCHAR(10),
    Status 	VARCHAR(15),
	PRIMARY KEY(ID_Status)
);

INSERT INTO Status (ID_Status, Status ) VALUES
	('S1', 'Waiting '),
	('S2', 'Confirmed '),
	('S3', 'In Process '),
	('S4', 'Done '),
	('S5', 'Canceled');

CREATE TABLE Category 
(
    ID_Category	VARCHAR(10),
    Category 	VARCHAR(15),
	PRIMARY KEY(ID_Category)
);

INSERT INTO Category (ID_Category, Category ) VALUES
	('C1', 'Tools '),
	('C2', 'Electronic '),
	('C3', 'ATK');

CREATE TABLE Profile 
(
    ID_Profile	VARCHAR(10),
    ID_Level	VARCHAR(10),
    name	VARCHAR(100),
    email	NVARCHAR(255),
    phone_number 	VARCHAR(15),
	PRIMARY KEY(ID_Profile),
	FOREIGN KEY(ID_Level) REFERENCES Level(ID_Level)
);

INSERT INTO Profile (ID_Profile, ID_Level, name, email, phone_number ) VALUES
	('P1', 'L2', 'John Doe', 'JohnD@gmail.com', '111 '),
	('P2', 'L3', 'Jane Smith', 'JaneSm@gmail.com', '222 '),
	('P3', 'L1', 'Bob Jhonson', 'Jhonsb@gmail.com', '333 '),
	('P4', 'L3', 'Mary White', 'MWhite@gmail.com', '444 '),
	('P5', 'L1', 'Alex Brown', 'BrAlex@gmail.com', '555 '),
	('P6', 'L3', 'Emily Davis', 'Emily.Davis@gmail.com', '666 '),
	('P7', 'L2', 'David Lee', 'Davidll@gmail.com', '777 '),
	('P8', 'L1', 'Sarah Turner', 'Sarah.Turn@gmail.com', '888 '),
	('P9', 'L3', 'Michael John', 'JohnMchl@gmail.com', '999 '),
	('P10', 'L1', 'Olivia Carter', 'Olivia11@gmail.com', '1110 '),
	('P11', 'L2', 'Liam Anderson', 'LAnderson@gmail.com', '1221 '),
	('P12', 'L3', 'Sophia Rodriguez', 'SophiaRodriguez@gmail.com', '1332 '),
	('P13', 'L2', 'Ethan Taylor', 'Ethany@gmail.com', '1443 '),
	('P14', 'L3', 'Ava Miller', 'Avaler@gmail.com', '1554 '),
	('P15', 'L2', 'Noah Grey', 'NGrey1@gmail.com', '1665');

CREATE TABLE Account 
(
    ID_Account	VARCHAR(10),
    ID_Profile	VARCHAR(10),
    username	VARCHAR(100),
    password 	VARCHAR(200),
	PRIMARY KEY(ID_Account),
	FOREIGN KEY(ID_Profile) REFERENCES Profile(ID_Profile)
);

INSERT INTO Account (ID_Account, ID_Profile, username, password) VALUES
	('A1', 'P1', 'JohnDoe', '110001 '),
	('A2', 'P2', 'JaneSmith', '110002 '),
	('A3', 'P3', 'BobJhonson', '110003 '),
	('A4', 'P4', 'MaryWhite', '110004 '),
	('A5', 'P5', 'AlexBrown', '110005 '),
	('A6', 'P6', 'EmilyDavis', '110006 '),
	('A7', 'P7', 'DavidLee', '110007 '),
	('A8', 'P8', 'SarahTurner', '110008 '),
	('A9', 'P9', 'MichaelJohn', '110009 '),
	('A10', 'P10', 'OliviaCarter', '110010 '),
	('A11', 'P11', 'LiamAnderson', '110011 '),
	('A12', 'P12', 'SophiaRodriguez', '110012 '),
	('A13', 'P13', 'EthanTaylor', '110013 '),
	('A14', 'P14', 'AvaMiller', '110014 '),
	('A15', 'P15', 'NoahGrey', '110015');

CREATE TABLE DetailInventory 
(
    ID_DetailInv	VARCHAR(10),
    ID_Category		VARCHAR(10),
    Source			VARCHAR(100),
    Maintainer		VARCHAR(100),
    Description 	TEXT,
	PRIMARY KEY(ID_DetailInv),
	FOREIGN KEY(ID_Category) REFERENCES Category(ID_Category)
);

INSERT INTO DetailInventory (ID_DetailInv, ID_Category, Source, Maintainer, Description ) VALUES
	('DI1', 'C3', 'Hibah', 'Pak Dimas', '- '),
	('DI2', 'C3', 'Beli', 'Pak Awun', '- '),
	('DI3', 'C1', 'Hibah', 'Pak Dimas', '- '),
	('DI4', 'C1', 'Beli', 'Pak Awun', '- '),
	('DI5', 'C2', 'Hibah', 'Pak Dimas', '- '),
	('DI6', 'C2', 'Beli', 'Pak Awun', '- '),
	('DI7', 'C2', 'Hibah', 'Pak Awun', '- '),
	('DI8', 'C3', 'Beli', 'Pak Awun', '-');

CREATE TABLE Inventory 
(
    ID_Inventory	VARCHAR(10),
    ID_DetailInv	VARCHAR(10),
    Name			VARCHAR(100),
    Stock 			INT
	PRIMARY KEY(ID_Inventory),
	FOREIGN KEY(ID_DetailInv) REFERENCES DetailInventory(ID_DetailInv)
);

INSERT INTO Inventory (ID_Inventory, ID_DetailInv, Name, Stock ) VALUES
	('I1', 'DI1', 'Spidol', '10 '),
	('I2', 'DI2', 'Penghapus', '7 '),
	('I3', 'DI3', 'Tang Crimping', '17 '),
	('I4', 'DI4', 'Obeng', '11 '),
	('I5', 'DI5', 'Konektor Proyektor', '17 '),
	('I6', 'DI6', 'Keyboard', '14 '),
	('I7', 'DI7', 'Mouse', '13');

CREATE TABLE DetailTransaction 
(
    ID_DetailTrc	VARCHAR(10),
    StartDate		DATE,
    EndDate			DATE,
    Guarantee		VARCHAR(15),
    Message 		TEXT,
	PRIMARY KEY(ID_DetailTrc)
);

INSERT INTO DetailTransaction (ID_DetailTrc, StartDate, EndDate, Guarantee, Message) VALUES
	('DT0001', '2023-04-21', '2023-04-21', 'null', 'Silahkan ambil barang di ruang teknisi lantai 7'),
	('DT0002', '2023-04-22', '2023-04-22', 'KTM_01.JPG', 'Silahkan menghubungi xxxxx'),
	('DT0003', '2023-04-23', '2023-04-23', 'KTM_02.JPG', 'Silahkan ambil barang di ruang teknisi lantai 6'),
	('DT0004', '2023-04-24', '2023-04-24', 'null', 'Silahkan menghubungi xxxxx'),
	('DT0005', '2023-04-25', '2023-04-25', 'KTM_03.JPG', 'Silahkan ambil barang di ruang teknisi lantai 5'),
	('DT0006', '2023-04-26', '2023-04-26', 'KTM_04.JPG', 'Silahkan menghubungi xxxxx'),
	('DT0007', '2023-04-27', '2023-04-27', 'KTM_05.JPG', 'Silahkan ambil barang di ruang teknisi lantai 5'),
	('DT0008', '2023-04-28', '2023-04-28', 'null', 'Silahkan menghubungi xxxxx'),
	('DT0009', '2023-05-02', '2023-05-02', 'null', 'Silahkan ambil barang di ruang teknisi lantai 7'),
	('DT0010', '2023-05-03', '2023-05-03', 'KTM_06.JPG', 'Silahkan menghubungi xxxxx'),
	('DT0011', '2023-05-04', '2023-05-04', 'KTM_07.JPG', 'Silahkan ambil barang di ruang teknisi lantai 6'),
	('DT0012', '2023-05-05', '2023-05-05', 'KTM_08.JPG', 'Silahkan menghubungi xxxxx'),
	('DT0013', '2023-05-06', '2023-05-06', 'null', 'Silahkan ambil barang di ruang teknisi lantai 6'),
	('DT0014', '2023-05-07', '2023-05-07', 'KTM_09.JPG', 'Silahkan menghubungi xxxxx'),
	('DT0015', '2023-05-08', '2023-05-08', 'null', 'Silahkan menghubungi xxxxx'),
	('DT0016', '2023-05-09', '2023-05-09', 'KTM_10.JPG', 'Silahkan ambil barang di ruang teknisi lantai 6'),
	('DT0017', '2023-05-10', '2023-05-10', 'KTM_11.JPG', 'Silahkan menghubungi xxxxx'),
	('DT0018', '2023-05-14', '2023-05-14', 'null', 'Silahkan ambil barang di ruang teknisi lantai 6'),
	('DT0019', '2023-05-16', '2023-05-16', 'null', 'Silahkan menghubungi xxxxx'),
	('DT0020', '2023-05-24', '2023-05-24', 'KTM_14.JPG', 'Silahkan menghubungi xxxxx'),
	('DT0021', '2023-06-07', '2023-06-07', 'KTM_13.JPG', 'Silahkan ambil barang di ruang teknisi lantai 6'),
	('DT0022', '2023-06-08', '2023-06-08', 'null', 'Silahkan menghubungi xxxxx'),
	('DT0023', '2023-06-09', '2023-06-09', 'null', 'Silahkan ambil barang di ruang teknisi lantai 6'),
	('DT0024', '2023-06-09', '2023-06-09', 'KTM_14.JPG', 'Silahkan menghubungi xxxxx'),
	('DT0025', '2023-06-09', '2023-06-09', 'null', 'Silahkan ambil barang di ruang teknisi lantai 7'),
	('DT0026', '2023-06-09', '2023-06-09', 'KTM_15.JPG', 'Silahkan ambil barang di ruang teknisi lantai 6'),
	('DT0027', '2023-06-09', '2023-06-09', 'KTM_16.JPG', 'Silahkan ambil barang di ruang teknisi lantai 5');


CREATE TABLE Transactions 
(
    ID_Transaction	VARCHAR(10),
    ID_Inventory	VARCHAR(10),
    ID_Account		VARCHAR(10),
    ID_DetailTrc	VARCHAR(10),
    ID_Status		VARCHAR(10),
    QTY 			INT,
	PRIMARY KEY(ID_Transaction),
	FOREIGN KEY(ID_Inventory) REFERENCES Inventory(ID_Inventory),
	FOREIGN KEY(ID_Account) REFERENCES Account(ID_Account),
	FOREIGN KEY(ID_DetailTrc) REFERENCES DetailTransaction(ID_DetailTrc),
	FOREIGN KEY(ID_Status) REFERENCES Status(ID_Status)
);

INSERT INTO Transactions (ID_Transaction, ID_Inventory, ID_Account, ID_DetailTrc, ID_Status, QTY ) VALUES
	('T0001', 'I2', 'A1', 'DT0001', 'S5', '4 '),
	('T0002', 'I1', 'A2', 'DT0002', 'S2', '4 '),
	('T0003', 'I2', 'A4', 'DT0003', 'S2', '5 '),
	('T0004', 'I7', 'A11', 'DT0004', 'S3', '1 '),
	('T0005', 'I5', 'A2', 'DT0005', 'S4', '2 '),
	('T0006', 'I6', 'A9', 'DT0006', 'S1', '2 '),
	('T0007', 'I5', 'A4', 'DT0007', 'S1', '5 '),
	('T0008', 'I7', 'A15', 'DT0008', 'S3', '2 '),
	('T0009', 'I1', 'A7', 'DT0009', 'S4', '2 '),
	('T0010', 'I1', 'A2', 'DT0010', 'S5', '4 '),
	('T0011', 'I1', 'A14', 'DT0011', 'S1', '2 '),
	('T0012', 'I7', 'A2', 'DT0012', 'S2', '5 '),
	('T0013', 'I3', 'A7', 'DT0013', 'S2', '2 '),
	('T0014', 'I3', 'A2', 'DT0014', 'S5', '4 '),
	('T0015', 'I6', 'A1', 'DT0015', 'S5', '3 '),
	('T0016', 'I3', 'A6', 'DT0016', 'S3', '4 '),
	('T0017', 'I5', 'A4', 'DT0017', 'S2', '4 '),
	('T0018', 'I1', 'A11', 'DT0018', 'S3', '4 '),
	('T0019', 'I7', 'A15', 'DT0019', 'S3', '3 '),
	('T0020', 'I5', 'A10', 'DT0020', 'S1', '3 '),
	('T0021', 'I1', 'A15', 'DT0021', 'S3', '2 '),
	('T0022', 'I1', 'A13', 'DT0022', 'S2', '4 '),
	('T0023', 'I2', 'A1', 'DT0023', 'S4', '4 '),
	('T0024', 'I7', 'A6', 'DT0024', 'S2', '2 '),
	('T0025', 'I5', 'A11', 'DT0025', 'S2', '5 '),
	('T0026', 'I4', 'A6', 'DT0026', 'S4', '1 '),
	('T0027', 'I3', 'A12', 'DT0027', 'S5', '3');
