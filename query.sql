
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
