DELIMITER // 

CREATE TRIGGER auditPhotoOnDelete BEFORE DELETE ON tphotos

FOR EACH ROW BEGIN


SET @photographerID = (SELECT photographerID FROM tgalleries LEFT JOIN tphotos ON tphotos.galleryID = tgalleries.galleryID WHERE tphotos.photoID = old.photoID LIMIT 1);

SET @userID = (SELECT userID FROM tcards LEFT JOIN tpayments ON tcards.cardID = tpayments.cardID WHERE photoID = old.photoID LIMIT 1);

SET @paymentID = (SELECT paymentID FROM tpayments WHERE photoID = old.photoID) LIMIT 1;

INSERT INTO taudit (dateOfDeletePhoto, photoAuditID, photographerID, userID, paymentID)

VALUES (CURRENT_TIMESTAMP, old.photoID, @photographerID, @userID, @paymentID);

UPDATE tpayments SET photoID = NULL WHERE paymentID = @paymentID;


END // 


DELIMITER ; 







DELIMITER // 

CREATE TRIGGER auditUsersInsert AFTER INSERT ON tusers

FOR EACH ROW BEGIN

INSERT INTO tauditusers (userID, name, surname, email, username, password, signupDate, deleteDate, active, totalMonetaryPaid, streetName, streetNumber, zipcode, cityID, statementType, statementExecution, dbmsUser)
VALUES (new.userID, new.name, new.surname, new.email, new.username, new.password, new.signupDate, new.deleteDate, new.active, new.totalMonetaryPaid, new.streetName, new.streetNumber, new.zipcode, new.cityID, 'INSERT', CURRENT_TIMESTAMP, CURRENT_USER());

END // 


DELIMITER ; 


DELIMITER // 

CREATE TRIGGER auditUsersDelete BEFORE DELETE ON tusers

FOR EACH ROW BEGIN

INSERT INTO tauditusers (userID, name, surname, email, username, password, signupDate, deleteDate, active, totalMonetaryPaid, streetName, streetNumber, zipcode, cityID, statementType, statementExecution, dbmsUser)
VALUES (old.userID, old.name, old.surname, old.email, old.username, old.password, old.signupDate, old.deleteDate, old.active, old.totalMonetaryPaid, old.streetName, old.streetNumber, old.zipcode, old.cityID, 'DELETE', CURRENT_TIMESTAMP, CURRENT_USER());

END // 


DELIMITER ; 




DELIMITER // 

CREATE TRIGGER auditUsersUpdate AFTER UPDATE ON tusers

FOR EACH ROW BEGIN

INSERT INTO tauditusers (userID, name, surname, email, username, password, signupDate, deleteDate, active, totalMonetaryPaid, streetName, streetNumber, zipcode, cityID, statementType, statementExecution, dbmsUser)
VALUES (new.userID, new.name, new.surname, new.email, new.username, new.password, new.signupDate, new.deleteDate, new.active, new.totalMonetaryPaid, new.streetName, new.streetNumber, new.zipcode, new.cityID, 'UPDATE', CURRENT_TIMESTAMP, CURRENT_USER());

END // 


DELIMITER ; 
















DELIMITER // 

CREATE TRIGGER auditCardsInsert AFTER INSERT ON tcards

FOR EACH ROW BEGIN

INSERT INTO tauditcards (cardID, userID, ibanCode, expirationDate, ccv, totalAmountPaid, statementType, statementExecution, dbmsUser)
VALUES (new.cardID, new.userID, new.ibanCode, new.expirationDate, new.ccv, new.totalAmountPaid, 'INSERT', CURRENT_TIMESTAMP, CURRENT_USER());

END // 


DELIMITER ; 




DELIMITER // 

CREATE TRIGGER auditCardsDelete BEFORE DELETE ON tcards

FOR EACH ROW BEGIN

INSERT INTO tauditcards (cardID, userID, ibanCode, expirationDate, ccv, totalAmountPaid, statementType, statementExecution, dbmsUser)
VALUES (old.cardID, old.userID, old.ibanCode, old.expirationDate, old.ccv, old.totalAmountPaid, 'DELETE', CURRENT_TIMESTAMP, CURRENT_USER());

END // 


DELIMITER ; 




DELIMITER // 

CREATE TRIGGER auditCardsUpdate AFTER UPDATE ON tcards

FOR EACH ROW BEGIN

INSERT INTO tauditcards (cardID, userID, ibanCode, expirationDate, ccv, totalAmountPaid, statementType, statementExecution, dbmsUser)
VALUES (new.cardID, new.userID, new.ibanCode, new.expirationDate, new.ccv, new.totalAmountPaid, 'UPDATE', CURRENT_TIMESTAMP, CURRENT_USER());

END // 


DELIMITER ; 















DELIMITER // 

CREATE TRIGGER auditPaymentInsert AFTER INSERT ON tpayments

FOR EACH ROW BEGIN

INSERT INTO tauditPayments (paymentID, cardID, photoID, payDate, payTime, amountPaid, statementType, statementExecution, dbmsUser)
VALUES (new.paymentID, new.cardID, new.photoID, new.payDate, new.payTime, new.amountPaid, 'INSERT', CURRENT_TIMESTAMP, CURRENT_USER());

END // 


DELIMITER ; 




DELIMITER // 

CREATE TRIGGER auditPaymentDelete BEFORE DELETE ON tpayments

FOR EACH ROW BEGIN

INSERT INTO tauditPayments (paymentID, cardID, photoID, payDate, payTime, amountPaid, statementType, statementExecution, dbmsUser)
VALUES (old.paymentID, old.cardID, old.photoID, old.payDate, old.payTime, old.amountPaid, 'DELETE', CURRENT_TIMESTAMP, CURRENT_USER());

END // 


DELIMITER ; 




DELIMITER // 

CREATE TRIGGER auditPaymentUpdate AFTER UPDATE ON tpayments

FOR EACH ROW BEGIN

INSERT INTO tauditPayments (paymentID, cardID, photoID, payDate, payTime, amountPaid, statementType, statementExecution, dbmsUser)
VALUES (new.paymentID, new.cardID, new.photoID, new.payDate, new.payTime, new.amountPaid, 'UPDATE', CURRENT_TIMESTAMP, CURRENT_USER());

END // 


DELIMITER ; 














// PHOTO ON DELETE NEW 





DELIMITER //

CREATE TRIGGER photoOnDelete BEFORE DELETE ON tphotos

FOR EACH ROW BEGIN 

SET @paymentID = (SELECT paymentID FROM tpayments WHERE photoID = old.photoID);


UPDATE tpayments SET photoID = NULL WHERE paymentID = @paymentID;


END // 


DELIMITER ; 


