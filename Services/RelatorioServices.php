<?php
require_once ('../dao/ProdutoDAO.php');


/**
 * Description of RelatorioServices
 *
 * @author Isnack Developer
 */
class RelatorioServices {
    
    public function get() {
        $produtoDAO = new ProdutoDAO();
        $produtos= $produtoDAO->getProductMinimum();
        return json_encode($produtos);
        
    }
}
