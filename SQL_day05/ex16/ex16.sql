SELECT COUNT(db_orizhiy.member_history.date) AS 'movies'
FROM db_orizhiy.member_history
WHERE db_orizhiy.member_history.date BETWEEN '10-30-2006' AND '07-27-2007' OR
      MONTH(db_orizhiy.member_history.date) = 12 AND DAY(db_orizhiy.member_history.date) = 24;