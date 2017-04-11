USE db_orizhiy;
UPDATE ft_table
SET ft_table.creation_date = ADDDATE(creation_date, INTERVAL 20 YEAR)
WHERE id > 5;