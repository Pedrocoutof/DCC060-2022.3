@extends('components.table',[

    'headerTitles' => [
        'id',
        'id_cliente',
        'valor',
        'data_inicio_pagamento',
    ],

    'typeObj' => 'venda',
    'namePrimaryKey' => 'id',
])
