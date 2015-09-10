drop database pomodori;
create database pomodori;
use pomodori;

create table users (
        username varchar(16) not null primary key,
        password varchar(40) not null
);

describe users;

create table deptree (
        ix varchar(16) not null,
        username varchar(16) not null,
        title tinytext not null,
        description text,
        done boolean,
        primary key ( ix, username )
);

describe deptree;

create table pomodoro (
        ix varchar(16) not null,
        username varchar(16) not null,
        start date not null,
        finish date not null,
        report text,
        primary key ( ix, username )
);

describe pomodoro;

grant select, insert, update, delete
on pomodori.*
to pomodori_user@localhost identified by 'tomatoes';

select User from mysql.user;
