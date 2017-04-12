SELECT db_orizhiy.film.title AS 'Title', film.summary AS 'Summary', db_orizhiy.film.prod_year
FROM db_orizhiy.film, db_orizhiy.genre
WHERE db_orizhiy.film.id_genre=db_orizhiy.genre.id_genre AND genre.name LIKE '%erotic%'
ORDER BY db_orizhiy.film.prod_year DESC;