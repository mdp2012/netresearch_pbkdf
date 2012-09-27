=========================================================
Documentation for the Netresearch PBKDF Magento extension
=========================================================


Intention
---------
This extension is intended solely to demonstrate the possibility
to have a PBKDF2 compliant function within MySQL.

So it just install a MySQL function named *fn_PBKDF()*, which can
be called in your SQL queries as described below.


Usage
-----
Syntax:
  
  SELECT fn_PBKDF(<password>, <salt>);
or
  INSERT INTO <sometable> values (<somecolumnname>) VALUES (fn_PBKDF(<password>, <salt>));


Calculation
-----------
The function *fn_PBKDF()* calculates a salted SHA1 hash within 10000 cycles.

