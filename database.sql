drop table  todo_itens;

drop table  todo_list;

drop table  user_information;

create table user_information(
	  id int not null AUTO_INCREMENT,
    username VARCHAR(64) NOT NULL,
    pass VARCHAR(64) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

create table todo_list(
  id int not null AUTO_INCREMENT,
  id_user int not null,
  name VARCHAR(64) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_user) REFERENCES user_information(id) ON DELETE CASCADE
) ENGINE=InnoDB;

create table todo_itens(
  id int not null AUTO_INCREMENT,
  text VARCHAR(64) NOT NULL,
  is_checked tinyint(1) default 0,
  todo_list_id int not null,
  PRIMARY KEY (id),
  FOREIGN KEY (todo_list_id)
    REFERENCES todo_list(id)
    ON DELETE CASCADE
) ENGINE=InnoDB;