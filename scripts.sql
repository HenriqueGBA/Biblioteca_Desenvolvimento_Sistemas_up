-- Verifica se o schema não existe antes de criar
CREATE SCHEMA IF NOT EXISTS `biblioteca`;

-- Cria a tabela `usuarios` apenas se ela não existir
CREATE TABLE IF NOT EXISTS `biblioteca`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(140) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
);

-- Cria a tabela `livros` apenas se ela não existir
CREATE TABLE IF NOT EXISTS `biblioteca`.`livro` (
  `id_livro` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `autor` VARCHAR(45) NOT NULL,
  `ano` INT NOT NULL,
  PRIMARY KEY (`id_livro`)
);

-- Cria a tabela `clientes` apenas se ela não existir
CREATE TABLE IF NOT EXISTS `biblioteca`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_cliente`)
);

INSERT INTO `biblioteca`.`usuario`
(`id_usuario`,
`nome`,
`email`,
`senha`)
VALUES
(1,
"teste",
"teste@gmail.com",
"teste123");
