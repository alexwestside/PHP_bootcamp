SELECT
  UPPER(db_orizhiy.user_card.last_name) AS 'NAME',
  db_orizhiy.user_card.first_name,
  db_orizhiy.subscription.price
FROM db_orizhiy.member
  INNER JOIN db_orizhiy.subscription
    ON db_orizhiy.subscription.id_sub = db_orizhiy.member.id_sub
  INNER JOIN db_orizhiy.user_card
    ON db_orizhiy.user_card.id_user = db_orizhiy.member.id_user_card
WHERE db_orizhiy.subscription.price > 42
ORDER BY db_orizhiy.user_card.last_name, db_orizhiy.user_card.first_name;