-- Estado
INSERT INTO `estado`(`nome`,`uf`)VALUES('Minas Gerais','MG');
-- Cidade
INSERT INTO `cidade`(`nome`,`id_estado`)VALUES('Pouso Alegre',1);
-- Tipo de contrato
INSERT INTO `tipo_contrato`(`tipo`)VALUES('Aluguel');
INSERT INTO `tipo_contrato`(`tipo`)VALUES('Compra');
-- Tipo de imóvel
INSERT INTO `imovel_tipo`(`tipo`)VALUES('Casa');
INSERT INTO `imovel_tipo`(`tipo`)VALUES('Apartamento');
INSERT INTO `imovel_tipo`(`tipo`)VALUES('Casa/Fundos');
INSERT INTO `imovel_tipo`(`tipo`)VALUES('Comércio');
-- Imovel
INSERT INTO `imovel`(`cep`,`bairro`,`endereco`,`numero`,`metragem`,`latitude`,`longitude`,`imovel_tipo`,`tipo_contrato`,`cidade`)
VALUES('37550000','Jardim Amazonas','Rua Guaxupé','248','200','-22.237029','-45.954741',1,1,1);
INSERT INTO `imovel`(`cep`,`bairro`,`endereco`,`numero`,`metragem`,`latitude`,`longitude`,`imovel_tipo`,`tipo_contrato`,`cidade`)
VALUES('37550000','Jardim Amazonas','Rua Lecir Augusto de Paula','155','60','-22.236929','-45.954248',3,1,1);
INSERT INTO `imovel`(`cep`,`bairro`,`endereco`,`numero`,`metragem`,`latitude`,`longitude`,`imovel_tipo`,`tipo_contrato`,`cidade`)
VALUES('37550000','São João','Rua Piranguinho','84','84','-22.238697','-45.9562',3,1,1);
INSERT INTO `imovel`(`cep`,`bairro`,`endereco`,`numero`,`metragem`,`latitude`,`longitude`,`imovel_tipo`,`tipo_contrato`,`cidade`)
VALUES('37550000','Jardim América','Rua José Pereira Goulart','1','40','-22.234605','-45.944806',4,2,1);
INSERT INTO `imovel`(`cep`,`bairro`,`endereco`,`numero`,`metragem`,`latitude`,`longitude`,`imovel_tipo`,`tipo_contrato`,`cidade`)
VALUES('37550000','Centro','Av. Tiradentes','215','65','-22.234347','-45.940386',2,2,1);
INSERT INTO `imovel`(`cep`,`bairro`,`endereco`,`numero`,`metragem`,`latitude`,`longitude`,`imovel_tipo`,`tipo_contrato`,`cidade`)
VALUES('37550000','Centro','Av. Jacy Laraya Vieira','95','35','-22.229481','-45.928155',4,1,1);
INSERT INTO `imovel`(`cep`,`bairro`,`endereco`,`numero`,`metragem`,`latitude`,`longitude`,`imovel_tipo`,`tipo_contrato`,`cidade`)
VALUES('37550000','São Carlos','Rua Divino Augusto de Oliveira','162','80','-22.256015','-45.923821',1,1,1);
