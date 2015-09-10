drop database pomodori;
create database pomodori;
use pomodori;

create table users (
        username varchar(16) not null primary key,
        password varchar(40) not null,
);

create table deptree (
        ix varchar(16) not null primary key,
        username varchar(16) not null,
        title tinytext not null,
        description text,
        done boolean
);

create table pomodoro (
        ix varchar(16) not null,
        username varchar(16) not null,
        start date not null,
        finish date not null,
        report text
);
