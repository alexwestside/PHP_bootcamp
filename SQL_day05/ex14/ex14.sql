SELECT db_orizhiy.cinema.floor_number AS 'floor', SUM(db_orizhiy.cinema.nb_seats) AS 'seats'
FROM db_orizhiy.cinema
GROUP BY floor
ORDER BY seats DESC;