create database tasker;

create table tb_status(
    id int not null primary key auto_increment,
    status varchar(25) not null
);

insert into tb_status(status)values('pendente');
insert into tb_status(status)values('realizado');

CREATE TABLE td_user (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user VARCHAR(30),
  senha VARCHAR(40)
);

create table tb_tasks(
	id int not null primary key auto_increment,
    fk_status int not null default 1,
    fk_user int not null,
    foreign key(fk_status) references tb_status(id),
    foreign key(fk_user) references td_user(id),
	task text not null,
    data_cadastrado datetime not null default current_timestamp
);