<?php

class Restaurante {

    private $consumo;
    private $couvert;
    private $taxaServico;
    private $numPessoas;

    public function __construct($consumo, $numPessoas) {
        $this->consumo = $consumo;
        $this->numPessoas = $numPessoas;
        $this->couvert = 0;
        $this->taxaServico = 0.10;
    }

    // adicionarCouvert
    public function adicionarCouvert($valor) {
        $this->couvert += $valor;
    }

    // calcularTaxaServico
    public function calcularTaxaServico() {
        return $this->consumo * $this->taxaServico;
    }

    // totalComTaxas
    public function totalComTaxas() {
        return $this->consumo +
               $this->calcularTaxaServico() +
               $this->couvert;
    }

    // dividirConta
    public function dividirConta() {
        return $this->totalComTaxas() / $this->numPessoas;
    }

    // exibirConta
    public function exibirConta() {

        echo "<strong>Consumo:</strong> R$ " . number_format($this->consumo, 2, ',', '.') . "<br>";
        echo "<strong>Taxa (10%):</strong> R$ " . number_format($this->calcularTaxaServico(), 2, ',', '.') . "<br>";
        echo "<strong>Couvert:</strong> R$ " . number_format($this->couvert, 2, ',', '.') . "<br>";
        echo "<strong>Total:</strong> R$ " . number_format($this->totalComTaxas(), 2, ',', '.') . "<br>";
        echo "<strong>Pessoas:</strong> {$this->numPessoas}<br>";
        echo "<strong>Valor por pessoa:</strong> R$ " . number_format($this->dividirConta(), 2, ',', '.') . "<br>";
    }
}