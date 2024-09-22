<?php
// 3.Crie um programa que converta a string '{"nome":"Vinicius","anoNascimento":1997,"profissao":"Dev"}' em um objeto.

$pessoa = [
    "nome" => "Eduardo Melo de Oliveira",
    "birthday"=> 2005,
    "profissao" => "Desenvolvedor back-end"
];

$pessoaToJson = json_encode($pessoa);

echo $pessoaToJson;