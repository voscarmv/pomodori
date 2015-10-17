# For use in phpmyadmin. From phpmyadmin, the database in use is already the one 000webhost assigns.
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
        ix int unsigned not null auto_increment,
        title tinytext not null,
        description text,
        primary key (username, ix)
);

# insert with
#       insert into projects values("dos", 0, "projone", "ooooo");

describe projects;

create table deptree (
        ix int unsigned not null,
        subix int unsigned not null auto_increment,
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

describe deptree;

create table pomodoro (
        ix varchar(16) not null,
        subix int unsigned not null,
        pomodoroid int unsigned not null auto_increment,
        username varchar(16) not null,
        start datetime not null,
        finish datetime not null,
        report text,
	primary key(ix, subix, pomodoroid, username)
);

describe pomodoro;


