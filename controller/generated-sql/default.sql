
BEGIN;

-----------------------------------------------------------------------
-- colaborador
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "colaborador" CASCADE;

CREATE TABLE "colaborador"
(
    "id" serial NOT NULL,
    "nome" VARCHAR(90) NOT NULL,
    "bitrix_id" VARCHAR(10) NOT NULL,
    "unidade_id" INTEGER,
    "tecnologia_id" INTEGER,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- task
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "task" CASCADE;

CREATE TABLE "task"
(
    "id" serial NOT NULL,
    "usuario_id" INTEGER,
    "title" VARCHAR(90) NOT NULL,
    "descript" VARCHAR(500) NOT NULL,
    "deadline" VARCHAR(50),
    "responsible_id" INTEGER,
    "group_id" VARCHAR(10),
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- task_accomplice
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "task_accomplice" CASCADE;

CREATE TABLE "task_accomplice"
(
    "id" serial NOT NULL,
    "task_id" INTEGER,
    "accomplice_id" INTEGER,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- task_auditor
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "task_auditor" CASCADE;

CREATE TABLE "task_auditor"
(
    "id" serial NOT NULL,
    "task_id" INTEGER,
    "auditor_id" INTEGER,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- tecnologia
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "tecnologia" CASCADE;

CREATE TABLE "tecnologia"
(
    "id" serial NOT NULL,
    "tecnologia" VARCHAR(50),
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- unidade
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "unidade" CASCADE;

CREATE TABLE "unidade"
(
    "id" serial NOT NULL,
    "nome" VARCHAR(50),
    "sigla" VARCHAR(10),
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- usuario
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "usuario" CASCADE;

CREATE TABLE "usuario"
(
    "id" serial NOT NULL,
    "email" VARCHAR(90) NOT NULL,
    "senha" VARCHAR(32) NOT NULL,
    "nome" VARCHAR(90) NOT NULL,
    "api_key" VARCHAR(32) NOT NULL,
    "bitrix_id" VARCHAR(10) NOT NULL,
    "admin" INTEGER,
    PRIMARY KEY ("id")
);

ALTER TABLE "colaborador" ADD CONSTRAINT "colaborador_tecnologia_id_fkey"
    FOREIGN KEY ("tecnologia_id")
    REFERENCES "tecnologia" ("id");

ALTER TABLE "colaborador" ADD CONSTRAINT "colaborador_unidade_id_fkey"
    FOREIGN KEY ("unidade_id")
    REFERENCES "unidade" ("id");

ALTER TABLE "task" ADD CONSTRAINT "task_responsible_id_fkey"
    FOREIGN KEY ("responsible_id")
    REFERENCES "colaborador" ("id");

ALTER TABLE "task" ADD CONSTRAINT "task_usuario_id_fkey"
    FOREIGN KEY ("usuario_id")
    REFERENCES "usuario" ("id");

ALTER TABLE "task_accomplice" ADD CONSTRAINT "task_accomplice_accomplice_id_fkey"
    FOREIGN KEY ("accomplice_id")
    REFERENCES "colaborador" ("id");

ALTER TABLE "task_accomplice" ADD CONSTRAINT "task_accomplice_task_id_fkey"
    FOREIGN KEY ("task_id")
    REFERENCES "task" ("id");

ALTER TABLE "task_auditor" ADD CONSTRAINT "task_auditor_auditor_id_fkey"
    FOREIGN KEY ("auditor_id")
    REFERENCES "colaborador" ("id");

ALTER TABLE "task_auditor" ADD CONSTRAINT "task_auditor_task_id_fkey"
    FOREIGN KEY ("task_id")
    REFERENCES "task" ("id");

COMMIT;
