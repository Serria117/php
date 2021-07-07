CREATE DATABASE qlkhachhang;
use qlkhachhang;
CREATE TABLE customer(
    ID INT PRIMARY KEY NOT NULL IDENTITY(1,1),
    customerName NVARCHAR(100) NOT NULL,
    customerTIN VARCHAR(20),
    customerEmail VARCHAR(100),
    customerPhone VARCHAR(20),
    customerAdd1 NTEXT,
    customerAdd2 NTEXT,
    customerContactStaff NVARCHAR(50),
    customerSearch NVARCHAR(200)
);
GO;

CREATE OR ALTER TRIGGER update_Search ON customer FOR INSERT 
AS BEGIN
    DECLARE @name NVARCHAR(100)
    DECLARE @TIN NVARCHAR(20)
    DECLARE @ID INT
    SELECT @ID = ID FROM inserted
    SELECT @name = customerName from inserted
    SELECT @TIN = customerTIN from inserted
    UPDATE customer SET customerSearch = @Name+'_'+@TIN WHERE ID = @ID
END;
GO;


INSERT INTO customer (customerName, customerTIN, customerEmail, customerPhone, customerAdd1, customerAdd2, customerContactStaff)
VALUES (N'Công ty XYZ', '109088768', 'abc@gmail.com', '08728977672', N'1A 38 Hoàng Ngân, Cầu Giấy, Hà Nội', N'1A 38 Hoàng Ngân, Cầu Giấy, Hà nội', N'Hùng');

SELECT customerName as [Tên khách hàng], 
customerAdd1 as [Địa chỉ], 
customerTIN as [Mã số thuế],
customerEmail as [Email],
customerSearch
FROM customer;

CREATE NONCLUSTERED INDEX IDX_CustomerSearch ON customer (customerSearch);

delete from customer 
DBCC CHECKIDENT (customer, RESEED, 0); --reset IDENTITY() to 0

CREATE TABLE CONTRACT(
    contractID INT NOT NULL IDENTITY(1,1),
    customerID INT NOT NULL FOREIGN KEY (customerID) REFERENCES customer(ID),
    contractType NVARCHAR(10),
    contractNumber VARCHAR(20) NOT NULL UNIQUE,
    contractSignDate DATE,
    contractStartDate DATE,
    contractDueDate DATE,
    contractValue INT,
    contractVAT FLOAT,
    contractTotalValue FLOAT,
    contractStatus VARCHAR(10),
    contractNote TEXT,
    CONSTRAINT PK_Contract PRIMARY KEY (contractID, contractNumber),
    CONSTRAINT FK_Type FOREIGN KEY (contractType) REFERENCES contractType(typeCode)
);

INSERT INTO  CONTRACT (customerID, contractType, contractNumber, contractSignDate, contractStartDate, contractDueDate, contractValue, contractVAT, contractTotalValue, contractStatus)
VALUES (1, 'DLT', '');


CREATE TABLE contractType (
    typeID INT NOT NULL IDENTITY(1,1),
    typeName NVARCHAR(50) NOT NULL UNIQUE,
    typeCode NVARCHAR(10) NOT NULL
    CONSTRAINT PK_Type PRIMARY KEY(typeCode)
);

CREATE TABLE PAYMENT(
    paymentID INT PRIMARY KEY NOT NULL IDENTITY(1,1),
    paymentNumber VARCHAR(20) NOT NULL UNIQUE,
    contractNumber VARCHAR(20) NOT NULL UNIQUE,
    paymentTimeStamp DATETIME,
    paymentValue FLOAT,
    paymentVAT FLOAT,
    paymentTotalValue FLOAT,
    paymentIssueDate DATE,
    paymentDueDate DATE,
    paymentSettleDate DATE,
    paymentStatus VARCHAR(10),
    CONSTRAINT FK_Payment FOREIGN KEY (contractNumber) REFERENCES CONTRACT(contractNumber)
);
