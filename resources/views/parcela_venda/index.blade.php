@extends('components.table',[

    'headerTitles' => [
        'id_parcela',
        'id_venda',
        'pago',
        'valor',
        'data_pagamento',
        'data_vencimento'
    ],

    'typeObj' => 'parcela_vendas',
    'namePrimaryKey' => 'id_parcela',
])
