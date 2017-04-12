SELECT
  db_orizhiy.film.title,
  db_orizhiy.film.summary
FROM db_orizhiy.film
WHERE summary LIKE '%vincent%'
ORDER BY id_film;