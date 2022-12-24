@extends('components.table',[

    'headerTitles' => [
        'id_parcela',
        'id_venda',
        'pago',
        'valor',
        'data_pagamento',
        'data_vencimento'
    ],

    'typeObj' => 'parcela_compras',
    'namePrimaryKey' => 'id_parcela',
])
