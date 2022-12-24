@extends('components.table',[

    'headerTitles' => [
        'id_produto',
        'quantidade',
        'valor',
        'data_inicio_pagamento',
        'data_final_pagamento',
        'forma_pagamento'
    ],

    'typeObj' => 'produto',
    'namePrimaryKey' => 'id_produto',
])
