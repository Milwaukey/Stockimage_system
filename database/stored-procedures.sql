DELIMITER // 

CREATE PROCEDURE newPayment(IN iAmountPaid int, IN iUserID int, IN iCardID int, IN iPhotoID int)

BEGIN

    DECLARE `_rollback` BOOL DEFAULT 0;
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;
    
START TRANSACTION;

SET @CardTotalSpending = (SELECT totalAmountPaid FROM tcards WHERE userID = iUserID AND cardID = iCardID) + iAmountPaid;
SET @UserTotalSpending = (SELECT totalMonetaryPaid FROM tusers WHERE userID = iUserID) + iAmountPaid; 

INSERT INTO tpayments (cardID, photoID, payDate, payTime, amountPaid) 
VALUES ( iCardID, iPhotoID, CURRENT_DATE, CURRENT_TIME, iAmountPaid );

UPDATE tcards SET totalAmountPaid = @CardTotalSpending WHERE userID = iUserID AND cardID = iCardID;
UPDATE tusers SET totalMonetaryPaid = @UserTotalSpending WHERE userID = iUserID;

    IF `_rollback` THEN
        ROLLBACK;
    ELSE
        COMMIT;
    END IF;

COMMIT;

END // 

DELIMITER ;