-- --------------------------------
-- Estructura de la usuarios
-- --------------------------------

CREATE SEQUENCE usuario_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

DROP TABLE IF EXISTS "usuarios";

CREATE TABLE "usuarios"(
    "id" int4 DEFAULT nextval('usuario_id_seq'::regclass) NOT NULL,
    "username" varchar(100) COLLATE "default",
    "password" varchar(100) COLLATE "default",
    "fecha_creacion" date DEFAULT ('now'::text)::date NOT NULL
)
WITH (OIDS=FALSE)
;

-- ----------------------------
-- Primary Key en la tabla usuario
-- ----------------------------
ALTER TABLE "usuarios" ADD PRIMARY KEY ("id");


-- ----------------------------
-- Insertar elementos
-- ----------------------------
BEGIN;
INSERT INTO "usuarios" VALUES (nextval('usuario_id_seq'::regclass), 'rapaza', '123456', '2015-10-06');
INSERT INTO "usuarios" VALUES (nextval('usuario_id_seq'::regclass), 'krosas', '123456', '2015-10-06');
COMMIT;
