---------- Create the database  -------
CREATE DATABASE seralance_db;

--------- USE DATABASE -------------------
USE seralance_db;

----Set the default char set encoding of the database to udf 8
ALTER DATABASE seralance_db CHARACTER SET utf8 COLLATE utf8_general_ci;

---- Create the tables --------

CREATE TABLE `user`(
	username VARCHAR(60) PRIMARY KEY,
    password  VARCHAR(255) NOT NULL,
    email     VARCHAR(320) UNIQUE NOT NULL,
    firstname  VARCHAR(60) NOT NULL,
    lastname  VARCHAR(60) NOT NULL,
    gender  CHAR(1) NOT NULL,
    mobile_number  VARCHAR(14) NOT NULL,
    nationality  VARCHAR(60) NOT NULL,
    country  VARCHAR(60) NOT NULL,
    city  VARCHAR(60) NOT NULL,
    address  VARCHAR(60) NOT NULL,
    join_date  datetime NOT NULL,
    last_login  datetime NOT NULL,
    user_type  VARCHAR(60) NOT NULL,
    status VARCHAR(60) NOT NULL
); 

CREATE TABLE admin(
	username VARCHAR(60) PRIMARY KEY,
 	role VARCHAR(100) NOT NULL   
);

CREATE TABLE permission(
	username VARCHAR(60) PRIMARY KEY,
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
    status VARCHAR(60) NOT NULL,
    explanation VARCHAR(1000) NOT NULL,
    review_date DATETIME,
    decision VARCHAR(1000),
    raised_by VARCHAR(60) NOT NULL,
    reviewed_by VARCHAR(60),
    file VARCHAR(255) NOT NULL,
    project_id int NOT NULL
);

CREATE TABLE ticket(
	ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    opened_date DATETIME NOT NULL,
    status VARCHAR(60) NOT NULL,
    subject VARCHAR(50) NOT NULL,
    message VARCHAR(1000) NOT NULL,
    closed_date DATETIME,
    reply VARCHAR(1000),
    opened_by VARCHAR(60) NOT NULL,
    file VARCHAR(255) NOT NULL,
    reviewed_by VARCHAR(60)
);

CREATE TABLE notification(
	notification_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(60) NOT NULL,
    content VARCHAR(240) NOT NULL,
    datetime DATETIME NOT NULL,
    status VARCHAR(60) NOT NULL,
    recipient VARCHAR(60) NOT NULL,
    url VARCHAR(255),
    opened_by_recipient BOOLEAN NOT NULL,
    admin_id VARCHAR(60)
);

CREATE TABLE transfer_request(
	request_id INT AUTO_INCREMENT PRIMARY KEY,
    requester VARCHAR(60) NOT NULL,
    datetime DATETIME NOT NULL,
    amount FLOAT NOT NULL,
    status VARCHAR(60) NOT NULL,
    type VARCHAR(60) NOT NULL,
    processed_date DATETIME,
    processed_by VARCHAR(60)
);

CREATE TABLE service_provider(
	username VARCHAR(60) PRIMARY KEY,
    education VARCHAR(60) NOT NULL,
 	experience VARCHAR(60) NOT NULL,
    bank_name VARCHAR(60) NOT NULL,
    account_number VARCHAR(60) NOT NULL,
    wallet_balance FLOAT NOT NULL,
    summary VARCHAR(1000) NOT NULL,
    profile_photo VARCHAR(255)
);


CREATE TABLE portfolio(
	portfolio_id INT AUTO_INCREMENT PRIMARY KEY,
    portfolio_url VARCHAR(2000) NOT NULL,
    username VARCHAR(60) NOT NULL
);

CREATE TABLE provider_language(
    username VARCHAR(60),
    language_id INT,
    PRIMARY KEY (username,language_id)
);

CREATE TABLE language (
	language_id INT AUTO_INCREMENT PRIMARY KEY,
    language_name VARCHAR(60) NOT NULL
);

CREATE TABLE provider_skill(
    username VARCHAR(60),
    skill_id INT,
    PRIMARY KEY (username,skill_id)
);

CREATE TABLE skill (
	skill_id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(60) NOT NULL,
    skill_category VARCHAR(60) NOT NULL
);

CREATE TABLE rate(
	rate_id INT AUTO_INCREMENT PRIMARY KEY,
    rater VARCHAR(60) NOT NULL,
    ratee VARCHAR(60) NOT NULL,
    score INT NOT NULL,
    comment VARCHAR(255) NOT NULL,
    date DATETIME NOT NULL
);

CREATE TABLE service_seeker(
	username VARCHAR(60) PRIMARY KEY,
    bank_name VARCHAR(60) NOT NULL,
    account_number VARCHAR(60) NOT NULL,
    wallet_balance FLOAT NOT NULL,
    profile_photo VARCHAR(255)
);

CREATE TABLE project(
	project_id INT AUTO_INCREMENT PRIMARY KEY,
    announced_date DATETIME NOT NULL,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    description VARCHAR(3000) NOT NULL,
    budget_min FLOAT NOT NULL,
    budget_max FLOAT NOT NULL,
    price FLOAT,
    offer_type VARCHAR(60) NOT NULL,
    status VARCHAR(60) NOT NULL,
    start_date DATETIME,
    end_date DATETIME,
    announced_by VARCHAR(60) NOT NULL,
    file VARCHAR(255),
    delivered_file VARCHAR(255),
    assigned_to VARCHAR(60)
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
    payment_method VARCHAR(60),
    paid_by VARCHAR(60) NOT NULL,
    project_id INT NOT NULL
);

CREATE TABLE bid(
	bid_id INT AUTO_INCREMENT PRIMARY KEY,
    bid_date DATETIME NOT NULL,
    price FLOAT NOT NULL,
    cover_letter VARCHAR(1000),
    status VARCHAR(60) NOT NULL,
    made_by VARCHAR(60) NOT NULL,
    project_id INT NOT NULL
);

CREATE TABLE faq(
	faq_id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    answer VARCHAR(255) NOT NULL,
    category VARCHAR(60) NOT NULL
);

CREATE TABLE policy(
	policy_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    file VARCHAR(255) NOT NULL
);

CREATE TABLE transaction(
	transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(60) NOT NULL,
    detail VARCHAR(240) NOT NULL,
    amount FLOAT NOT NULL,
    date DATETIME NOT NULL,
    username VARCHAR(60) NOT NULL
);

CREATE TABLE message(
	message_id INT AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(60) NOT NULL,
    receiver VARCHAR(60) NOT NULL,
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


---- Insert languages into the language table --------
INSERT INTO language(language_name) VALUES ('Abkhazian');
INSERT INTO language(language_name) VALUES ('Achinese');
INSERT INTO language(language_name) VALUES ('Acoli');
INSERT INTO language(language_name) VALUES ('Adangme');
INSERT INTO language(language_name) VALUES ('Adyghe');
INSERT INTO language(language_name) VALUES ('Afar');
INSERT INTO language(language_name) VALUES ('Afrihili');
INSERT INTO language(language_name) VALUES ('Afrikaans');
INSERT INTO language(language_name) VALUES ('Aghem');
INSERT INTO language(language_name) VALUES ('Ainu');
INSERT INTO language(language_name) VALUES ('Akan');
INSERT INTO language(language_name) VALUES ('Akkadian');
INSERT INTO language(language_name) VALUES ('Akoose');
INSERT INTO language(language_name) VALUES ('Alabama');
INSERT INTO language(language_name) VALUES ('Albanian');
INSERT INTO language(language_name) VALUES ('Aleut');
INSERT INTO language(language_name) VALUES ('Algerian Arabic');
INSERT INTO language(language_name) VALUES ('American English');
INSERT INTO language(language_name) VALUES ('American Sign Language');
INSERT INTO language(language_name) VALUES ('Amharic');
INSERT INTO language(language_name) VALUES ('Ancient Egyptian');
INSERT INTO language(language_name) VALUES ('Ancient Greek');
INSERT INTO language(language_name) VALUES ('Angika');
INSERT INTO language(language_name) VALUES ('Ao Naga');
INSERT INTO language(language_name) VALUES ('Arabic');
INSERT INTO language(language_name) VALUES ('Aragonese');
INSERT INTO language(language_name) VALUES ('Aramaic');
INSERT INTO language(language_name) VALUES ('Araona');
INSERT INTO language(language_name) VALUES ('Arapaho');
INSERT INTO language(language_name) VALUES ('Arawak');
INSERT INTO language(language_name) VALUES ('Armenian');
INSERT INTO language(language_name) VALUES ('Aromanian');
INSERT INTO language(language_name) VALUES ('Arpitan');
INSERT INTO language(language_name) VALUES ('Assamese');
INSERT INTO language(language_name) VALUES ('Asturian');
INSERT INTO language(language_name) VALUES ('Asu');
INSERT INTO language(language_name) VALUES ('Atsam');
INSERT INTO language(language_name) VALUES ('Australian English');
INSERT INTO language(language_name) VALUES ('Austrian German');
INSERT INTO language(language_name) VALUES ('Avaric');
INSERT INTO language(language_name) VALUES ('Avestan');
INSERT INTO language(language_name) VALUES ('Awadhi');
INSERT INTO language(language_name) VALUES ('Aymara');
INSERT INTO language(language_name) VALUES ('Azerbaijani');
INSERT INTO language(language_name) VALUES ('Badaga');
INSERT INTO language(language_name) VALUES ('Bafia');
INSERT INTO language(language_name) VALUES ('Bafut');
INSERT INTO language(language_name) VALUES ('Bakhtiari');
INSERT INTO language(language_name) VALUES ('Balinese');
INSERT INTO language(language_name) VALUES ('Baluchi');
INSERT INTO language(language_name) VALUES ('Bambara');
INSERT INTO language(language_name) VALUES ('Bamun');
INSERT INTO language(language_name) VALUES ('Banjar');
INSERT INTO language(language_name) VALUES ('Basaa');
INSERT INTO language(language_name) VALUES ('Bashkir');
INSERT INTO language(language_name) VALUES ('Basque');
INSERT INTO language(language_name) VALUES ('Batak Toba');
INSERT INTO language(language_name) VALUES ('Bavarian');
INSERT INTO language(language_name) VALUES ('Beja');
INSERT INTO language(language_name) VALUES ('Belarusian');
INSERT INTO language(language_name) VALUES ('Bemba');
INSERT INTO language(language_name) VALUES ('Bena');
INSERT INTO language(language_name) VALUES ('Bengali');
INSERT INTO language(language_name) VALUES ('Betawi');
INSERT INTO language(language_name) VALUES ('Bhojpuri');
INSERT INTO language(language_name) VALUES ('Bikol');
INSERT INTO language(language_name) VALUES ('Bini');
INSERT INTO language(language_name) VALUES ('Bishnupriya');
INSERT INTO language(language_name) VALUES ('Bislama');
INSERT INTO language(language_name) VALUES ('Blin');
INSERT INTO language(language_name) VALUES ('Blissymbols');
INSERT INTO language(language_name) VALUES ('Bodo');
INSERT INTO language(language_name) VALUES ('Bosnian');
INSERT INTO language(language_name) VALUES ('Brahui');
INSERT INTO language(language_name) VALUES ('Braj');
INSERT INTO language(language_name) VALUES ('Brazilian Portuguese');
INSERT INTO language(language_name) VALUES ('Breton');
INSERT INTO language(language_name) VALUES ('British English');
INSERT INTO language(language_name) VALUES ('Buginese');
INSERT INTO language(language_name) VALUES ('Bulgarian');
INSERT INTO language(language_name) VALUES ('Bulu');
INSERT INTO language(language_name) VALUES ('Buriat');
INSERT INTO language(language_name) VALUES ('Burmese');
INSERT INTO language(language_name) VALUES ('Caddo');
INSERT INTO language(language_name) VALUES ('Cajun French');
INSERT INTO language(language_name) VALUES ('Canadian English');
INSERT INTO language(language_name) VALUES ('Canadian French');
INSERT INTO language(language_name) VALUES ('Cantonese');
INSERT INTO language(language_name) VALUES ('Capiznon');
INSERT INTO language(language_name) VALUES ('Carib');
INSERT INTO language(language_name) VALUES ('Catalan');
INSERT INTO language(language_name) VALUES ('Cayuga');
INSERT INTO language(language_name) VALUES ('Cebuano');
INSERT INTO language(language_name) VALUES ('Central Atlas Tamazight');
INSERT INTO language(language_name) VALUES ('Central Dusun');
INSERT INTO language(language_name) VALUES ('Central Kurdish');
INSERT INTO language(language_name) VALUES ('Central Yupik');
INSERT INTO language(language_name) VALUES ('Chadian Arabic');
INSERT INTO language(language_name) VALUES ('Chagatai');
INSERT INTO language(language_name) VALUES ('Chamorro');
INSERT INTO language(language_name) VALUES ('Chechen');
INSERT INTO language(language_name) VALUES ('Cherokee');
INSERT INTO language(language_name) VALUES ('Cheyenne');
INSERT INTO language(language_name) VALUES ('Chibcha');
INSERT INTO language(language_name) VALUES ('Chiga');
INSERT INTO language(language_name) VALUES ('Chimborazo Highland Quichua');
INSERT INTO language(language_name) VALUES ('Chinese');
INSERT INTO language(language_name) VALUES ('Chinook Jargon');
INSERT INTO language(language_name) VALUES ('Chipewyan');
INSERT INTO language(language_name) VALUES ('Choctaw');
INSERT INTO language(language_name) VALUES ('Church Slavic');
INSERT INTO language(language_name) VALUES ('Chuukese');
INSERT INTO language(language_name) VALUES ('Chuvash');
INSERT INTO language(language_name) VALUES ('Classical Newari');
INSERT INTO language(language_name) VALUES ('Classical Syriac');
INSERT INTO language(language_name) VALUES ('Colognian');
INSERT INTO language(language_name) VALUES ('Comorian');
INSERT INTO language(language_name) VALUES ('Congo Swahili');
INSERT INTO language(language_name) VALUES ('Coptic');
INSERT INTO language(language_name) VALUES ('Cornish');
INSERT INTO language(language_name) VALUES ('Corsican');
INSERT INTO language(language_name) VALUES ('Cree');
INSERT INTO language(language_name) VALUES ('Creek');
INSERT INTO language(language_name) VALUES ('Crimean Turkish');
INSERT INTO language(language_name) VALUES ('Croatian');
INSERT INTO language(language_name) VALUES ('Czech');
INSERT INTO language(language_name) VALUES ('Dakota');
INSERT INTO language(language_name) VALUES ('Danish');
INSERT INTO language(language_name) VALUES ('Dargwa');
INSERT INTO language(language_name) VALUES ('Dazaga');
INSERT INTO language(language_name) VALUES ('Delaware');
INSERT INTO language(language_name) VALUES ('Dinka');
INSERT INTO language(language_name) VALUES ('Divehi');
INSERT INTO language(language_name) VALUES ('Dogri');
INSERT INTO language(language_name) VALUES ('Dogrib');
INSERT INTO language(language_name) VALUES ('Duala');
INSERT INTO language(language_name) VALUES ('Dutch');
INSERT INTO language(language_name) VALUES ('Dyula');
INSERT INTO language(language_name) VALUES ('Dzongkha');
INSERT INTO language(language_name) VALUES ('Eastern Frisian');
INSERT INTO language(language_name) VALUES ('Efik');
INSERT INTO language(language_name) VALUES ('Egyptian Arabic');
INSERT INTO language(language_name) VALUES ('Ekajuk');
INSERT INTO language(language_name) VALUES ('Elamite');
INSERT INTO language(language_name) VALUES ('Embu');
INSERT INTO language(language_name) VALUES ('Emilian');
INSERT INTO language(language_name) VALUES ('English');
INSERT INTO language(language_name) VALUES ('Erzya');
INSERT INTO language(language_name) VALUES ('Esperanto');
INSERT INTO language(language_name) VALUES ('Estonian');
INSERT INTO language(language_name) VALUES ('European Portuguese');
INSERT INTO language(language_name) VALUES ('European Spanish');
INSERT INTO language(language_name) VALUES ('Ewe');
INSERT INTO language(language_name) VALUES ('Ewondo');
INSERT INTO language(language_name) VALUES ('Extremaduran');
INSERT INTO language(language_name) VALUES ('Fang');
INSERT INTO language(language_name) VALUES ('Fanti');
INSERT INTO language(language_name) VALUES ('Faroese');
INSERT INTO language(language_name) VALUES ('Fiji Hindi');
INSERT INTO language(language_name) VALUES ('Fijian');
INSERT INTO language(language_name) VALUES ('Filipino');
INSERT INTO language(language_name) VALUES ('Finnish');
INSERT INTO language(language_name) VALUES ('Flemish');
INSERT INTO language(language_name) VALUES ('Fon');
INSERT INTO language(language_name) VALUES ('Frafra');
INSERT INTO language(language_name) VALUES ('French');
INSERT INTO language(language_name) VALUES ('Friulian');
INSERT INTO language(language_name) VALUES ('Fulah');
INSERT INTO language(language_name) VALUES ('Ga');
INSERT INTO language(language_name) VALUES ('Gagauz');
INSERT INTO language(language_name) VALUES ('Galician');
INSERT INTO language(language_name) VALUES ('Gan Chinese');
INSERT INTO language(language_name) VALUES ('Ganda');
INSERT INTO language(language_name) VALUES ('Gayo');
INSERT INTO language(language_name) VALUES ('Gbaya');
INSERT INTO language(language_name) VALUES ('Geez');
INSERT INTO language(language_name) VALUES ('Georgian');
INSERT INTO language(language_name) VALUES ('German');
INSERT INTO language(language_name) VALUES ('Gheg Albanian');
INSERT INTO language(language_name) VALUES ('Ghomala');
INSERT INTO language(language_name) VALUES ('Gilaki');
INSERT INTO language(language_name) VALUES ('Gilbertese');
INSERT INTO language(language_name) VALUES ('Goan Konkani');
INSERT INTO language(language_name) VALUES ('Gondi');
INSERT INTO language(language_name) VALUES ('Gorontalo');
INSERT INTO language(language_name) VALUES ('Gothic');
INSERT INTO language(language_name) VALUES ('Grebo');
INSERT INTO language(language_name) VALUES ('Greek');
INSERT INTO language(language_name) VALUES ('Guarani');
INSERT INTO language(language_name) VALUES ('Gujarati');
INSERT INTO language(language_name) VALUES ('Gusii');
INSERT INTO language(language_name) VALUES ('Gwich in');
INSERT INTO language(language_name) VALUES ('Haida');
INSERT INTO language(language_name) VALUES ('Haitian');
INSERT INTO language(language_name) VALUES ('Hakka Chinese');
INSERT INTO language(language_name) VALUES ('Hausa');
INSERT INTO language(language_name) VALUES ('Hawaiian');
INSERT INTO language(language_name) VALUES ('Hebrew');
INSERT INTO language(language_name) VALUES ('Herero');
INSERT INTO language(language_name) VALUES ('Hiligaynon');
INSERT INTO language(language_name) VALUES ('Hindi');
INSERT INTO language(language_name) VALUES ('Hiri Motu');
INSERT INTO language(language_name) VALUES ('Hittite');
INSERT INTO language(language_name) VALUES ('Hmong');
INSERT INTO language(language_name) VALUES ('Hungarian');
INSERT INTO language(language_name) VALUES ('Hupa');
INSERT INTO language(language_name) VALUES ('Iban');
INSERT INTO language(language_name) VALUES ('Ibibio');
INSERT INTO language(language_name) VALUES ('Icelandic');
INSERT INTO language(language_name) VALUES ('Ido');
INSERT INTO language(language_name) VALUES ('Igbo');
INSERT INTO language(language_name) VALUES ('Iloko');
INSERT INTO language(language_name) VALUES ('Inari Sami');
INSERT INTO language(language_name) VALUES ('Indonesian');
INSERT INTO language(language_name) VALUES ('Ingrian');
INSERT INTO language(language_name) VALUES ('Ingush');
INSERT INTO language(language_name) VALUES ('Interlingua');
INSERT INTO language(language_name) VALUES ('Interlingue');
INSERT INTO language(language_name) VALUES ('Inuktitut');
INSERT INTO language(language_name) VALUES ('Inupiaq');
INSERT INTO language(language_name) VALUES ('Irish');
INSERT INTO language(language_name) VALUES ('Italian');
INSERT INTO language(language_name) VALUES ('Jamaican Creole English');
INSERT INTO language(language_name) VALUES ('Japanese');
INSERT INTO language(language_name) VALUES ('Javanese');
INSERT INTO language(language_name) VALUES ('Jju');
INSERT INTO language(language_name) VALUES ('Jola-Fonyi');
INSERT INTO language(language_name) VALUES ('Judeo-Arabic');
INSERT INTO language(language_name) VALUES ('Judeo-Persian');
INSERT INTO language(language_name) VALUES ('Jutish');
INSERT INTO language(language_name) VALUES ('Kabardian');
INSERT INTO language(language_name) VALUES ('Kabuverdianu');
INSERT INTO language(language_name) VALUES ('Kabyle');
INSERT INTO language(language_name) VALUES ('Kachin');
INSERT INTO language(language_name) VALUES ('Kaingang');
INSERT INTO language(language_name) VALUES ('Kako');
INSERT INTO language(language_name) VALUES ('Kalaallisut');
INSERT INTO language(language_name) VALUES ('Kalenjin');
INSERT INTO language(language_name) VALUES ('Kalmyk');
INSERT INTO language(language_name) VALUES ('Kamba');
INSERT INTO language(language_name) VALUES ('Kanembu');
INSERT INTO language(language_name) VALUES ('Kannada');
INSERT INTO language(language_name) VALUES ('Kanuri');
INSERT INTO language(language_name) VALUES ('Kara-Kalpak');
INSERT INTO language(language_name) VALUES ('Karachay-Balkar');
INSERT INTO language(language_name) VALUES ('Karelian');
INSERT INTO language(language_name) VALUES ('Kashmiri');
INSERT INTO language(language_name) VALUES ('Kashubian');
INSERT INTO language(language_name) VALUES ('Kawi');
INSERT INTO language(language_name) VALUES ('Kazakh');
INSERT INTO language(language_name) VALUES ('Kenyang');
INSERT INTO language(language_name) VALUES ('Khasi');
INSERT INTO language(language_name) VALUES ('Khmer');
INSERT INTO language(language_name) VALUES ('Khotanese');
INSERT INTO language(language_name) VALUES ('Khowar');
INSERT INTO language(language_name) VALUES ('Kikuyu');
INSERT INTO language(language_name) VALUES ('Kimbundu');
INSERT INTO language(language_name) VALUES ('Kinaray-a');
INSERT INTO language(language_name) VALUES ('Kinyarwanda');
INSERT INTO language(language_name) VALUES ('Kirmanjki');
INSERT INTO language(language_name) VALUES ('Klingon');
INSERT INTO language(language_name) VALUES ('Kom');
INSERT INTO language(language_name) VALUES ('Komi');
INSERT INTO language(language_name) VALUES ('Komi-Permyak');
INSERT INTO language(language_name) VALUES ('Kongo');
INSERT INTO language(language_name) VALUES ('Konkani');
INSERT INTO language(language_name) VALUES ('Korean');
INSERT INTO language(language_name) VALUES ('Koro');
INSERT INTO language(language_name) VALUES ('Kosraean');
INSERT INTO language(language_name) VALUES ('Kotava');
INSERT INTO language(language_name) VALUES ('Koyra Chiini');
INSERT INTO language(language_name) VALUES ('Koyraboro Senni');
INSERT INTO language(language_name) VALUES ('Kpelle');
INSERT INTO language(language_name) VALUES ('Krio');
INSERT INTO language(language_name) VALUES ('Kuanyama');
INSERT INTO language(language_name) VALUES ('Kumyk');
INSERT INTO language(language_name) VALUES ('Kurdish');
INSERT INTO language(language_name) VALUES ('Kurukh');
INSERT INTO language(language_name) VALUES ('Kutenai');
INSERT INTO language(language_name) VALUES ('Kwasio');
INSERT INTO language(language_name) VALUES ('Kyrgyz');
INSERT INTO language(language_name) VALUES ('K iche');
INSERT INTO language(language_name) VALUES ('Ladino');
INSERT INTO language(language_name) VALUES ('Lahnda');
INSERT INTO language(language_name) VALUES ('Lakota');
INSERT INTO language(language_name) VALUES ('Lamba');
INSERT INTO language(language_name) VALUES ('Langi');
INSERT INTO language(language_name) VALUES ('Lao');
INSERT INTO language(language_name) VALUES ('Latgalian');
INSERT INTO language(language_name) VALUES ('Latin');
INSERT INTO language(language_name) VALUES ('Latin American Spanish');
INSERT INTO language(language_name) VALUES ('Latvian');
INSERT INTO language(language_name) VALUES ('Laz');
INSERT INTO language(language_name) VALUES ('Lezghian');
INSERT INTO language(language_name) VALUES ('Ligurian');
INSERT INTO language(language_name) VALUES ('Limburgish');
INSERT INTO language(language_name) VALUES ('Lingala');
INSERT INTO language(language_name) VALUES ('Lingua Franca Nova');
INSERT INTO language(language_name) VALUES ('Literary Chinese');
INSERT INTO language(language_name) VALUES ('Lithuanian');
INSERT INTO language(language_name) VALUES ('Livonian');
INSERT INTO language(language_name) VALUES ('Lojban');
INSERT INTO language(language_name) VALUES ('Lombard');
INSERT INTO language(language_name) VALUES ('Low German');
INSERT INTO language(language_name) VALUES ('Lower Silesian');
INSERT INTO language(language_name) VALUES ('Lower Sorbian');
INSERT INTO language(language_name) VALUES ('Lozi');
INSERT INTO language(language_name) VALUES ('Luba-Katanga');
INSERT INTO language(language_name) VALUES ('Luba-Lulua');
INSERT INTO language(language_name) VALUES ('Luiseno');
INSERT INTO language(language_name) VALUES ('Lule Sami');
INSERT INTO language(language_name) VALUES ('Lunda');
INSERT INTO language(language_name) VALUES ('Luo');
INSERT INTO language(language_name) VALUES ('Luxembourgish');
INSERT INTO language(language_name) VALUES ('Luyia');
INSERT INTO language(language_name) VALUES ('Maba');
INSERT INTO language(language_name) VALUES ('Macedonian');
INSERT INTO language(language_name) VALUES ('Machame');
INSERT INTO language(language_name) VALUES ('Madurese');
INSERT INTO language(language_name) VALUES ('Mafa');
INSERT INTO language(language_name) VALUES ('Magahi');
INSERT INTO language(language_name) VALUES ('Main-Franconian');
INSERT INTO language(language_name) VALUES ('Maithili');
INSERT INTO language(language_name) VALUES ('Makasar');
INSERT INTO language(language_name) VALUES ('Makhuwa-Meetto');
INSERT INTO language(language_name) VALUES ('Makonde');
INSERT INTO language(language_name) VALUES ('Malagasy');
INSERT INTO language(language_name) VALUES ('Malay');
INSERT INTO language(language_name) VALUES ('Malayalam');
INSERT INTO language(language_name) VALUES ('Maltese');
INSERT INTO language(language_name) VALUES ('Manchu');
INSERT INTO language(language_name) VALUES ('Mandar');
INSERT INTO language(language_name) VALUES ('Mandingo');
INSERT INTO language(language_name) VALUES ('Manipuri');
INSERT INTO language(language_name) VALUES ('Manx');
INSERT INTO language(language_name) VALUES ('Maori');
INSERT INTO language(language_name) VALUES ('Mapuche');
INSERT INTO language(language_name) VALUES ('Marathi');
INSERT INTO language(language_name) VALUES ('Mari');
INSERT INTO language(language_name) VALUES ('Marshallese');
INSERT INTO language(language_name) VALUES ('Marwari');
INSERT INTO language(language_name) VALUES ('Masai');
INSERT INTO language(language_name) VALUES ('Mazanderani');
INSERT INTO language(language_name) VALUES ('Medumba');
INSERT INTO language(language_name) VALUES ('Mende');
INSERT INTO language(language_name) VALUES ('Mentawai');
INSERT INTO language(language_name) VALUES ('Meru');
INSERT INTO language(language_name) VALUES ('Meta');
INSERT INTO language(language_name) VALUES ('Mexican Spanish');
INSERT INTO language(language_name) VALUES ('Micmac');
INSERT INTO language(language_name) VALUES ('Middle Dutch');
INSERT INTO language(language_name) VALUES ('Middle English');
INSERT INTO language(language_name) VALUES ('Middle French');
INSERT INTO language(language_name) VALUES ('Middle High German');
INSERT INTO language(language_name) VALUES ('Middle Irish');
INSERT INTO language(language_name) VALUES ('Min Nan Chinese');
INSERT INTO language(language_name) VALUES ('Minangkabau');
INSERT INTO language(language_name) VALUES ('Mingrelian');
INSERT INTO language(language_name) VALUES ('Mirandese');
INSERT INTO language(language_name) VALUES ('Mizo');
INSERT INTO language(language_name) VALUES ('Modern Standard Arabic');
INSERT INTO language(language_name) VALUES ('Mohawk');
INSERT INTO language(language_name) VALUES ('Moksha');
INSERT INTO language(language_name) VALUES ('Moldavian');
INSERT INTO language(language_name) VALUES ('Mongo');
INSERT INTO language(language_name) VALUES ('Mongolian');
INSERT INTO language(language_name) VALUES ('Morisyen');
INSERT INTO language(language_name) VALUES ('Moroccan Arabic');
INSERT INTO language(language_name) VALUES ('Mossi');
INSERT INTO language(language_name) VALUES ('Multiple Languages');
INSERT INTO language(language_name) VALUES ('Mundang');
INSERT INTO language(language_name) VALUES ('Muslim Tat');
INSERT INTO language(language_name) VALUES ('Myene');
INSERT INTO language(language_name) VALUES ('Nama');
INSERT INTO language(language_name) VALUES ('Nauru');
INSERT INTO language(language_name) VALUES ('Navajo');
INSERT INTO language(language_name) VALUES ('Ndonga');
INSERT INTO language(language_name) VALUES ('Neapolitan');
INSERT INTO language(language_name) VALUES ('Nepali');
INSERT INTO language(language_name) VALUES ('Newari');
INSERT INTO language(language_name) VALUES ('Ngambay');
INSERT INTO language(language_name) VALUES ('Ngiemboon');
INSERT INTO language(language_name) VALUES ('Ngomba');
INSERT INTO language(language_name) VALUES ('Nheengatu');
INSERT INTO language(language_name) VALUES ('Nias');
INSERT INTO language(language_name) VALUES ('Niuean');
INSERT INTO language(language_name) VALUES ('No linguistic content');
INSERT INTO language(language_name) VALUES ('Nogai');
INSERT INTO language(language_name) VALUES ('North Ndebele');
INSERT INTO language(language_name) VALUES ('Northern Frisian');
INSERT INTO language(language_name) VALUES ('Northern Sami');
INSERT INTO language(language_name) VALUES ('Northern Sotho');
INSERT INTO language(language_name) VALUES ('Norwegian');
INSERT INTO language(language_name) VALUES ('Norwegian Bokmål');
INSERT INTO language(language_name) VALUES ('Norwegian Nynorsk');
INSERT INTO language(language_name) VALUES ('Novial');
INSERT INTO language(language_name) VALUES ('Nuer');
INSERT INTO language(language_name) VALUES ('Nyamwezi');
INSERT INTO language(language_name) VALUES ('Nyanja');
INSERT INTO language(language_name) VALUES ('Nyankole');
INSERT INTO language(language_name) VALUES ('Nyasa Tonga');
INSERT INTO language(language_name) VALUES ('Nyoro');
INSERT INTO language(language_name) VALUES ('Nzima');
INSERT INTO language(language_name) VALUES ('N Ko');
INSERT INTO language(language_name) VALUES ('Occitan');
INSERT INTO language(language_name) VALUES ('Ojibwa');
INSERT INTO language(language_name) VALUES ('Old English');
INSERT INTO language(language_name) VALUES ('Old French');
INSERT INTO language(language_name) VALUES ('Old High German');
INSERT INTO language(language_name) VALUES ('Old Irish');
INSERT INTO language(language_name) VALUES ('Old Norse');
INSERT INTO language(language_name) VALUES ('Old Persian');
INSERT INTO language(language_name) VALUES ('Old Provençal');
INSERT INTO language(language_name) VALUES ('Oriya');
INSERT INTO language(language_name) VALUES ('Oromo');
INSERT INTO language(language_name) VALUES ('Osage');
INSERT INTO language(language_name) VALUES ('Ossetic');
INSERT INTO language(language_name) VALUES ('Ottoman Turkish');
INSERT INTO language(language_name) VALUES ('Pahlavi');
INSERT INTO language(language_name) VALUES ('Palatine German');
INSERT INTO language(language_name) VALUES ('Palauan');
INSERT INTO language(language_name) VALUES ('Pali');
INSERT INTO language(language_name) VALUES ('Pampanga');
INSERT INTO language(language_name) VALUES ('Pangasinan');
INSERT INTO language(language_name) VALUES ('Papiamento');
INSERT INTO language(language_name) VALUES ('Pashto');
INSERT INTO language(language_name) VALUES ('Pennsylvania German');
INSERT INTO language(language_name) VALUES ('Persian');
INSERT INTO language(language_name) VALUES ('Phoenician');
INSERT INTO language(language_name) VALUES ('Picard');
INSERT INTO language(language_name) VALUES ('Piedmontese');
INSERT INTO language(language_name) VALUES ('Plautdietsch');
INSERT INTO language(language_name) VALUES ('Pohnpeian');
INSERT INTO language(language_name) VALUES ('Polish');
INSERT INTO language(language_name) VALUES ('Pontic');
INSERT INTO language(language_name) VALUES ('Portuguese');
INSERT INTO language(language_name) VALUES ('Prussian');
INSERT INTO language(language_name) VALUES ('Punjabi');
INSERT INTO language(language_name) VALUES ('Quechua');
INSERT INTO language(language_name) VALUES ('Rajasthani');
INSERT INTO language(language_name) VALUES ('Rapanui');
INSERT INTO language(language_name) VALUES ('Rarotongan');
INSERT INTO language(language_name) VALUES ('Riffian');
INSERT INTO language(language_name) VALUES ('Romagnol');
INSERT INTO language(language_name) VALUES ('Romanian');
INSERT INTO language(language_name) VALUES ('Romansh');
INSERT INTO language(language_name) VALUES ('Romany');
INSERT INTO language(language_name) VALUES ('Rombo');
INSERT INTO language(language_name) VALUES ('Root');
INSERT INTO language(language_name) VALUES ('Rotuman');
INSERT INTO language(language_name) VALUES ('Roviana');
INSERT INTO language(language_name) VALUES ('Rundi');
INSERT INTO language(language_name) VALUES ('Russian');
INSERT INTO language(language_name) VALUES ('Rusyn');
INSERT INTO language(language_name) VALUES ('Rwa');
INSERT INTO language(language_name) VALUES ('Saho');
INSERT INTO language(language_name) VALUES ('Sakha');
INSERT INTO language(language_name) VALUES ('Samaritan Aramaic');
INSERT INTO language(language_name) VALUES ('Samburu');
INSERT INTO language(language_name) VALUES ('Samoan');
INSERT INTO language(language_name) VALUES ('Samogitian');
INSERT INTO language(language_name) VALUES ('Sandawe');
INSERT INTO language(language_name) VALUES ('Sango');
INSERT INTO language(language_name) VALUES ('Sangu');
INSERT INTO language(language_name) VALUES ('Sanskrit');
INSERT INTO language(language_name) VALUES ('Santali');
INSERT INTO language(language_name) VALUES ('Sardinian');
INSERT INTO language(language_name) VALUES ('Sasak');
INSERT INTO language(language_name) VALUES ('Sassarese Sardinian');
INSERT INTO language(language_name) VALUES ('Saterland Frisian');
INSERT INTO language(language_name) VALUES ('Saurashtra');
INSERT INTO language(language_name) VALUES ('Scots');
INSERT INTO language(language_name) VALUES ('Scottish Gaelic');
INSERT INTO language(language_name) VALUES ('Selayar');
INSERT INTO language(language_name) VALUES ('Selkup');
INSERT INTO language(language_name) VALUES ('Sena');
INSERT INTO language(language_name) VALUES ('Seneca');
INSERT INTO language(language_name) VALUES ('Serbian');
INSERT INTO language(language_name) VALUES ('Serbo-Croatian');
INSERT INTO language(language_name) VALUES ('Serer');
INSERT INTO language(language_name) VALUES ('Seri');
INSERT INTO language(language_name) VALUES ('Shambala');
INSERT INTO language(language_name) VALUES ('Shan');
INSERT INTO language(language_name) VALUES ('Shona');
INSERT INTO language(language_name) VALUES ('Sichuan Yi');
INSERT INTO language(language_name) VALUES ('Sicilian');
INSERT INTO language(language_name) VALUES ('Sidamo');
INSERT INTO language(language_name) VALUES ('Siksika');
INSERT INTO language(language_name) VALUES ('Silesian');
INSERT INTO language(language_name) VALUES ('Simplified Chinese');
INSERT INTO language(language_name) VALUES ('Sindhi');
INSERT INTO language(language_name) VALUES ('Sinhala');
INSERT INTO language(language_name) VALUES ('Skolt Sami');
INSERT INTO language(language_name) VALUES ('Slave');
INSERT INTO language(language_name) VALUES ('Slovak');
INSERT INTO language(language_name) VALUES ('Slovenian');
INSERT INTO language(language_name) VALUES ('Soga');
INSERT INTO language(language_name) VALUES ('Sogdien');
INSERT INTO language(language_name) VALUES ('Somali');
INSERT INTO language(language_name) VALUES ('Soninke');
INSERT INTO language(language_name) VALUES ('South Azerbaijani');
INSERT INTO language(language_name) VALUES ('South Ndebele');
INSERT INTO language(language_name) VALUES ('Southern Altai');
INSERT INTO language(language_name) VALUES ('Southern Sami');
INSERT INTO language(language_name) VALUES ('Southern Sotho');
INSERT INTO language(language_name) VALUES ('Spanish');
INSERT INTO language(language_name) VALUES ('Sranan Tongo');
INSERT INTO language(language_name) VALUES ('Standard Moroccan Tamazight');
INSERT INTO language(language_name) VALUES ('Sukuma');
INSERT INTO language(language_name) VALUES ('Sumerian');
INSERT INTO language(language_name) VALUES ('Sundanese');
INSERT INTO language(language_name) VALUES ('Susu');
INSERT INTO language(language_name) VALUES ('Swahili');
INSERT INTO language(language_name) VALUES ('Swati');
INSERT INTO language(language_name) VALUES ('Swedish');
INSERT INTO language(language_name) VALUES ('Swiss French');
INSERT INTO language(language_name) VALUES ('Swiss German');
INSERT INTO language(language_name) VALUES ('Swiss High German');
INSERT INTO language(language_name) VALUES ('Syriac');
INSERT INTO language(language_name) VALUES ('Tachelhit');
INSERT INTO language(language_name) VALUES ('Tagalog');
INSERT INTO language(language_name) VALUES ('Tahitian');
INSERT INTO language(language_name) VALUES ('Taita');
INSERT INTO language(language_name) VALUES ('Tajik');
INSERT INTO language(language_name) VALUES ('Talysh');
INSERT INTO language(language_name) VALUES ('Tamashek');
INSERT INTO language(language_name) VALUES ('Tamil');
INSERT INTO language(language_name) VALUES ('Taroko');
INSERT INTO language(language_name) VALUES ('Tasawaq');
INSERT INTO language(language_name) VALUES ('Tatar');
INSERT INTO language(language_name) VALUES ('Telugu');
INSERT INTO language(language_name) VALUES ('Tereno');
INSERT INTO language(language_name) VALUES ('Teso');
INSERT INTO language(language_name) VALUES ('Tetum');
INSERT INTO language(language_name) VALUES ('Thai');
INSERT INTO language(language_name) VALUES ('Tibetan');
INSERT INTO language(language_name) VALUES ('Tigre');
INSERT INTO language(language_name) VALUES ('Tigrinya');
INSERT INTO language(language_name) VALUES ('Timne');
INSERT INTO language(language_name) VALUES ('Tiv');
INSERT INTO language(language_name) VALUES ('Tlingit');
INSERT INTO language(language_name) VALUES ('Tok Pisin');
INSERT INTO language(language_name) VALUES ('Tokelau');
INSERT INTO language(language_name) VALUES ('Tongan');
INSERT INTO language(language_name) VALUES ('Tornedalen Finnish');
INSERT INTO language(language_name) VALUES ('Traditional Chinese');
INSERT INTO language(language_name) VALUES ('Tsakhur');
INSERT INTO language(language_name) VALUES ('Tsakonian');
INSERT INTO language(language_name) VALUES ('Tsimshian');
INSERT INTO language(language_name) VALUES ('Tsonga');
INSERT INTO language(language_name) VALUES ('Tswana');
INSERT INTO language(language_name) VALUES ('Tulu');
INSERT INTO language(language_name) VALUES ('Tumbuka');
INSERT INTO language(language_name) VALUES ('Tunisian Arabic');
INSERT INTO language(language_name) VALUES ('Turkish');
INSERT INTO language(language_name) VALUES ('Turkmen');
INSERT INTO language(language_name) VALUES ('Turoyo');
INSERT INTO language(language_name) VALUES ('Tuvalu');
INSERT INTO language(language_name) VALUES ('Tuvinian');
INSERT INTO language(language_name) VALUES ('Twi');
INSERT INTO language(language_name) VALUES ('Tyap');
INSERT INTO language(language_name) VALUES ('Udmurt');
INSERT INTO language(language_name) VALUES ('Ugaritic');
INSERT INTO language(language_name) VALUES ('Ukrainian');
INSERT INTO language(language_name) VALUES ('Umbundu');
INSERT INTO language(language_name) VALUES ('Unknown Language');
INSERT INTO language(language_name) VALUES ('Upper Sorbian');
INSERT INTO language(language_name) VALUES ('Urdu');
INSERT INTO language(language_name) VALUES ('Uyghur');
INSERT INTO language(language_name) VALUES ('Uzbek');
INSERT INTO language(language_name) VALUES ('Vai');
INSERT INTO language(language_name) VALUES ('Venda');
INSERT INTO language(language_name) VALUES ('Venetian');
INSERT INTO language(language_name) VALUES ('Veps');
INSERT INTO language(language_name) VALUES ('Vietnamese');
INSERT INTO language(language_name) VALUES ('Volapük');
INSERT INTO language(language_name) VALUES ('Võro');
INSERT INTO language(language_name) VALUES ('Votic');
INSERT INTO language(language_name) VALUES ('Vunjo');
INSERT INTO language(language_name) VALUES ('Walloon');
INSERT INTO language(language_name) VALUES ('Walser');
INSERT INTO language(language_name) VALUES ('Waray');
INSERT INTO language(language_name) VALUES ('Warlpiri');
INSERT INTO language(language_name) VALUES ('Washo');
INSERT INTO language(language_name) VALUES ('Wayuu');
INSERT INTO language(language_name) VALUES ('Welsh');
INSERT INTO language(language_name) VALUES ('West Flemish');
INSERT INTO language(language_name) VALUES ('Western Frisian');
INSERT INTO language(language_name) VALUES ('Western Mari');
INSERT INTO language(language_name) VALUES ('Wolaytta');
INSERT INTO language(language_name) VALUES ('Wolof');
INSERT INTO language(language_name) VALUES ('Wu Chinese');
INSERT INTO language(language_name) VALUES ('Xhosa');
INSERT INTO language(language_name) VALUES ('Xiang Chinese');
INSERT INTO language(language_name) VALUES ('Yangben');
INSERT INTO language(language_name) VALUES ('Yao');
INSERT INTO language(language_name) VALUES ('Yapese');
INSERT INTO language(language_name) VALUES ('Yemba');
INSERT INTO language(language_name) VALUES ('Yiddish');
INSERT INTO language(language_name) VALUES ('Yoruba');
INSERT INTO language(language_name) VALUES ('Zapotec');
INSERT INTO language(language_name) VALUES ('Zarma');
INSERT INTO language(language_name) VALUES ('Zaza');
INSERT INTO language(language_name) VALUES ('Zeelandic');
INSERT INTO language(language_name) VALUES ('Zenaga');
INSERT INTO language(language_name) VALUES ('Zhuang');
INSERT INTO language(language_name) VALUES ('Zoroastrian Dari');
INSERT INTO language(language_name) VALUES ('Zulu');
INSERT INTO language(language_name) VALUES ('Zuni');


------ Insert skills into the skill table -------
INSERT INTO skill(skill_name,skill_category) VALUES ('Logo Desgin','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Business Cards and Stationery','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Illustration','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Brochure Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Poster Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Signage Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Flyer Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Website Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('App Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('UX Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Character Modeling','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Industrial and Product Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Fashion Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Menu Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Postcard Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Icon Design','Graphics and Design');
INSERT INTO skill(skill_name,skill_category) VALUES ('Infographic Design','Graphics and Design');

INSERT INTO skill(skill_name,skill_category) VALUES ('Articles and Blog Posts','Writing and Translation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Translation','Writing and Translation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Proofreading and Editing','Writing and Translation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Website Content','Writing and Translation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Resume Writing','Writing and Translation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Cover Letters','Writing and Translation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Technical Writing','Writing and Translation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Job Descriptions','Writing and Translation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Legal Writing','Writing and Translation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Research and Summaries','Writing and Translation');

INSERT INTO skill(skill_name,skill_category) VALUES ('Whiteboard and Animated Explainers','Video and Animation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Video Editing','Video and Animation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Short Video Ads','Video and Animation');
INSERT INTO skill(skill_name,skill_category) VALUES ('Logo Animation','Video and Animation');
INSERT INTO skill(skill_name,skill_category) VALUES ('3D Product Animation','Video and Animation');

INSERT INTO skill(skill_name,skill_category) VALUES ('WordPress','Programming and Tech');
INSERT INTO skill(skill_name,skill_category) VALUES ('Website Builders and CMS','Programming and Tech');
INSERT INTO skill(skill_name,skill_category) VALUES ('E-Commerce Development','Programming and Tech');
INSERT INTO skill(skill_name,skill_category) VALUES ('Game Development','Programming and Tech');
INSERT INTO skill(skill_name,skill_category) VALUES ('Development for Streamers','Programming and Tech');
INSERT INTO skill(skill_name,skill_category) VALUES ('Mobile Apps','Programming and Tech');
INSERT INTO skill(skill_name,skill_category) VALUES ('Web Programming','Programming and Tech');
INSERT INTO skill(skill_name,skill_category) VALUES ('Desktop Applications','Programming and Tech');
INSERT INTO skill(skill_name,skill_category) VALUES ('Chatbots','Programming and Tech');
INSERT INTO skill(skill_name,skill_category) VALUES ('Support and IT','Programming and Tech');
