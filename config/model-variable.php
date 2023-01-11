<?php

use App\Models\Company;
use App\Models\Employee;


return [
    'models' =>[
        /*
        *Company Table and Model
        */
        'company' =>[
            'table' => 'companies',
            'class' => Company::class,
        ],

          /*
        *Employee Table and Model
        */
        'employee' =>[
            'table' => 'employees',
            'class' => Employee::class,
        ],
    ]
]
?>