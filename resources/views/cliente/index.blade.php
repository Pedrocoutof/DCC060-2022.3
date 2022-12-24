@extends('components.table',[

    'headerTitles' => [
        'id_cliente',
        'nome_completo',
        'data_nascimento',
    ],

    'typeObj' => 'cliente',
    'namePrimaryKey' => 'id_cliente',
])
