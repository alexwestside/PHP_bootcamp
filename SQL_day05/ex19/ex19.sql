SELECT ABS(DATEDIFF(MIN(db_orizhiy.film.last_projection), MAX(db_orizhiy.film.last_projection))) AS 'uptime'
FROM db_orizhiy.film;