create table shopping_list(
   id INT NOT NULL AUTO_INCREMENT,
   item VARCHAR(255) NOT NULL,
   date_added  DATETIME NOT NULL,
 	is_checked TINYINT DEFAULT 0,
   PRIMARY KEY ( id )
)ENGINE=INNODB;
