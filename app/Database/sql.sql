---------- Create the database  -------
CREATE DATABASE seralance_db;

----Set the default char set encoding of the database to udf 8
ALTER DATABASE dbname CHARACTER SET utf8 COLLATE utf8_general_ci;

---- Create the tables --------

CREATE TABLE USER(
	username VARCHAR(30) ,
    password  VARCHAR(32) NOT NULL,
    email     VARCHAR(320) NOT NULL,
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
	username VARCHAR(30),
 	role VARCHAR(100) NOT NULL   
);

CREATE TABLE permission(
	username VARCHAR(30),
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
	dispute_id INT,
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
	file_url VARCHAR(255),
    file_name VARCHAR(100) NOT NULL,
    dispute_id int NOT NULL
);

CREATE TABLE ticket(
	ticket_id INT,
    opened_date DATETIME NOT NULL,
    status VARCHAR(30) NOT NULL,
    subject VARCHAR(50) NOT NULL,
    message VARCHAR(1000) NOT NULL,
    closed_date DATETIME,
    reply VARCHAR(1000),
    reviewed_by VARCHAR(30)
);

CREATE TABLE ticket_file_attachement(
	file_url VARCHAR(255),
    file_name VARCHAR(100) NOT NULL,
    ticket_id int NOT NULL
);

CREATE TABLE notification(
	notification_id INT,
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
	request_id INT,
    requester VARCHAR(30) NOT NULL,
    datetime DATETIME NOT NULL,
    amount FLOAT NOT NULL,
    status VARCHAR(30) NOT NULL,
    type VARCHAR(30) NOT NULL,
    processed_date DATETIME,
    processed_by VARCHAR(30)
);

CREATE TABLE service_provider(
	username VARCHAR(30),
    education VARCHAR(30) NOT NULL,
 	experience VARCHAR(30) NOT NULL,
    bank_name VARCHAR(30) NOT NULL,
    account_number VARCHAR(30) NOT NULL,
    wallet_balance FLOAT NOT NULL,
    summary VARCHAR(1000) NOT NULL,
    profile_photo VARCHAR(255)
);


CREATE TABLE portfolio(
	portfolio_id INT,
    portfolio_url VARCHAR(2000) NOT NULL,
    username VARCHAR(30) NOT NULL
);

CREATE TABLE provider_language(
    username VARCHAR(30),
    language_id INT
);

CREATE TABLE language (
	language_id INT,
    language_name VARCHAR(30) NOT NULL
);

CREATE TABLE provider_skill(
    username VARCHAR(30),
    skill_id INT
);

CREATE TABLE skill (
	skill_id INT,
    skill_name VARCHAR(30) NOT NULL,
    skill_category VARCHAR(30) NOT NULL
);

CREATE TABLE rate(
	rate_id INT,
    rater VARCHAR(30) NOT NULL,
    ratee VARCHAR(30) NOT NULL,
    score INT NOT NULL,
    comment VARCHAR(255) NOT NULL,
    date DATETIME NOT NULL
);

CREATE TABLE service_seeker(
	username VARCHAR(30),
    bank_name VARCHAR(30) NOT NULL,
    account_number VARCHAR(30) NOT NULL,
    wallet_balance FLOAT NOT NULL,
    profile_photo VARCHAR(255)
);

CREATE TABLE project(
	project_id INT,
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
	file_url VARCHAR(255),
    file_name VARCHAR(100) NOT NULL,
    project_id int NOT NULL
);

CREATE TABLE project_skill(
    project_id INT,
    skill_id INT
);

CREATE TABLE payment(
	payment_id INT,
    amount FLOAT NOT NULL,
    issued_date DATETIME NOT NULL,
    paid_date DATETIME,
    payment_method VARCHAR(30),
    paid_by VARCHAR(30) NOT NULL,
    project_id INT NOT NULL
);

CREATE TABLE bid(
	bid_id INT,
    bid_date DATETIME NOT NULL,
    price FLOAT NOT NULL,
    cover_letter VARCHAR(1000),
    status VARCHAR(30) NOT NULL,
    made_by VARCHAR(30) NOT NULL,
    project_id INT NOT NULL
);

CREATE TABLE bid_file_attachement(
	file_url VARCHAR(255),
    file_name VARCHAR(100) NOT NULL,
    bid_id int NOT NULL
);

CREATE TABLE faq(
	faq_id INT,
    question VARCHAR(255) NOT NULL,
    answer VARCHAR(255) NOT NULL,
    category VARCHAR(30) NOT NULL
);

CREATE TABLE policy(
	policy_id INT,
    name VARCHAR(30) NOT NULL,
    file VARCHAR(255) NOT NULL
);