SELECT COUNT(*) AS `movies` FROM `film` WHERE `release_date` BETWEEN  '2006-10-30' AND '2007-07-27' OR MONTH(`release_date`) = 12 AND DAY (`release_date`) = 24;