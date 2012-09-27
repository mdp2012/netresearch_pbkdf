<?php
$installer = $this;

/* @var $installer Mage_Eav_Model_Entity_Setup */
$installer->startSetup();

// delete any previous Mysql PBKDF function
$installer->getConnection()->exec('DROP FUNCTION IF EXISTS `fn_PBKDF`;');

// install new Mysql PBKDF function
$createString = <<<SQLQUERY
CREATE FUNCTION fn_PBKDF(pString VARCHAR(255), pSalt VARCHAR(255)) RETURNS VARCHAR(255) DETERMINISTIC
BEGIN
    DECLARE output VARCHAR(255);
    DECLARE i INT;

    SET output = pString;
    SET i = 0;
    WHILE i < 10000 DO
        SET output = SHA1(CONCAT(pSalt, output));
        SET i = i + 1;
    END WHILE;
    
    RETURN output;
END;
SQLQUERY;

$installer->getConnection()->exec($createString);

$installer->endSetup();

