UPDATE db_orizhiy.ft_table
SET db_orizhiy.ft_table.creation_date = ADDDATE(db_orizhiy.ft_table.creation_date, INTERVAL 20 YEAR)
WHERE id > 5;