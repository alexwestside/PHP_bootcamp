USE db_orizhiy;
SELECT count(*)
  AS 'nb_short-films'
FROM film
WHERE duration <= 42