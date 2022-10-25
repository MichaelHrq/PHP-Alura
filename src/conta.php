<?php

class Conta {

    private static $contas = 0;

    private $cpf;
    private $nome;
    private $saldo;

    public function __construct(string $nome, string $cpf){
        $this->nome  = $nome;
        $this->cpf   = $cpf;
        $this->saldo = 0;
        
        self::$contas ++;
    }

    public function sacar (float $valor): void {
        if ($valor > $this->saldo) {
            echo "Saldo indisponivel";
            return; }

        $this->saldo -= $valor; 
    }

    public function depositar (float $valor): void {
        if ($valor <= 0) {
            echo "Valor indisponivel";
            return; }

        $this->saldo += $valor;
    }

    public function tranferencia (float $valor , Conta $contaDestino): void {
        if ($valor > $this->saldo) {
            echo "Saldo indisponivel";
            return; }

        $this->sacar($this->valor);
        $contaDestino->saldo += $valor; 
    }

    public function saldo (): float {
        return $this->saldo; 
    }

    public static function numeroContas (float $valor): int {
        return self::$contas;
    }

}