<?php


// 2 - Percorra um array de notas (cada uma de 0 a 10) e exiba a nota do aluno em questão com a informação se o aluno foi aprovado ou não.

// Se a nota for maior do que 6, o aluno foi aprovado. Caso contrário, foi reprovado

$alunos = [
    [
        "nome" => "Tommy Honesto Jeffersson",
        "nota" => 8.7,
        "aprroved" => false
    ],

    [
        "nome" => "Lucas",
        "nota" => 6.7,
        "aprroved" => false
    ],

    [
        "nome" => "Tonnynho the thunder",
        "nota" => 8.0,
        "aprroved" => false
    ],


    [
        "nome" => "Memphis Depay",
        "nota" => 10,
        "aprroved" => false
    ],
];

$approvedStudents = [];
$deniedAlunos = [];


foreach ($alunos as $key => $alunoDaVez) {

    if ($alunoDaVez['nota'] >= 6) {
        $alunoDaVez['aprroved'] = true;
        $approvedStudents[$key] = $alunoDaVez;
    }

    if ($alunoDaVez['nota'] < 6) {
        $deniedAlunos[$key] = $alunoDaVez;
    }
}

foreach ($approvedStudents as $key => $alunoDaVez) {
    echo "Alunos aprovados: {$alunoDaVez['nome']} \n";
}

foreach ($deniedAlunos as $key => $alunoDaVez) {
    echo "\n\nAlunos reprovados: {$alunoDaVez['nome']} \n";
}