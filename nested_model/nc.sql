drop database nested;
create database nested;
use nested;

create table nested_category (
	category_id int auto_increment primary key,
	name varchar(20) not null,
	lft int not null,
	rgt int not null
);

insert into nested_category values
        (1, 'electronics', 1, 20),
        (2, 'televisions', 2, 9),
        (3, 'tube', 3, 4),
        (4, 'lcd', 5, 6),
        (5, 'plasma', 7, 8),
        (6, 'portabe electronics', 10, 19),
        (7, 'mp3 players', 11, 14),
        (8, 'flash', 12, 13),
        (9, 'cd players', 15, 16),
        (10, '2 way radios', 17, 18)
;

select * from nested_category order by category_id;
