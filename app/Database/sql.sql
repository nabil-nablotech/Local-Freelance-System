---------- Create the database  -------
CREATE DATABASE seralance_db;

----Set the default char set encoding of the database to udf 8
ALTER DATABASE dbname CHARACTER SET utf8 COLLATE utf8_general_ci;

---- Create the tables --------

CREATE TABLE `USER`(
	username VARCHAR(30) PRIMARY KEY,
    password  VARCHAR(32) NOT NULL,
    email     VARCHAR(320) UNIQUE NOT NULL,
    firstname  VARCHAR(30) NOT NULL,
    lastname  VARCHAR(30) NOT NULL,
    gender  CHAR(1) NOT NULL,
    mobile_number  VARCHAR(14) NOT NULL,
    nationality  VARCHAR(30) NOT NULL,
    country  VARCHAR(30) NOT NULL,
    city  VARCHAR(30) NOT NULL,
    address  VARCHAR(30) NOT NULL,
    join_date  datetime NOT NULL,
    last_login  datetime NOT NULL,
    user_type  VARCHAR(30) NOT NULL,
    status VARCHAR(30) NOT NULL
); 

CREATE TABLE admin(
	username VARCHAR(30) PRIMARY KEY,
 	role VARCHAR(100) NOT NULL   
);

CREATE TABLE permission(
	username VARCHAR(30) PRIMARY KEY,
 	user_management BOOLEAN NOT NULL,
    project_management BOOLEAN NOT NULL,
    notification_management BOOLEAN NOT NULL,
    transcation BOOLEAN NOT NULL,
    dispute_management BOOLEAN NOT NULL,
    ticket_management BOOLEAN NOT NULL,
    policy_drafting BOOLEAN NOT NULL,
    faq_drafting BOOLEAN
);

CREATE TABLE dispute(
	dispute_id INT AUTO_INCREMENT PRIMARY KEY,
    dispute_date DATETIME NOT NULL,
    status VARCHAR(30) NOT NULL,
    explanation VARCHAR(1000) NOT NULL,
    review_date DATETIME,
    decision VARCHAR(1000),
    raised_by VARCHAR(30) NOT NULL,
    reviewed_by VARCHAR(30),
    project_id int NOT NULL
);

CREATE TABLE dispute_file_attachement(
	file_url VARCHAR(255) PRIMARY KEY,
    file_name VARCHAR(100) NOT NULL,
    dispute_id int NOT NULL
);

CREATE TABLE ticket(
	ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    opened_date DATETIME NOT NULL,
    status VARCHAR(30) NOT NULL,
    subject VARCHAR(50) NOT NULL,
    message VARCHAR(1000) NOT NULL,
    closed_date DATETIME,
    reply VARCHAR(1000),
    opened_by VARCHAR(30) NOT NULL,
    reviewed_by VARCHAR(30)
);

CREATE TABLE ticket_file_attachement(
	file_url VARCHAR(255) PRIMARY KEY, 
    file_name VARCHAR(100) NOT NULL,
    ticket_id int NOT NULL
);

CREATE TABLE notification(
	notification_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    content VARCHAR(240) NOT NULL,
    datetime DATETIME NOT NULL,
    status VARCHAR(30) NOT NULL,
    recipient VARCHAR(30) NOT NULL,
    url VARCHAR(255),
    opened_by_recipient BOOLEAN NOT NULL,
    admin_id VARCHAR(30)
);

CREATE TABLE transfer_request(
	request_id INT AUTO_INCREMENT PRIMARY KEY,
    requester VARCHAR(30) NOT NULL,
    datetime DATETIME NOT NULL,
    amount FLOAT NOT NULL,
    status VARCHAR(30) NOT NULL,
    type VARCHAR(30) NOT NULL,
    processed_date DATETIME,
    processed_by VARCHAR(30)
);

CREATE TABLE service_provider(
	username VARCHAR(30) PRIMARY KEY,
    education VARCHAR(30) NOT NULL,
 	experience VARCHAR(30) NOT NULL,
    bank_name VARCHAR(30) NOT NULL,
    account_number VARCHAR(30) NOT NULL,
    wallet_balance FLOAT NOT NULL,
    summary VARCHAR(1000) NOT NULL,
    profile_photo VARCHAR(255)
);


CREATE TABLE portfolio(
	portfolio_id INT AUTO_INCREMENT PRIMARY KEY,
    portfolio_url VARCHAR(2000) NOT NULL,
    username VARCHAR(30) NOT NULL
);

CREATE TABLE provider_language(
    username VARCHAR(30),
    language_id INT,
    PRIMARY KEY (username,language_id)
);

CREATE TABLE language (
	language_id INT AUTO_INCREMENT PRIMARY KEY,
    language_name VARCHAR(30) NOT NULL
);

CREATE TABLE provider_skill(
    username VARCHAR(30),
    skill_id INT,
    PRIMARY KEY (username,skill_id)
);

CREATE TABLE skill (
	skill_id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(30) NOT NULL,
    skill_category VARCHAR(30) NOT NULL
);

CREATE TABLE rate(
	rate_id INT AUTO_INCREMENT PRIMARY KEY,
    rater VARCHAR(30) NOT NULL,
    ratee VARCHAR(30) NOT NULL,
    score INT NOT NULL,
    comment VARCHAR(255) NOT NULL,
    date DATETIME NOT NULL
);

CREATE TABLE service_seeker(
	username VARCHAR(30) PRIMARY KEY,
    bank_name VARCHAR(30) NOT NULL,
    account_number VARCHAR(30) NOT NULL,
    wallet_balance FLOAT NOT NULL,
    profile_photo VARCHAR(255)
);

CREATE TABLE project(
	project_id INT AUTO_INCREMENT PRIMARY KEY,
    announced_date DATETIME NOT NULL,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(3000) NOT NULL,
    budget_min FLOAT NOT NULL,
    budget_max FLOAT NOT NULL,
    price FLOAT,
    offer_type VARCHAR(30) NOT NULL,
    status VARCHAR(30) NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME,
    announced_by VARCHAR(30) NOT NULL,
    assigned_to VARCHAR(30)
);

CREATE TABLE project_file_attachement(
	file_url VARCHAR(255) PRIMARY KEY,
    file_name VARCHAR(100) NOT NULL,
    project_id int NOT NULL
);

CREATE TABLE project_skill(
    project_id INT,
    skill_id INT,
    PRIMARY KEY (project_id,skill_id)
);

CREATE TABLE payment(
	payment_id INT AUTO_INCREMENT PRIMARY KEY,
    amount FLOAT NOT NULL,
    issued_date DATETIME NOT NULL,
    paid_date DATETIME,
    payment_method VARCHAR(30),
    paid_by VARCHAR(30) NOT NULL,
    project_id INT NOT NULL
);

CREATE TABLE bid(
	bid_id INT AUTO_INCREMENT PRIMARY KEY,
    bid_date DATETIME NOT NULL,
    price FLOAT NOT NULL,
    cover_letter VARCHAR(1000),
    status VARCHAR(30) NOT NULL,
    made_by VARCHAR(30) NOT NULL,
    project_id INT NOT NULL
);

CREATE TABLE bid_file_attachement(
	file_url VARCHAR(255) PRIMARY KEY,
    file_name VARCHAR(100) NOT NULL,
    bid_id int NOT NULL
);

CREATE TABLE faq(
	faq_id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    answer VARCHAR(255) NOT NULL,
    category VARCHAR(30) NOT NULL
);

CREATE TABLE policy(
	policy_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    file VARCHAR(255) NOT NULL
);

CREATE TABLE transaction(
	transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(30) NOT NULL,
    detail VARCHAR(240) NOT NULL,
    amount FLOAT NOT NULL,
    date DATETIME NOT NULL,
    username VARCHAR(30) NOT NULL
);

CREATE TABLE message(
	message_id INT AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(30) NOT NULL,
    receiver VARCHAR(30) NOT NULL,
    content VARCHAR(30000) NOT NULL,
    datetime DATETIME NOT NULL,
    opened_by_receiver BOOLEAN NOT NULL
);

---  Setting  foreign keys for the tables-----

ALTER TABLE admin
ADD CONSTRAINT FK_AdminUser_username
FOREIGN KEY (username) REFERENCES user(username);



ALTER TABLE service_provider
ADD CONSTRAINT FK_Service_providerUser_username
FOREIGN KEY (username) REFERENCES user(username);



ALTER TABLE service_seeker
ADD CONSTRAINT FK_Service_seekerUser_username
FOREIGN KEY (username) REFERENCES user(username);



ALTER TABLE project
ADD CONSTRAINT FK_ProjectService_seeker_announced_by
FOREIGN KEY (announced_by) REFERENCES service_seeker(username);

ALTER TABLE project
ADD CONSTRAINT FK_ProjectService_provider_assigned_to
FOREIGN KEY (assigned_to) REFERENCES service_provider(username);



ALTER TABLE permission
ADD CONSTRAINT FK_PermissionAdmin_username
FOREIGN KEY (username) REFERENCES admin(username);



ALTER TABLE transfer_request
ADD CONSTRAINT FK_Transfer_requestUser_requester
FOREIGN KEY (requester) REFERENCES user(username);

ALTER TABLE transfer_request
ADD CONSTRAINT FK_Transfer_requestAdmin_processed_by
FOREIGN KEY (processed_by) REFERENCES admin(username);



ALTER TABLE portfolio
ADD CONSTRAINT FK_PortfolioService_provider_username
FOREIGN KEY (username) REFERENCES service_provider(username);



ALTER TABLE provider_language
ADD CONSTRAINT FK_Provider_languageService_provider_username
FOREIGN KEY (username) REFERENCES service_provider(username);

ALTER TABLE provider_language
ADD CONSTRAINT FK_Provider_languageLanguage_language_id
FOREIGN KEY (language_id) REFERENCES language(language_id);



ALTER TABLE provider_skill
ADD CONSTRAINT FK_Provider_skillService_provider_username
FOREIGN KEY (username) REFERENCES service_provider(username);

ALTER TABLE provider_skill
ADD CONSTRAINT FK_Provider_skillSkill_skill_id
FOREIGN KEY (skill_id) REFERENCES skill(skill_id);



ALTER TABLE project_skill
ADD CONSTRAINT FK_Project_skillProject_project_id
FOREIGN KEY (project_id) REFERENCES project(project_id);

ALTER TABLE project_skill
ADD CONSTRAINT FK_Project_skillSkill_skill_id
FOREIGN KEY (skill_id) REFERENCES skill(skill_id);



ALTER TABLE payment
ADD CONSTRAINT FK_PaymentService_seeker_paid_by
FOREIGN KEY (paid_by) REFERENCES service_seeker(username);

ALTER TABLE payment
ADD CONSTRAINT FK_PaymentProject_project_id
FOREIGN KEY (project_id) REFERENCES project(project_id);



ALTER TABLE bid
ADD CONSTRAINT FK_BidService_provider_made_by
FOREIGN KEY (made_by) REFERENCES service_provider(username);

ALTER TABLE bid
ADD CONSTRAINT FK_BidProject_project_id
FOREIGN KEY (project_id) REFERENCES project(project_id);



ALTER TABLE dispute
ADD CONSTRAINT FK_DisputeUser_raised_by
FOREIGN KEY (raised_by) REFERENCES user(username);

ALTER TABLE dispute
ADD CONSTRAINT FK_DisputeAdmin_reviewed_by
FOREIGN KEY (reviewed_by) REFERENCES admin(username);

ALTER TABLE dispute
ADD CONSTRAINT FK_DisputeProject_project_id
FOREIGN KEY (project_id) REFERENCES project(project_id);



ALTER TABLE ticket
ADD CONSTRAINT FK_TicketUser_opened_by
FOREIGN KEY (opened_by) REFERENCES user(username);

ALTER TABLE ticket
ADD CONSTRAINT FK_TicketAdmin_reviewed_by
FOREIGN KEY (reviewed_by) REFERENCES admin(username);



ALTER TABLE notification
ADD CONSTRAINT FK_NotificationUser_recipient
FOREIGN KEY (recipient) REFERENCES user(username);

ALTER TABLE notification
ADD CONSTRAINT FK_NotificationAdmin_admin_id
FOREIGN KEY (admin_id) REFERENCES admin(username);



ALTER TABLE message
ADD CONSTRAINT FK_MessageUser_sender
FOREIGN KEY (sender) REFERENCES user(username);

ALTER TABLE message
ADD CONSTRAINT FK_MessageUser_receiver
FOREIGN KEY (receiver) REFERENCES user(username);



ALTER TABLE transaction
ADD CONSTRAINT FK_TransactionUser_username
FOREIGN KEY (username) REFERENCES user(username);



ALTER TABLE rate
ADD CONSTRAINT FK_RateService_seeker_rater
FOREIGN KEY (rater) REFERENCES service_seeker(username);



ALTER TABLE dispute_file_attachement
ADD CONSTRAINT FK_Dispute_file_attachementDispute_dispute_id
FOREIGN KEY (dispute_id) REFERENCES dispute(dispute_id);

ALTER TABLE ticket_file_attachement
ADD CONSTRAINT FK_Ticket_file_attachementTicket_ticket_id
FOREIGN KEY (ticket_id) REFERENCES ticket(ticket_id);

ALTER TABLE bid_file_attachement
ADD CONSTRAINT FK_Bid_file_attachementBid_bid_id
FOREIGN KEY (bid_id) REFERENCES bid(bid_id);

ALTER TABLE project_file_attachement
ADD CONSTRAINT FK_Project_file_attachementProject_project_id
FOREIGN KEY (project_id) REFERENCES project(project_id);