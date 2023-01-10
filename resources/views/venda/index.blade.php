@extends('components.table',[

    'headerTitles' => [
        'id_venda',
        'id_cliente',
        'quantidade',
        'valor',
        'data_inicio_pagamento',
    ],

    'typeObj' => 'venda',
    'namePrimaryKey' => 'id_venda',
])
