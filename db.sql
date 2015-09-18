drop database pomodori;
create database pomodori;
use pomodori;

create table users (
        username varchar(16) not null primary key,
        password varchar(40) not null
);

describe users;

create table projects (
        ix int unsigned not null auto_increment primary key,
        username varchar(16) not null,
        title tinytext not null,
        description text
);

create table deptree (
        subix int unsigned not null auto_increment primary key,
        ix int unsigned not null,
        username varchar(16) not null,
        title tinytext not null,
        description text,
        done boolean
);

describe deptree;

create table pomodoro (
        ix varchar(16) not null,
        subix int unsigned not null,
        username varchar(16) not null,
        start date not null,
        finish date not null,
        report text
);

describe pomodoro;

grant select, insert, update, delete
on pomodori.*
to pomodori_user@localhost identified by 'tomatoes';

select User from mysql.user;
