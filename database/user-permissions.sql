CREATE USER 'admin'@'localhost' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON proofing_system_db.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;


CREATE USER 'user_read'@'localhost' IDENTIFIED BY 'password';
GRANT SELECT ON proofing_system_db.* TO 'user_read'@'localhost';
FLUSH PRIVILEGES;



CREATE USER 'user_restricted'@'localhost' IDENTIFIED BY 'password';
GRANT SELECT ON proofing_system_db.tphotos TO 'user_restricted'@'localhost';
GRANT SELECT ON proofing_system_db.tgalleries TO 'user_restricted'@'localhost';
GRANT SELECT ON proofing_system_db.tcities TO 'user_restricted'@'localhost';
GRANT SELECT ON proofing_system_db.taudit TO 'user_restricted'@'localhost';

GRANT SELECT (userID) ON proofing_system_db.tusers TO 'user_restricted'@'localhost';
GRANT SELECT (name) ON proofing_system_db.tusers TO 'user_restricted'@'localhost';
GRANT SELECT (surname) ON proofing_system_db.tusers TO 'user_restricted'@'localhost';
GRANT SELECT (username) ON proofing_system_db.tusers TO 'user_restricted'@'localhost';
GRANT SELECT (signupDate) ON proofing_system_db.tusers TO 'user_restricted'@'localhost';
GRANT SELECT (deleteDate) ON proofing_system_db.tusers TO 'user_restricted'@'localhost';
GRANT SELECT (active) ON proofing_system_db.tusers TO 'user_restricted'@'localhost';

GRANT SELECT (photographerID) ON proofing_system_db.tphotographers TO 'user_restricted'@'localhost';
GRANT SELECT (name) ON proofing_system_db.tphotographers TO 'user_restricted'@'localhost';
GRANT SELECT (surname) ON proofing_system_db.tphotographers TO 'user_restricted'@'localhost'

FLUSH PRIVILEGES;