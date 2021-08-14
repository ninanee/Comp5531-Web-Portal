insert into User(Email, Address, Phone_Number, Password, Username)
values('AlshaMehmet79@fakemail.ca','596 Montreal Rd', 4387403, 'yard302', 'Alsha'),
('LuZeke30@fakemail.ca','1310 Saint-Catherine St W', 514172, 'astrologer059','Zeke'),
('WestThoa86@fakemail.ca','3035 Bd le Carr Unit T014', 45044, 'entrance167', 'Thoa'),
('ChengKristopher30@fakemail.ca','Quartier DIX30, 9160 Boulevard Leduc', 514665, 'maiden343', 'Kristopher'),
('SelindaMichea92@fakemail.ca','Bd des Promenades', 514556, 'codepage941', 'Selinda'),
('Capitalcorp@fakemail.ca','Montreal Rd', 293424, 'good-bye318', 'Capitalcorp'),
('DreamHome@fakemail.ca','13143 Saint-Catherine St W', 32524525, 'widow276','DreamHome'),
('ElectronicsSource@fakemail.ca',' Bd le Carr Unit T034', 24543, 'passion714', 'ElectronicsSource'),
('Incluesiv@fakemail.ca','Quartier DIX30, 983 Boulevard Leduc', 45234, 'consistency571', 'Incluesiv'),
('moneris@fakemail.ca','232 Bd des Promenades', 34323, 'lunchroom383', 'moneris'),
('Nikolaus_Dulcie@fakemail.ca','102 Saint-Catherine St W', 45034, 'license395','Dulcie'),
('Edison_Federico97@fakemail.ca','5sdds6 Montreal Rd', 3410533, 'disposer710', 'Federico97'),
('Ena_Niasha42@fakemail.ca','Montreal Rd', 92896823, 'religion467', 'Ena_Niasha42'),
('Bobby_Hari44@fakemail.ca','Montreal Rd 230', 98823124, 'religion23167', 'Bobby_Hari023'),
('Jaramie_Braylon41@fakemail.ca','231 Montreal Rd 230', 773461, 'beef386', 'Jaramie_Braylon4');


insert into EmployerMembership(Genre, MonthlyFee, MaxJobPost)
values('Prime', 50, 5 ),
('Gold', 100, 100000000);


insert into CandidateMembership(Genre, MonthlyFee, MaxJobApply)
values('Basic', 0, 0 ),
('Prime', 10, 5 ),
('Gold', 20, 100000000);

insert into Employer(Description, Name, Emoloyer_Balance, UserId, GenreEm)
values('As one of Canada’s leading payment providers, we’re proud of our achievements', 
'moneris', 999.22, 20, 'Gold'),
('We have a payment solution for every type of business in every industry.', 
'ElectronicsSource', 0.00, 18, 'Prime'),
('We re pleased to offer complimentary consultation services.', 
'DreamHome', 0.00, 17, 'Prime'),
('We provide the best services.', 
'Capitalcorp', 12.12, 16, 'Gold'),
('Vital Perfection LiftDefine Radiance Serum visibly improves dullness.', 
'Incluesiv', 1.00, 19, 'Gold');

insert into Candidate(FirstName, LastName,Candidate_Balance, UserId, GenreCan)
values('Alsha', 'Mehmet',  10.00, 11, 'Gold'),
('Lu', 'ke30',  120.20, 12, 'Gold'),
('West', 'Thoa',  0.00, 13, 'Prime'),
('Cheng', 'Kristopher',  3.00, 14, 'Prime'),
('Selinda', 'Micheal',  3.00, 15, null);

insert into JobCategory(Genre, Name)
values('Business', 'Business Management and Administration'),
('Agriculture', 'Agriculture and Natural Resources'),
('Technology', 'Science, Technology, Engineering, and Mathematics'),
('Government', 'Public Administration'),
('Marketing', 'Sales and Service');

insert into Admin(FirstName, LastName, UserID)
values('Nikolaus', 'Dulcie', 21),('Edison', 'Federico', 22),
('Ena', 'Niasha', 23),
('Bobby', 'Hari', 24),
('Jaramie', 'Braylon', 25);

insert into Job(Vacancies, JobStatus, Title, Description, Location, PostEmployer_ID, GenreJob)
values(5, '1', 'Softwaer Engineer',  'Looking for fairness person. 4 years experience.', 'Montreal', 10, 'Technology'),
(1, '0', 'Product Manager',  '10 years experience.', 'Vancouver', 10, 'Technology'),
(3, '1', 'Commercial Sales Consultant',  '1 years experience.', 'Montreal', 12, 'Marketing'),
(10, '1', 'Financial-Aids Officer',  '5 years experience.', 'Montreal', 13, 'Government'),
(1, '0', 'Manager',  '10 years experience.', 'Montreal', 14, 'Agriculture');

insert into Payment(Amount, UserId)
values(99.99, 11),
(50, 12),
(100, 20),
(100, 23),
(2319.12, 12);

insert into PayMenthod(Card_Number, CVV_Number, ExpireDate, UserId, Payment_ID)
values('3408903649121104', '244', '2022-10-8',  '11', '1'),
('3912563770299646', '234', '2023-09-08',  '12', '2'),
('2367543968494094', '234', '2022-1-20',  '20', '3'),
('2376350678393988', '234', '2022-1-23',  '23', '4'),
('3912563770299646', '244', '2023-09-08',  '12', '5');

insert into PadInformation(AccountNumber, BranchNumber, InstituteNumber, PayMethod_ID)
values('1070771', '336', '43108', 1),
('5832544', '621', '77141',2),
('0125877', '548', '89729', 3),
('9290950', '004', '38360',4),
('2205581', '270', '98983', 5);

insert into Application (ApplicationStatus, Job_ID, Candidate_ID)
values('hired', 1, 1),
('review', 1, 2),
('sent', 2, 3),
('accepted', 3, 4),
('accepted', 4, 5);


