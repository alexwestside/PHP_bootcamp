USE db_orizhiy;
SELECT REVERSE(RIGHT(distrib.phone_number, 9))
FROM distrib
WHERE distrib.phone_number LIKE '05%'