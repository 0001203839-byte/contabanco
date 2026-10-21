<?php

    class ContaBancaria {
        private string $titular;
        private int $numeroConta;
        private float $saldo;

        public function __construct(string $titular, int $numeroConta) {
        $this->titular = $titular;
        $this->numeroConta = $numeroConta;
        $this->saldo = 0.0;
        }
        public function getTitular(): string {
        return $this->titular;
        }
        public function setTitular(string $titular): void {
        $this->titular = $titular;
        }
        public function getNumeroConta(): int {
        return $this->numeroConta;
        }
        public function setNumeroConta(int $numeroConta): void {
        $this->numeroConta = $numeroConta;
        }
        public function getSaldo(): float {
        return $this->saldo;
        }
        public function depositar(float $valor): void {
        if ($valor > 0) {
        $this->saldo += $valor;
        echo "Depósito de " . number_format($valor, 2, ',', '.') . "€ realizado. Novo saldo: " . number_format($this->saldo, 2, ',', '.') . "€\n";
        } else {
        echo "Erro: O valor do depósito tem de ser superior a zero.\n";
        }
        }
        public function sacar(float $valor): void {
        if ($valor > $this->saldo) {
        echo "Erro: Saldo insuficiente para o levantamento de " . number_format($valor, 2, ',', '.') . "€.\n";
        } elseif ($valor <= 0) {
        echo "Erro: O valor do levantamento tem de ser superior a zero.\n";
        } else {
        $this->saldo -= $valor;
        echo "Levantamento de " . number_format($valor, 2, ',', '.') . "€ realizado com sucesso.\n";
        }
        }
        public function exibirInformacoes(): void {
        echo "Titular: {$this->titular} | Número da Conta: {$this->numeroConta} | Saldo Atual: " . number_format($this->saldo, 2, ',', '.') . "€\n";
        }
        }
        class BancoApp {
        public static function main(): void {
        echo "--- Criação das Contas ---\n";
        $conta1 = new ContaBancaria("Felipe Souza", 1001);
        $conta2 = new ContaBancaria("Alice Silva", 1002);
        $conta1->exibirInformacoes();
        $conta2->exibirInformacoes();
        echo "\n--- Operações na Conta 1 (Felipe Souza) ---\n";
        $conta1->depositar(500.00);
        $conta1->exibirInformacoes();
        $conta1->sacar(200.00);
        $conta1->exibirInformacoes();
        $conta1->sacar(400.00);
        $conta1->exibirInformacoes();
        echo "\n--- Operações na Conta 2 (Alice Silva) ---\n";
        $conta2->depositar(1000.50);
        $conta2->exibirInformacoes();
        $conta2->sacar(1000.50);
        $conta2->exibirInformacoes();
        }
        }       
        BancoApp::main();
        ?>