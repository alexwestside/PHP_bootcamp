USE db_orizhiy;
SELECT
  film.title,
  film.summary
FROM film
WHERE summary LIKE '%vincent%'
ORDER BY id_film;
