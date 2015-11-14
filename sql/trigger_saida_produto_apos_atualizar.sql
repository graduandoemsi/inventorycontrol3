-- Trigguer executada apos atualizar um registro na tabela saida_produto, atualizamos o estoque 

DELIMITER //
CREATE TRIGGER `TRIGGER_SaidaProduto_AU` AFTER UPDATE ON `saida_produto`
FOR EACH ROW
BEGIN
      CALL Procedure_AtualizaEstoque (new.id_produto, old.quantidade - new.quantidade);
END //
DELIMITER ;


