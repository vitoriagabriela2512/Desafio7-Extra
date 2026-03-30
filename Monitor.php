<?php

class Monitor{

    private $leituraAnterior;
    private $leituraAtual;
    private $bandeira;

    public function __construct($leituraAnterior, $leituraAtual, $bandeira) {
        $this->leituraAnterior = $leituraAnterior;
        $this->leituraAtual = $leituraAtual;
        $this->bandeira = $bandeira;
    }

    // calcularConsumo
    public function calcularConsumo() {
        return $this->leituraAtual - $this->leituraAnterior;
    }

    // definirTarifa
    public function definirTarifa() {

        switch ($this->bandeira) {
            case "verde":
                return 0.50;
            case "amarela":
                return 0.65;
            case "vermelha":
                return 0.80;
            default:
                return 0;
        }
    }

    // calcularValorTotal
    public function calcularValorTotal() {
        return $this->calcularConsumo() * $this->definirTarifa();
    }

    // exibirFatura
    public function exibirFatura() {

        $consumo = $this->calcularConsumo();
        $tarifa = $this->definirTarifa();
        $total = $this->calcularValorTotal();

        echo "<strong>Consumo:</strong> {$consumo} KWh<br>";
        echo "<strong>Bandeira:</strong> " . ucfirst($this->bandeira) . "<br>";
        echo "<strong>Tarifa por KWh:</strong> R$ " . number_format($tarifa, 2, ',', '.') . "<br>";
        echo "<strong>Valor Total:</strong> R$ " . number_format($total, 2, ',', '.') . "<br>";
    }
}