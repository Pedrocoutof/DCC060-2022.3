@extends('components.table',[

    'headerTitles' => [
        'id_parcela',
        'id_compra',
        'pago',
        'valor',
        'data_pagamento',
        'data_vencimento'
    ],

    'typeObj' => 'parcela_compras',
    'namePrimaryKey' => 'id_parcela',
])
