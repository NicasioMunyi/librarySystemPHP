
-- Crate Database
CREATE database LibraryManagementSystem;

-- Create Table admins
CREATE TABLE Admins(
	AdminID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR (255) NOT NULL,
    Password VARCHAR(255) NOT NULL
    );
    
-- Create Books Table

CREATE TABLE Books (
	BookID INT PRIMARY KEY AUTO_INCREMENT,
    Tittle VARCHAR (255) NOT NULL,
    Author VARCHAR (255) NOT NULL,
    Quantity INT NOT NULL,
    Available INT NOT NULL
    );
    
-- Create table users
CREATE TABLE Users(
	UserId INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR (255) NOT NULL
    );
    
    -- Create table borrowedBooks
CREATE TABLE BorrowedBooks(
	BorrowID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    BookID INT,
    DateBorrowed DATE,
    DateDue DATE,
    DateReturned DATE,
    Fine DECIMAL (10,2),
    IsReturned BOOLEAN DEFAULT 0,
    FOREIGN KEY (UserID) REfERENCES Users(UserID),
    FOREIGN KEY (BookID) REFERENCES Books(BookId)
    );
        

    
