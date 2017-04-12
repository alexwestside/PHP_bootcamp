SELECT
  db_orizhiy.user_card.last_name,
  db_orizhiy.user_card.first_name,
  DATE_FORMAT(db_orizhiy.user_card.birthdate, '%Y-%m-%d') AS 'birthdate'
FROM db_orizhiy.user_card
WHERE YEAR(db_orizhiy.user_card.birthdate) = 1989
ORDER BY db_orizhiy.user_card.last_name ASC;