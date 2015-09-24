drop database compos;
create database compos;
use compos;
create table composite (
	id int(11) unsigned not null,
	ai int(11) unsigned not null,
	primary key(id,ai)
);

delimiter $$

	create trigger tg_comp_insert
	before insert on composite
	for each row
	begin
		set new.ai = (select ifnull(max(ai), 0) + 1 from composite where id = new.id);
	end $$

delimiter ;
