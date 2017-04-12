SELECT
  db_orizhiy.film.id_genre   AS 'id_genre',
  db_orizhiy.genre.name      AS 'name_genre',
  db_orizhiy.film.id_distrib AS 'id_distrib',
  db_orizhiy.distrib.name    AS 'name_distrib',
  db_orizhiy.film.title      AS 'title_film'
FROM db_orizhiy.film
  LEFT JOIN db_orizhiy.distrib
    ON db_orizhiy.distrib.id_distrib = db_orizhiy.film.id_distrib
  LEFT JOIN genre
    ON db_orizhiy.genre.id_genre = db_orizhiy.film.id_genre
WHERE db_orizhiy.film.id_genre IN (4, 5, 6, 7, 8);