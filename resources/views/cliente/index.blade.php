@extends('components.table',[

    'headerTitles' => [
        'id_pessoa',
        'nome',
        'data_nascimento'
    ],

    'typeObj' => 'cliente',
    'namePrimaryKey' => 'id_pessoa',
])
