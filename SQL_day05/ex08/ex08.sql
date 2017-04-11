USE db_orizhiy;
SELECT
  user_card.last_name,
  user_card.first_name,
  DATE_FORMAT(user_card.birthdate, '%Y-%m-%d') AS 'birthdate'
FROM user_card
WHERE YEAR(user_card.birthdate) = 1989
ORDER BY user_card.last_name ASC;