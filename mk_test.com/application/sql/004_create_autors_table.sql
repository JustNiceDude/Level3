create table if not exists `library_db`.authors
(
    `id`   int          not null auto_increment,
    `author` varchar(255) not null ,
    primary key (id)
)
    engine = innodb
    character set utf8
    collate utf8_general_ci;
# Fill "authors" table with authors from "books_list" table
insert into library_db.authors (author) select author from library_db.books_list;
