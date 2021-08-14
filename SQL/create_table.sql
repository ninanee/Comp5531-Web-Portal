
CREATE TABLE User (
    UserId INT NOT NULL AUTO_INCREMENT,
    Email VARCHAR(50) NOT NULL,
    Address VARCHAR(50) NOT NULL,
    Phone_Number INT,
    Password VARCHAR(50) NOT NULL,
    Username VARCHAR(50) UNIQUE,
    PRIMARY KEY (UserId)
);

CREATE TABLE Employer (
    Employer_ID INT NOT NULL AUTO_INCREMENT,
    Description VARCHAR(100),
    Name VARCHAR(50),
    Emoloyer_Balance DECIMAL(10 , 2 ) NOT NULL DEFAULT '0.00',
    EmMembershipStartTime TIMESTAMP DEFAULT NOW(),
    UserId INT NOT NULL,
    GenreEm VARCHAR(50),
    PRIMARY KEY (Employer_ID),
    FOREIGN KEY (UserId)
        REFERENCES User (UserId)
        ON DELETE CASCADE,
    FOREIGN KEY (GenreEm)
        REFERENCES EmployerMembership (Genre)
        ON DELETE CASCADE
);

CREATE TABLE EmployerMembership (
    Genre VARCHAR(50) NOT NULL,
    MonthlyFee DECIMAL(10 , 2 ) NOT NULL,
    MaxJobPost INT NOT NULL,
    PRIMARY KEY (Genre)
);

CREATE TABLE CandidateMembership (
    Genre VARCHAR(50) NOT NULL,
    MonthlyFee DECIMAL(10 , 2 ) NOT NULL,
    MaxJobApply INT NOT NULL,
    PRIMARY KEY (Genre)
);

CREATE TABLE Candidate (
    Candidate_ID INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Candidate_Balance DECIMAL(10 , 2 ) NOT NULL DEFAULT '0.00',
    CanMembershipStartTime TIMESTAMP DEFAULT NOW(),
    UserId INT NOT NULL,
    GenreCan VARCHAR(50),
    PRIMARY KEY (Candidate_ID),
    FOREIGN KEY (UserId)
        REFERENCES User (UserId)
        ON DELETE CASCADE,
    FOREIGN KEY (GenreCan)
        REFERENCES CandidateMembership (Genre)
        ON DELETE CASCADE
);

CREATE TABLE JobCategory (
    Genre VARCHAR(50) NOT NULL,
    Name VARCHAR(50) NOT NULL,
    PRIMARY KEY (Genre)
);

CREATE TABLE Admin (
    Admin_ID INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    UserID INT NOT NULL,
    PRIMARY KEY (Admin_ID),
    FOREIGN KEY (UserID)
        REFERENCES User (UserId)
        ON DELETE CASCADE
);

CREATE TABLE Job (
    Job_ID INT NOT NULL AUTO_INCREMENT,
    Vacancies INT NOT NULL,
    JobStatus BOOL,
    Title VARCHAR(50),
    Description VARCHAR(100),
    Post_Date TIMESTAMP DEFAULT NOW(),
    Location VARCHAR(50),
    PostEmployer_ID INT NOT NULL,
    GenreJob VARCHAR(50) NOT NULL,
    PRIMARY KEY (Job_ID),
    FOREIGN KEY (PostEmployer_ID)
        REFERENCES Employer (Employer_ID),
    FOREIGN KEY (GenreJob)
        REFERENCES JobCategory (Genre)
);

CREATE TABLE Payment (
    Payment_ID INT NOT NULL AUTO_INCREMENT,
    Amount DECIMAL(10 , 2 ) NOT NULL,
    PaymentCreateDate TIMESTAMP DEFAULT NOW(),
    UserId INT NOT NULL,
    PRIMARY KEY (Payment_ID),
    FOREIGN KEY (UserId)
        REFERENCES User (UserId)
);

CREATE TABLE PayMethod (
    Paymethod_ID INT NOT NULL AUTO_INCREMENT,
    Card_Number CHAR(16) DEFAULT NULL,
    CVV_Number CHAR(3) DEFAULT NULL,
    ExpireDate DATE DEFAULT NULL,
    DefaultCard BOOL,
    AutoManual BOOL,
    UserId INT NOT NULL,
    Payment_ID INT,
    PRIMARY KEY (Paymethod_ID),
    FOREIGN KEY (UserId)
        REFERENCES User (UserId),
    FOREIGN KEY (Payment_ID)
        REFERENCES Payment (Payment_ID)
);

CREATE TABLE PayInformation (
    AccountNumber INT(10) UNSIGNED DEFAULT NULL,
    BranchNumber INT(8) UNSIGNED DEFAULT NULL,
    InstituteNumber INT(5) UNSIGNED DEFAULT NULL,
    PayMethod_ID INT(11) NOT NULL,
    PRIMARY KEY (PayMethod_ID),
    FOREIGN KEY (PayMethod_ID)
        REFERENCES PayMethod (Paymthod_ID)
        ON DELETE CASCADE
);

CREATE TABLE Application (
    ApplicationStatus ENUM('denied', 'review', 'sent', 'accepted', 'hired'),
    ApplicationDate TIMESTAMP DEFAULT NOW(),
    Job_ID INT NOT NULL,
    Candidate_ID INT NOT NULL,
    PRIMARY KEY (Job_ID , Candidate_ID),
    FOREIGN KEY (Job_ID)
        REFERENCES Job (Job_ID),
    FOREIGN KEY (Candidate_ID)
        REFERENCES Candidate (Candidate_ID)
);
