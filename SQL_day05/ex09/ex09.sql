SELECT count(*)
  AS 'nb_short-films'
FROM db_orizhiy.film
WHERE db_orizhiy.film.duration <= 42