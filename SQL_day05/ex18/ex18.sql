SELECT db_orizhiy.distrib.name
FROM db_orizhiy.distrib
WHERE db_orizhiy.distrib.id_distrib IN (42, 62, 63, 64, 65, 67, 68, 69, 70, 71, 89, 90) OR
      db_orizhiy.distrib.name LIKE '%y%y%' OR '%Y%Y%'
LIMIT 2, 5;