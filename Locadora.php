<?php

class Locadora{

    private $modelo;
    private $valorDiaria;
    private $kmInicial;
    private $kmFinal;

    public function __construct($modelo, $valorDiaria, $kmInicial, $kmFinal) {
        $this->modelo = $modelo;
        $this->valorDiaria = $valorDiaria;
        $this->kmInicial = $kmInicial;
        $this->kmFinal = $kmFinal;
    }

    // Valor base das diárias
    public function calcularDias($quantidade) {
        return $quantidade * $this->valorDiaria;
    }

    // KM rodado
    public function calcularKmRodado() {
        return $this->kmFinal - $this->kmInicial;
    }

    // Custo extra por KM excedente
    public function calcularCustoExtra($limiteGratis, $valorPorKm) {
        $kmRodado = $this->calcularKmRodado();

        if ($kmRodado > $limiteGratis) {
            $excedente = $kmRodado - $limiteGratis;
            return $excedente * $valorPorKm;
        }

        return 0;
    }

    // Fatura final
    public function gerarFatura($dias, $limiteGratis, $valorPorKm) {

        $base = $this->calcularDias($dias);
        $kmRodado = $this->calcularKmRodado();
        $extra = $this->calcularCustoExtra($limiteGratis, $valorPorKm);
        $total = $base + $extra;

        return "
        <h3>Fatura</h3>
        <p><strong>Modelo:</strong> {$this->modelo}</p>
        <p><strong>Dias:</strong> {$dias}</p>
        <p><strong>KM rodados:</strong> {$kmRodado} km</p>
        <p><strong>Valor diárias:</strong> R$ " . number_format($base, 2, ',', '.') . "</p>
        <p><strong>Extra KM:</strong> R$ " . number_format($extra, 2, ',', '.') . "</p>
        <p><strong>Total:</strong> R$ " . number_format($total, 2, ',', '.') . "</p>
        ";
    }
}