/* cria user;*/
INSERT INTO td_user (user, senha) VALUES ('usuarioficticio', 'senha123');

/* cria tarefa;*/
INSERT INTO tb_tasks (fk_user, task)
VALUES (1, 'Fazer compras no mercado');

/* atualizar uma tarefa de pendente para realizado;*/
UPDATE tb_tasks SET fk_status = 2 WHERE id = 1 AND fk_user = 1;

/* atualizar uma tarefa de realizado para pendente;*/
UPDATE tb_tasks SET fk_status = 1 WHERE id = 1 AND fk_user = 1;
 
/* todas as tasks de um user;*/
SELECT tb_tasks.id, tb_tasks.fk_status, tb_tasks.task, tb_tasks.data_cadastrado, tb_status.status
FROM tb_tasks
JOIN td_user ON td_user.id = tb_tasks.fk_user
JOIN tb_status ON tb_status.id = tb_tasks.fk_status
WHERE td_user.id = 1;

/* todas as tasks com status pendentes;*/
SELECT id, task, data_cadastrado 
FROM tb_tasks 
WHERE fk_user = 1 AND fk_status = (SELECT id FROM tb_status WHERE status = 'pendente');
