<?php


//criando function que verifica o ano e emite mensagem se o filme é velho,novo ou clássico


function movieStatus(int $year): void
{


    if ($year < 1990) {
        echo "Filme antigo";
    } else if ($year >= 1990 && $year <= 2020) {
        echo "Filme clássico";
    } else {
        echo "Apenas outro filme";
    }

}

//function sem retorno 




