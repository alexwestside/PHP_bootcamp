SELECT
  db_orizhiy.film.title,
  db_orizhiy.film.summary
FROM db_orizhiy.film
WHERE db_orizhiy.film.title LIKE '%42%' OR db_orizhiy.film.summary LIKE '%42%'
ORDER BY db_orizhiy.film.duration;