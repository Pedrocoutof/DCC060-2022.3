@extends('components.table',[
    'headerTitles' => ['id_produto','nome','quantidade','tipo','marca','valor_venda','modelo','categoria','descrição'],
    'typeObj' => 'produto',
    'namePrimaryKey' => 'id_produto',
])
