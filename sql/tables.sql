

set foreign_key_checks = 0;

drop table if exists User;

set foreign_key_checks = 1;

-- --------------------------------------------------
-- CREATE TABLES
-- --------------------------------------------------

create table if not exists `User` (
	id 	        integer 	    not null,
	username 	varchar(255) 	not null,
	password    varchar(60)     not null,
	primary key (id)
) ENGINE=InnoDB 
  DEFAULT CHARACTER SET=utf8 
  DEFAULT COLLATE=utf8_bin;



-- --------------------------------------------------
-- TABLE CONSTRAINTS
-- --------------------------------------------------

alter table User
    add constraint user_username_uni
    unique (username);
    
    
