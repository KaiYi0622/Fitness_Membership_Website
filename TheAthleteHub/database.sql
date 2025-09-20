-- CREATING DATABASE
CREATE DATABASE TheAthleteHub CHARACTER SET utf8 COLLATE utf8_general_ci;

-- CREATING THE ANNOUNCEMENT TABLE
USE TheAthleteHub;

CREATE TABLE schedule (
	scheduleId int AUTO_INCREMENT PRIMARY KEY ,
	classType VARCHAR(20) NOT NULL,
	instructName VARCHAR(50) NOT NULL,
	classStartTime VARCHAR(10) NOT NULL,
	classEndTime VARCHAR(10) NOT NULL,
	classDay VARCHAR(10) NOT NULL,
	classCost VARCHAR(6) NOT NULL
);

INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('BOXING', 'Ali', '09:00:00am', '10:00:00am', 'Monday', 'RM 170');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('BOXING', 'Ali', '02:00:00pm', '03:00:00pm', 'Friday', 'RM 170');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('BOXING', 'Jolin', '01:00:00pm', '02:00:00pm', 'Wednesday', 'RM 170');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('BOXING', 'Jolin', '07:00:00pm', '08:00:00pm', 'Friday', 'RM 170');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('YOGA', 'Nicole', '01:00:00pm', '02:00:00pm', 'Tuesday', 'RM 120');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('YOGA', 'Nicole', '05:00:00pm', '06:00:00pm', 'Saturday', 'RM 120');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('YOGA', 'Vivian', '03:00:00pm', '04:00:00pm', 'Thursday', 'RM 120');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('CYCLING', 'Adrian', '10:00:00am', '11:00:00am', 'Sunday', 'RM 130');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('CYCLING', 'Ray', '03:00:00pm', '04:00:00pm', 'Wednesday', 'RM 130');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('CYCLING', 'Ray', '09:00:00pm', '10:00:00pm', 'Friday', 'RM 130');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('ZUMBA', 'Norman', '09:00:00am', '10:00:00am', 'Thursday', 'RM 110');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('ZUMBA', 'Norman', '07:00:00pm', '08:00:00pm', 'Saturday', 'RM 110');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('ZUMBA', 'Michelle', '07:00:00pm', '08:00:00pm', 'Monday', 'RM 110');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('PILATES', 'Kelly', '08:00:00pm', '09:00:00pm', 'Sunday', 'RM 150');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('PILATES', 'Joseph', '10:00:00am', '11:00:00am', 'Tuesday', 'RM 150');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('PILATES', 'Joseph', '04:00:00pm', '05:00:00pm', 'Monday', 'RM 150');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('KIDS', 'Kavita', '07:00:00pm', '08:00:00pm', 'Wednesday', 'RM 100');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('KIDS', 'Kavita', '06:00:00pm', '07:00:00pm', 'Sunday', 'RM 100');
INSERT INTO schedule (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('KIDS', 'Ryan', '03:00:00pm', '04:00:00pm', 'Saturday', 'RM 100');


CREATE TABLE packages (
	scheduleId int UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
	classType VARCHAR(255) NOT NULL,
	instructName VARCHAR(50) NOT NULL,
	classStartTime VARCHAR(10) NOT NULL,
	classEndTime VARCHAR(10) NOT NULL,
	classDay VARCHAR(10) NOT NULL,
	classCost VARCHAR(6) NOT NULL
) AUTO_INCREMENT=20;

INSERT INTO packages (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('BOXING (Group up to 3 Person)', 'Ali', '09:00:00am', '10:00:00am', 'Monday', 'RM 329');
INSERT INTO packages (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('ZUMBA (Group up to 2 Person)', 'Michelle', '07:00:00pm', '08:00:00pm', 'Monday', 'RM 250');
INSERT INTO packages (classType, instructName, classStartTime, classEndTime, classDay, classCost)
VALUES('KIDS (Group up to 3 Person)', 'Ryan', '03:00:00pm', '04:00:00pm', 'Saturday', 'RM 299');


CREATE TABLE bookingDetails (
	bookingId int AUTO_INCREMENT PRIMARY KEY ,
	scheduleId INT NOT NULL,
	userId VARCHAR(255) NOT NULL
); 


CREATE TABLE users(
	userId INT AUTO_INCREMENT PRIMARY KEY ,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL
)