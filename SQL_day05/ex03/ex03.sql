INSERT INTO
  ft_table (login, creation_date, `group`)
  SELECT
    user_card.last_name,
    user_card.birthdate,
    'other'
  FROM user_card
  WHERE user_card.last_name LIKE '%a%'
        AND
        CHAR_LENGTH(user_card.last_name) < 9
  ORDER BY last_name
  LIMIT 10;