create database libreria;


create table libreria.libri(
id int primary key auto_increment,
titolo varchar(50) not null,
autore varchar(50) not null,
genere varchar(50) not null,
data_pubblicazione date not null,
prezzo double
);