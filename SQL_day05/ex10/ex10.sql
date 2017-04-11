USE db_orizhiy;
SELECT film.title AS 'Title', film.summary AS 'Summary', prod_year
FROM film, genre
WHERE film.id_genre=genre.id_genre AND genre.name LIKE '%erotic%'
ORDER BY prod_year DESC