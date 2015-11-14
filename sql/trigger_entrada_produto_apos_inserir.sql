-- Triguer apos a inserção de um poduto na tabela de entrada de poduto, atualizamos o estoque

DELIMITER //
CREATE TRIGGER `TRIGGER_EntradaProduto_AI` AFTER INSERT ON `entrada_produto`
FOR EACH ROW
BEGIN
      CALL Procedure_AtualizaEstoque (new.id_produto, new.quantidade);
END //
DELIMITER ;


