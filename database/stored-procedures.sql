DELIMITER // 

CREATE PROCEDURE newPayment(IN iAmountPaid int, IN iUserID int, IN iCardID int, IN iPhotoID int)

BEGIN

START TRANSACTION;



SET @CardTotalSpending = (SELECT totalAmountPaid FROM tcards WHERE userID = iUserID AND cardID = iCardID) + iAmountPaid;
SET @UserTotalSpending = (SELECT totalMonetaryPaid FROM tusers WHERE userID = iUserID) + iAmountPaid; 

INSERT INTO tpayments (cardID, photoID, payDate, payTime, amountPaid) 
VALUES ( iCardID, iPhotoID, CURRENT_DATE, CURRENT_TIME, iAmountPaid );

UPDATE tcards SET totalAmountPaid = @CardTotalSpending WHERE userID = iUserID AND cardID = iCardID;
UPDATE tusers SET totalMonetaryPaid = @UserTotalSpending WHERE userID = iUserID;

IF 
rollback;
END IF

COMMIT;

END // 

DELIMITER ;


