<?php

class Desempenha{

    private $nome;
    private $salarioBase;
    private $totalVendas;

    public function __construct($nome, $salarioBase, $totalVendas) {
        $this->nome = $nome;
        $this->salarioBase = $salarioBase;
        $this->totalVendas = $totalVendas;
    }

    // calcularComissao
    public function calcularComissao() {
        return $this->totalVendas * 0.05;
    }

    // verificarMeta
    public function verificarMeta($meta) {
        if ($this->totalVendas > $meta) {
            return 500; // bônus fixo
        }
        return 0;
    }

    // getSalarioFinal
    public function getSalarioFinal($meta) {
        return $this->salarioBase +
               $this->calcularComissao() +
               $this->verificarMeta($meta);
    }

    // exibirContraCheque
    public function exibirContraCheque($meta) {

        $comissao = $this->calcularComissao();
        $bonus = $this->verificarMeta($meta);
        $total = $this->getSalarioFinal($meta);

        echo "<strong>Vendedor:</strong> {$this->nome}<br>";
        echo "<strong>Total de Vendas:</strong> R$ " . number_format($this->totalVendas, 2, ',', '.') . "<br>";
        echo "<strong>Comissão (5%):</strong> R$ " . number_format($comissao, 2, ',', '.') . "<br>";
        echo "<strong>Bônus:</strong> R$ " . number_format($bonus, 2, ',', '.') . "<br>";
        echo "<strong>Salário Final:</strong> R$ " . number_format($total, 2, ',', '.') . "<br>";
    }
}