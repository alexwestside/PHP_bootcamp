CREATE TABLE IF NOT EXISTS db_orizhiy.ft_table
(
  id            INT                                NOT NULL PRIMARY KEY AUTO_INCREMENT,
  login         CHAR(8)                            NOT NULL             DEFAULT 'toto',
  `group`       ENUM ('staff', 'student', 'other') NOT NULL,
  creation_date DATE                               NOT NULL
);