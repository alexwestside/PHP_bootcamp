USE db_orizhiy;
SELECT REVERSE(RIGHT(db_orizhiy.distrib.phone_number, 9)) AS 'rebmunenohp'
FROM db_orizhiy.distrib
WHERE db_orizhiy.distrib.phone_number LIKE '05%'