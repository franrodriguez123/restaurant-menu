<?php

use App\Models\User;

return [
    User::ADMIN => [],
    User::EMPLOYEE => [
        \App\Http\Controllers\Admin\DashboardController::class,
        \App\Http\Controllers\Admin\CategoriesController::class,
    ],
];