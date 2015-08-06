SET @@session.time_zone='+00:00';
CREATE TABLE pastes (
  id INT(11) NOT NULL auto_increment,
  slug VARCHAR(13) NOT NULL,
  content TEXT,
  language VARCHAR(10) NOT NULL DEFAULT 'plain',
  private BOOL NOT NULL DEFAULT 0,
  creator_ipv4 VARCHAR(64) NOT NULL,
  created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
