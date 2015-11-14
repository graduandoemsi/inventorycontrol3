DELIMITER //
CREATE TRIGGER `TRG_EntradaProduto_AU` AFTER UPDATE ON `entrada_produto`
FOR EACH ROW
BEGIN
      CALL SP_AtualizaEstoque (new.id_produto, new.quantidade - old.quantidade );
END //
DELIMITER ;