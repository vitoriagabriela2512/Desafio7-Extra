<?php

class Fidelidade {

    private $nome;
    private $pontos;
    private $valorCompra;

    public function __construct($nome, $pontos, $valorCompra) {
        $this->nome = $nome;
        $this->pontos = $pontos;
        $this->valorCompra = $valorCompra;
    }

    // converterParaPontos
    public function converterParaPontos() {
        $novosPontos = floor($this->valorCompra / 10); // cada 10 reais = 1 ponto
        $this->pontos += $novosPontos;
    }

    // verificarResgate
    public function verificarResgate($custoBrinde) {
        if ($this->pontos >= $custoBrinde) {
            return "Resgate Autorizado";
        }
        return "Pontos Insuficientes";
    }

    // aplicarResgate
    public function aplicarResgate($custoBrinde) {
        if ($this->verificarResgate($custoBrinde) == "Resgate Autorizado") {
            $this->pontos -= $custoBrinde;
        }
    }

    // extrato
    public function extrato() {

        $valorEmReais = $this->pontos * 0.50;

        echo "<strong>Cliente:</strong> {$this->nome}<br>";
        echo "<strong>Pontos atuais:</strong> {$this->pontos}<br>";
        echo "<strong>Equivalente em desconto:</strong> R$ " . number_format($valorEmReais, 2, ',', '.') . "<br>";
    }
}