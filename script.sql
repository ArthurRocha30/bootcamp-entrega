CREATE TABLE admin(
    id int primary key auto_increment,
    email varchar(200) unique,
    senha varchar(200)

);

CREATE TABLE tarefa(
    id int primary key auto_increment,
    id_admin int,
    titulo varchar(100),
    descricao varchar(255)
);