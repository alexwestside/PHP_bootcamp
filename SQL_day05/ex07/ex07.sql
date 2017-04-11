USE db_orizhiy;
SELECT
  film.title,
  film.summary
FROM film
WHERE film.title LIKE '%42%' OR film.summary LIKE '%42%'
ORDER BY duration;