create table medico(
    id integer unsigned auto_increment,
    nome varchar(20) not null,
    cognome varchar(20) not null,
    codice_fiscale char(11),
    numero_albo char(5),
    telefono varchar(20),
    email varchar(50),

    primary key(id)
);