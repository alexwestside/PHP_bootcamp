SELECT
  COUNT(*)                                           AS 'nb_susc',
  FLOOR(AVG(db_orizhiy.subscription.price))          AS 'av_susc',
  MOD(SUM(db_orizhiy.subscription.duration_sub), 42) AS 'ft'
FROM db_orizhiy.subscription;