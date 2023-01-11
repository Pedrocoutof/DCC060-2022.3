@extends('components.table',[
    'headerTitles' => ['id','nome','quantidade_estoque', 'preco_venda' ,'marca'],
    'typeObj' => 'produto',
    'namePrimaryKey' => 'id',
])
