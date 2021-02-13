create table if not exists `library_db`.pairs_id
(
    `book_id`   int not null,
    `author_id` int not null
)
    engine = innodb
    character set utf8
    collate utf8_general_ci;
# Fill the created table with "id"-values from "books" table and "authors" table
insert into library_db.pairs_id (book_id, author_id)
select library_db.books_list.id, library_db.authors.id
from library_db.books_list left join library_db.authors on books_list.id=authors.id;
# Delete a column "author" from "books_list" table
alter table library_db.books_list drop author;