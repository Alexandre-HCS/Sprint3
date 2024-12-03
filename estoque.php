<?php
class Estoque {
    private $quantidade;

    public function __construct($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function verificarEstoque() {
        return $this->quantidade <= 0; // Retorna true se o estoque estiver vazio
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function adicionarEstoque($quantidade) {
        $this->quantidade += $quantidade;
    }

    public function removerEstoque($quantidade) {
        if ($this->quantidade - $quantidade >= 0) {
            $this->quantidade -= $quantidade;
        } else {
            echo "Não é possível remover mais do que o estoque disponível.";
        }
    }
}
?>