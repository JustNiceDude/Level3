create table if not exists `library_db`.migrations
(
    `id`      serial       not null,
    `name`    varchar(255) not null,
    `created` timestamp default current_timestamp,
    primary key (id)
)
    engine = innodb
    character set utf8
    collate utf8_general_ci;