CREATE DATABASE wm10;

USE wm10;

CREATE TABLE curso(
	cod_curso INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome VARCHAR(50) NOT NULL
);

CREATE TABLE aluno(
	cod_aluno INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome VARCHAR(50) NOT NULL,
	DN DATE NOT NULL,
	telefone VARCHAR(15) NOT NULL,
	data_cadastro DATE NOT NULL,	
	cod_curso INT,
    	FOREIGN KEY (cod_curso) REFERENCES curso (cod_curso)

);

INSERT INTO curso (nome) VALUES ('Banco de Dados');
INSERT INTO curso (nome) VALUES ('Probabilidade II');
INSERT INTO curso (nome) VALUES ('Desenvolvimento Web');

INSERT INTO aluno (nome, DN, telefone, data_cadastro, cod_curso) VALUES ('Ronaldo Oliveira', '1990-03-27', '(18) 98157-4352', '2019-04-22', '1');
INSERT INTO aluno (nome, DN, telefone, data_cadastro, cod_curso) VALUES ('Neymar Santos', '1992-02-15', '(18) 98555-4572', '2019-04-22', '1');
INSERT INTO aluno (nome, DN, telefone, data_cadastro, cod_curso) VALUES ('Ricardo Kaka', '1934-12-25', '(18) 99999-7777', '2019-04-22', '2');
INSERT INTO aluno (nome, DN, telefone, data_cadastro, cod_curso) VALUES ('Rivaldo Silva', '1990-03-28', '(18) 98118-1881', '2019-04-22', '2');
INSERT INTO aluno (nome, DN, telefone, data_cadastro, cod_curso) VALUES ('Rogerio Ceni', '1976-10-10', '(18) 99633-6336', '2019-04-22', '3');
INSERT INTO aluno (nome, DN, telefone, data_cadastro, cod_curso) VALUES ('Lucas Leal', '1998-03-27', '(18) 99607-0785', '2019-04-22', '3');
