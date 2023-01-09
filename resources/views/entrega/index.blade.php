@extends('components.table',[

    'headerTitles' => [
        'id_venda',
        'id_transportadora',
        'codigo',
        'valor_frete',
        'data_entrega_prevista',
        'entregue',
    ],

    'typeObj' => 'venda',
    'namePrimaryKey' => 'codigo',
])
