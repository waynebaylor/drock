

set foreign_key_checks = 0;

drop table if exists Workout;
drop table if exists User;

set foreign_key_checks = 1;

-- --------------------------------------------------
-- CREATE TABLES
-- --------------------------------------------------

create table if not exists `User` (
	id 	        integer 	    not null auto_increment,
	username 	varchar(255) 	not null,
	password    varchar(60)     not null,
	primary key (id)
) ENGINE=InnoDB 
  DEFAULT CHARACTER SET=utf8 
  DEFAULT COLLATE=utf8_bin;

create table if not exists `Workout` (
	id 	        integer 	    not null auto_increment,
	user_id 	integer      	not null,
	name        varchar(255)    not null,
	reps        integer         not null,
	sets        integer         not null,
	weight      integer         not null,
	tmstmp      datetime        not null,
	status      varchar(255)    null default null,
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
    
alter table Workout
    add constraint foreign key (user_id) 
    references User(id);
    
    
