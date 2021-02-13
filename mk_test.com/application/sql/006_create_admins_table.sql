create table if not exists `library_db`.admins
(
    `id`   int          not null auto_increment,
    `login` varchar(255) not null ,
    `password` varchar(255) not null ,
    primary key (id)
    )
    engine = innodb
    character set utf8
    collate utf8_general_ci;
-- Add admin into created table
insert into `library_db`.admins (`login`, `password`)
values ('admin', 'admin');
