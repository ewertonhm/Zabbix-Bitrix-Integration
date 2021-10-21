--CREATE DATABASE taskcontroller
DROP TABLE IF EXISTS "colaborador_tecnologia";
DROP TABLE IF EXISTS "colaborador_unidade";
DROP TABLE IF EXISTS "task_auditor";
DROP TABLE IF EXISTS "task_accomplice";
DROP TABLE IF EXISTS "task";
DROP TABLE IF EXISTS "colaborador";
DROP TABLE IF EXISTS "usuario";
DROP TABLE IF EXISTS "unidade";
DROP TABLE IF EXISTS "tecnologia";
DROP TABLE IF EXISTS "n3_accomplice";


CREATE TABLE usuario (
                         id SERIAL PRIMARY KEY,
                         email VARCHAR(90) NOT NULL,
                         senha VARCHAR(32) NOT NULL,
                         nome VARCHAR(90) NOT NULL,
                         admin INTEGER
);


CREATE TABLE unidade (
                        id SERIAL PRIMARY KEY,
                        nome VARCHAR(50),
                        sigla VARCHAR(10)
);

CREATE TABLE tecnologia (
                        id SERIAL PRIMARY KEY,
                        tecnologia VARCHAR(50)
);


CREATE TABLE colaborador (
                        id SERIAL PRIMARY KEY,
                        nome VARCHAR(90) NOT NULL,
                        bitrix_id VARCHAR(10) NOT NULL
);

CREATE TABLE colaborador_unidade (
                        id SERIAL PRIMARY KEY,
                        unidade_id INTEGER REFERENCES unidade(id),
                        colaborador_id INTEGER REFERENCES colaborador(id)
);


CREATE TABLE colaborador_tecnologia (
                        id SERIAL PRIMARY KEY,
                        tecnologia_id INTEGER REFERENCES tecnologia(id),
                        colaborador_id INTEGER REFERENCES colaborador(id)
);

CREATE TABLE task (
                        id SERIAL PRIMARY KEY,
                        title VARCHAR(90) NOT NULL,
                        responsible_id INTEGER REFERENCES colaborador(id), 
                        unidade_id INTEGER REFERENCES unidade(id),
                        group_id VARCHAR(10) -- 523 = Zabbix Alarmes, campo adicionado para caso seja utilizado futuramente                   
);

CREATE TABLE task_auditor (
                        id SERIAL PRIMARY KEY,
                        task_id INTEGER REFERENCES task(id),
                        auditor_id INTEGER REFERENCES colaborador(id)
);

CREATE TABLE task_accomplice (
                        id SERIAL PRIMARY KEY,
                        task_id INTEGER REFERENCES task(id),
                        accomplice_id INTEGER REFERENCES colaborador(id)
);

CREATE TABLE n3_accomplice (
                        id SERIAL PRIMARY KEY,
                        nome VARCHAR(100) NOT NULL,
                        bitrix_id VARCHAR(10) NOT NULL
);