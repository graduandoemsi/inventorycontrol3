-- Após inserir um registo na tabela saida_produto, atualiza o estoque

DELIMITER //
CREATE TRIGGER `TRG_SaidaProduto_AI` AFTER INSERT ON `saida_produto`
FOR EACH ROW
BEGIN
      CALL Procedure_AtualizaEstoque (new.id_produto, new.quantidade * -1);
END //
DELIMITER ;


