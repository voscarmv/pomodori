drop database pomodori;
create database pomodori;
use pomodori;

create table users (
        username varchar(16) not null primary key,
        password varchar(40) not null
);

describe users;

create table projects (
        username varchar(16) not null,
        ix int unsigned not null,
        title tinytext not null,
        description text,
        primary key (username, ix)
);

# insert with
#       insert into projects values("dos", 0, "projone", "ooooo");

delimiter $$
	create trigger tg_projects_insert
	before insert on projects
	for each row
	begin
		set new.ix = (select ifnull(max(ix), 0) + 1 from projects where username = new.username);
	end $$
delimiter ;

create table deptree (
        ix int unsigned not null,
        subix int unsigned not null,
        username varchar(16) not null,
        title tinytext not null,
        description text,
        done boolean,
        lft int not null,
	rgt int not null,
        primary key (ix, subix, username)
);

# insert with
#       insert into deptree values(1, 0, "oscar", "task1", "descrypto", false, 1, 10);

delimiter $$
	create trigger tg_deptree_insert
	before insert on deptree
	for each row
	begin
		set new.subix = (select ifnull(max(subix), 0) + 1 from deptree where ix = new.ix);
	end $$
delimiter ;

describe deptree;

create table pomodoro (
        ix varchar(16) not null,
        subix int unsigned not null,
        username varchar(16) not null,
        start date not null,
        finish date not null,
        report text,
	primary key(ix, subix, username)
);

describe pomodoro;

grant select, insert, update, delete, lock tables
on pomodori.*
to pomodori_user@localhost identified by 'tomatoes';

select User from mysql.user;
