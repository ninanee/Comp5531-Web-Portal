-- i. Create/Delete/Edit/Display an Employer.
-- Create an Employer.
INSERT INTO User(Email, Address, Phone_Number, Password, Username)
VALUES('amazon@fakemail.ca','230 chemin du golf', 293123, 'amazon1211', 'amazon');

INSERT INTO Employer(Description, Name, Emoloyer_Balance, UserId, GenreEm)
VALUES('The most richest company in the World!', 'amazon', 1000.00, 26, 'Gold');

-- Delete an Employer.
DELETE FROM Employer 
WHERE
    Name = 'amazon';

-- Edit an Employer.
UPDATE Employer 
SET 
    Name = 'moneris001'
WHERE
    Name = 'moneris';

-- Display an specific Employer.
SELECT 
    *
FROM
    Employer
WHERE
    Name = 'DreamHome';

-- Display an random Employer.
SELECT 
    *
FROM
    Employer
ORDER BY Name
LIMIT 1;


-- ii. Create/Delete/Edit/Display a category by an Employer.
-- Create an Employer.
INSERT INTO User(Email, Address, Phone_Number, Password, Username)
VALUES('amazon001@fakemail.ca','210 chemin du golf', 73689, 'amazon453', 'amazon001');

INSERT INTO Employer(Description, Name, Emoloyer_Balance, UserId, GenreEm)
VALUES('The most richest company in the World!', 'amazon001', 1999.00, 27, 'Prime');
 
--  Delete a category by an Employer.
UPDATE Employer 
SET 
    GenreEm = NULL
WHERE
    Name = 'amazon001';

-- Edit a category by an Employer.
UPDATE Employer 
SET 
    GenreEm = 'Prime'
WHERE
    Name = 'amazon001';

-- Display an specific Employer.
SELECT 
    *
FROM
    Employer
WHERE
    Name = 'amazon001';

-- Display an random Employer.
SELECT 
    Employer_ID, Name, EmMembershipStartTime, GenreEm
FROM
    Employer
ORDER BY Name
LIMIT 1;


-- iii. Post a new job by an employer.
INSERT INTO Job (Vacancies, JobStatus, Title, Description, Location, PostEmployer_ID, GenreJob)
VALUES(1, '1', 'Product Manager', 'Looking for reliable person. 5 years experience', 'Montreal', 16, 'Technology');


-- iv. Provide a job offer for an employee by an employer.
INSERT INTO Application(ApplicationStatus, Job_ID, Candidate_ID)
VALUES('sent', 7, 5);

-- v. Report of a posted job by an employer (Job title and description, date posted, 
-- list of employees applied to the job and status of each application).
SELECT 
    Title,
    Description,
    Post_Date,
    CONCAT(FirstName, ' ', LastName) AS Candidate_Name,
    ApplicationStatus
FROM
    Job
        INNER JOIN
    Application ON Job.Job_ID = Application.Job_ID
        INNER JOIN
    Candidate ON Candidate.Candidate_ID = Application.Candidate_ID
WHERE
    Job.Title = 'Softwaer Engineer';

-- vi. Report of posted jobs by an employer during a specific period of time 
-- (Job title, date posted, short description of the job up to 50 characters, 
-- number of needed employees to the post, number of applied jobs to the post, number of accepted offers).

SELECT 
    *
FROM
    (SELECT 
        Employer.Name AS Company_Name,
            Title,
            Job.Description,
            Post_Date,
            Vacancies AS Needed_Employees,
            COUNT(Job.Title) AS Number_Applied
    FROM
        Job
    INNER JOIN Application ON Job.Job_ID = Application.Job_ID
    INNER JOIN Candidate ON Candidate.Candidate_ID = Application.Candidate_ID
    INNER JOIN Employer ON Employer.Employer_ID = Job.PostEmployer_ID
    WHERE
        PostEmployer_ID = 10
            AND Job.Title = 'Softwaer Engineer'
            AND (Post_Date BETWEEN '2021-08-10' AND '2021-08-13')
    GROUP BY Job.Title) a
        LEFT JOIN
    (SELECT 
            Title,
            COUNT(Job.Title) AS Number_Accepted
    FROM
        Job
    INNER JOIN Application ON Job.Job_ID = Application.Job_ID
    INNER JOIN Candidate ON Candidate.Candidate_ID = Application.Candidate_ID
    INNER JOIN Employer ON Employer.Employer_ID = Job.PostEmployer_ID
    WHERE
        PostEmployer_ID = 10
            AND Job.Title = 'Softwaer Engineer'
            AND (Post_Date BETWEEN '2021-08-10' AND '2021-08-13')
            AND ApplicationStatus = 'hired'
    GROUP BY Job.Title) b ON a.Title = b.Title;

-- vii. Create/Delete/Edit/Display an Employee.
-- Create an Employee.
INSERT INTO User(Email, Address, Phone_Number, Password, Username)
VALUES('billieeilish@fakemail.ca','23 Boulevard Leduc', 9732, 'controlalt12', 'billieeilish');

INSERT INTO Candidate(FirstName, LastName,Candidate_Balance, UserId, GenreCan)
VALUES('billie', 'eilish', 100.00, 28, 'Prime');

-- Delete/Edit/Display an Employee.
DELETE FROM Candidate 
WHERE
    FirstName = 'billie';

-- Edit an Employee Candidate.
UPDATE Candidate 
SET 
    FirstName = 'an'
WHERE
    FirstName = 'Lu';

-- Display an Employee.
SELECT 
    *
FROM
    Candidate
LIMIT 1;

-- viii. Search for a job by an employee.
SELECT 
    *
FROM
    Job
WHERE
    Title LIKE '%Soft%';

-- ix. Apply for a job by an employee.
INSERT INTO Application (ApplicationStatus, Job_ID, Candidate_ID)
VALUES ('sent',  5, 2);

-- x. Accept/Deny a job offer by an employee.
-- Accept a job offer by an employee.
UPDATE Application 
SET 
    ApplicationStatus = 'accepted'
WHERE
    Job_Id = 1 AND Candidate_ID = 2;

-- Deny a job offer by an employee.
UPDATE Application 
SET 
    ApplicationStatus = 'denied'
WHERE
    Job_Id = 7 AND Candidate_ID = 5;

-- xi. Withdraw from an applied job by an employee.
DELETE FROM Application 
WHERE
    Job_Id = 5 AND Candidate_ID = 2;

-- xii. Delete a profile by an employee.
DELETE FROM Application 
WHERE
    Candidate_ID = 3;

-- xiii. Report of applied jobs by an employee during a specific period of time (Job title, date applied, 
-- short description of the job up to 50 characters, status ofthe application).
SELECT 
    CONCAT(FirstName, ' ', LastName) AS Candidate_Name,
    Title,
    Job.Description,
    ApplicationDate,
    ApplicationStatus
FROM
    Job
        INNER JOIN
    Application ON Job.Job_ID = Application.Job_ID
        INNER JOIN
    Candidate ON Candidate.Candidate_ID = Application.Candidate_ID 
    AND ApplicationDate BETWEEN '2021-08-10' AND '2021-08-13';

-- xiv. Add/Delete/Edit a method of payment by a user.
--  Add a method of payment by a user.
INSERT INTO Payment(Amount, UserId)
VALUES(9.99, 28);

INSERT INTO PayMenthod(Card_Number, CVV_Number, ExpireDate, UserId, Payment_ID)
VALUES('3408903649121104', '234', '2022-10-8',  '28', '6');

INSERT INTO PadInformation(AccountNumber, BranchNumber, InstituteNumber, PayMethod_ID)
VALUES('10707722', '646', '43652', 7);

-- Delete a method of payment by a user.
DELETE FROM PadInformation 
WHERE
    PayMethod_ID = 6;

DELETE FROM PayMenthod 
WHERE
    Card_Number = '3408903649121103';

-- Edit a method of payment by a user. set a method to default
UPDATE PayMenthod 
SET 
    DefaultCard = '1'
WHERE
    Paymthod_ID = 7;

-- Edit a method of payment by a user. Update card in parent table and the information in child table
UPDATE PayMenthod 
SET 
    Card_Number = '3912563770299641'
WHERE
    Paymthod_ID IN (SELECT 
            PadInformation.PayMethod_ID
        FROM
            PadInformation
        WHERE
            Paymthod_ID = 5);

-- xv. Add/Delete/Edit an automatic payment by a user.
-- Add an automatic payment by a user.
INSERT INTO PayMenthod(Card_Number, CVV_Number, ExpireDate, UserId, AutoManual, Payment_ID)
VALUES('3912563770299333', '333', '2023-09-03', 28, '1', 6);

-- Delete an automatic payment by a user.
DELETE FROM PayMenthod 
WHERE
    Card_Number = '3912563770299333'
    AND AutoManual = '1';

-- Edit an automatic payment by a user.
UPDATE PayMenthod 
SET 
    AutoManual = '1'
WHERE
    Card_Number = '2367543968494094';

-- xvi. Make a manual payment by a user.
-- Prime Job Seeker payment
UPDATE Candidate
SET Candidate_Balance = Candidate_Balance - 10
WHERE FirstName = 'West';

-- other way, choose the one whose PayMenthod is not automatic
UPDATE PayMenthod 
SET 
    AutoManual = '0'
WHERE
    Card_Number = '3408903649121109';


UPDATE Candidate c 
SET 
    c.Candidate_Balance = c.Candidate_Balance - (SELECT 
            Payment.Amount
        FROM
            PayMenthod
                INNER JOIN
            Payment ON Payment.UserId = PayMenthod.UserId
        WHERE
            Card_Number = '3408903649121109'
                AND AutoManual = '0')
WHERE
    c.UserId = 11;

 
-- xvii. Report of all users by the administrator for employers or employees (Name, email, category, 
-- status, balance.
SELECT 
    CONCAT(FirstName, ' ', LastName) AS Name,
    Email,
    GenreCan,
    CandidateStatus,
    Candidate_Balance
FROM
    Candidate
        JOIN
    User ON User.UserId = Candidate.UserId 
UNION SELECT 
    Name, Email, GenreEm, EmployerStatus, Emoloyer_Balance
FROM
    Employer
        JOIN
    User ON User.UserId = Employer.UserId;

-- xviii. Report of all outstanding balance accounts (User name, email, balance, since when the account is suffering).
SELECT 
    CONCAT(FirstName, ' ', LastName) AS Name,
    Email,
    Candidate_Balance,
    CandidateStatus,
    FrozenTime
FROM
    Candidate
        INNER JOIN
    User ON User.UserId = Candidate.UserId
WHERE
    CandidateStatus = 'Suffering' 
UNION SELECT 
    Name, Email, Emoloyer_Balance, EmployerStatus, FrozenTime
FROM
    Employer
        JOIN
    User ON User.UserId = Employer.UserId
WHERE
    EmployerStatus = 'Suffering';
    
