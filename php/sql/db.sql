create table users (
    id integer PRIMARY KEY AUTO_INCREMENT,
    first_name varchar(255) NOT NULL,
    hobbies json NOT NULL,
    last_name varchar(255) NOT NULL
);

insert into
    users (first_name, last_name)
    values
           ('Maria', 'Gomez'),
           ('Anthony', 'Morales');

update users SET first_name = 'Rolando' WHERE id = 1;