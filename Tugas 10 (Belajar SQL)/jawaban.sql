Soal 1 Membuat Database
create database myshop;



Soal 2 Membuat Tabel di Dalam Database

Tabel User
use myshop;
create table users(
	-> id int(8 ) primary key auto_increment,
	-> name varchar(255),
	-> email varchar(255),
	-> password varchar(255)
	-> );

Tabel Categories
create table categories(
	-> id int(8 ) primary key auto_increment,
	-> name varchar(255)
	-> );

Tabel Items
create table items(
	-> id int(8 ) primary key auto_increment,
	-> name varchar(255),
	-> description varchar(255),
	-> price int,
	-> stock int,
	-> category_id int,
	-> foreign key(category_id) references categories(id)
	-> );
	


Soal 3 Memasukan Data pada Table

Tabel Users
	insert into users(name,email,password) values("John Doe","john@doe.com","john123");
	insert into users(name,email,password) values("Jane Doe","jane@doe.com","jane123");

Tabel Categories
	insert into categories(name) values("gadget"),("cloth"),("men"),("women"),("branded");

Tabel Items
	insert into items(name,description,price,stock,category_id) values("Sumsang b50","hape keren dari merek sumsang",4000000,100,1);
	insert into items(name,description,price,stock,category_id) values("Sumsang b50","baju keren dari brand ternama",500000,50,2);
	insert into items(name,description,price,stock,category_id) values("IMHO Watch","jam tangan anak yang jujur banget",4200000,10,1);



Soal 4 mengambil data dari Database
- mengambil data kecuali
  select name,email from users;

- mengambil data item dengan kodisi >
  select * from items where price>1000000;

- mengambil data menggunkan Like
  select * from items where name like '%sang%';

- mengambil data dikedua table menggunakan join
  select items.name, items.description, items.price, items.stock, items.category_id, categories.name from items inner join categories on items.category_id=categories.id;



Soal 5 mengubah Data dari Database
update items set price=2500000 where id=1;