<?php
require_once ('..\dao\EstoqueDAO.php');

/**
 * Description of EstoqueServices
 *
 * @author Isnack Developer
 */
class EstoqueServices {
    
    public function getEstoque() {
        $estoqueDAO = new EstoqueDAO();
        $estoque = $estoqueDAO->getEstoque();
        return json_encode($estoque);
    }
    
}
