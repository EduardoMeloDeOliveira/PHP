<?php


$userInput = 0;


$conta = [
    "titular" => "Eduardo Melo de Oliveira",
    "saldo" => 140000000
];


do {
    echo "***************************\n";
    echo "Titular: {$conta['titular']} \n";
    echo "Saldo: {$conta['saldo']} \n";
    echo "***************************\n";

    echo "1. Consultar saldo atual \n";
    echo "2. Sacar valor \n";
    echo "3. Depositar valor \n";
    echo "4. Sair\n \n";

    $userInput = fgets(STDIN);

    if ($userInput == 4) {
        echo "Obrigado e volta sempre!";
    }

    if ($userInput == 1) {
        echo "Saldo atual: R$ {$conta['saldo']} \n\n";
    }

    if ($userInput == 2) {
        echo "Valor do saque:  ";
        $withDraw = fgets(STDIN);

        if ($withDraw > $conta['saldo']) {
            echo "saldo insuficiente \n\n";
        } else {
            $conta['saldo'] -= $withDraw;
        }

    }

    if ($userInput == 3) {
        echo "Valor do depósito: ";
        $accountEntraance = fgets(STDIN);

        if ($accountEntraance <= 0) {
            echo "Valores nulos ou negativos não podem ser adicionados \n\n";
        } else {
            $conta['saldo'] += $accountEntraance;

        }
    }


} while ($userInput != 4);