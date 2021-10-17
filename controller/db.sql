--CREATE DATABASE taskcontroller

DROP TABLE IF EXISTS "usuario" CASCADE;
CREATE TABLE usuario (
                         id SERIAL PRIMARY KEY,
                         email VARCHAR(90) NOT NULL,
                         senha VARCHAR(32) NOT NULL,
                         nome VARCHAR(90) NOT NULL,
                         api_key VARCHAR(32) NOT NOT,
                         bitrix_id VARCHAR(10) NOT NULL,
                         admin INTEGER
);

DROP TABLE IF EXISTS "unidade" CASCADE;
CREATE TABLE unidade (
                        id SERIAL PRIMARY KEY,
                        nome VARCHAR(50),
                        sigla VARCHAR(10)
);

DROP TABLE IF EXISTS "tecnologia" CASCADE;
CREATE TABLE tecnologia (
                        id SERIAL PRIMARY KEY,
                        tecnologia VARCHAR(50)
);

DROP TABLE IF EXISTS "colaborador" CASCADE;
CREATE TABLE colaborador (
                        id SERIAL PRIMARY KEY,
                        nome VARCHAR(90) NOT NULL,
                        bitrix_id VARCHAR(10) NOT NULL,
                        unidade_id INTEGER REFERENCES unidade(id),
                        tecnologia_id INTEGER REFERENCES tecnologia(id)
);

DROP TABLE IF EXISTS "task" CASCADE;
CREATE TABLE task (
                        id SERIAL PRIMARY KEY,
                        usuario_id INTEGER REFERENCES usuario(id),
                        title VARCHAR(90) NOT NULL,
                        descript VARCHAR(500) NOT NULL,
                        deadline VARCHAR(50),
                        responsible_id INTEGER REFERENCES colaborador(id), 
                        group_id VARCHAR(10) -- 523 = Zabbix Alarmes                    
);

DROP TABLE IF EXISTS "task_auditor" CASCADE;
CREATE TABLE task_auditor (
                        id SERIAL PRIMARY KEY,
                        task_id INTEGER REFERENCES task(id),
                        auditor_id INTEGER REFERENCES colaborador_id(id)
);

DROP TABLE IF EXISTS "task_accomplice" CASCADE;
CREATE TABLE task_accomplice (
                        id SERIAL PRIMARY KEY,
                        task_id INTEGER REFERENCES task(id),
                        accomplice_id INTEGER REFERENCES colaborador_id(id)
);

