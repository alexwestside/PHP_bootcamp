SELECT
  db_orizhiy.user_card.last_name,
  db_orizhiy.user_card.first_name
FROM db_orizhiy.user_card
WHERE db_orizhiy.user_card.first_name LIKE '%-%' OR db_orizhiy.user_card.last_name LIKE '%-%'
ORDER BY db_orizhiy.user_card.last_name, db_orizhiy.user_card.first_name;
