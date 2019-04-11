<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        
        'id_number' => '15789456',
        'passport' => '123456789',
        'phone' => '123456789',
        'cellphone' => '123456789',
    ];
});
