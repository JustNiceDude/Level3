create table if not exists `library_db`.books_list
(
    `id`              int          not null auto_increment,
    `name`            varchar(255) not null,
    `author`          varchar(255) not null,
    `year`            int          not null,
    `image_name`      varchar(255) not null,
    `description`     text         not null,
    `number_of_pages` int          not null,
    `clicks`          int          not null,
    `views`           int          not null,
    `delete_at`       text          null,
    primary key (id)
)
    engine = innodb
    character set utf8
    collate utf8_general_ci;
