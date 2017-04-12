INSERT INTO
  db_orizhiy.ft_table (login, creation_date, `group`)
  SELECT
    db_orizhiy.user_card.last_name,
    db_orizhiy.user_card.birthdate,
    'other'
  FROM db_orizhiy.user_card
  WHERE db_orizhiy.user_card.last_name LIKE '%a%'
        AND
        CHAR_LENGTH(db_orizhiy.user_card.last_name) < 9
  ORDER BY last_name
  LIMIT 10;