<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('makeuser', function () {
    $user = new App\User();
    $user->password = Hash::make('admin123');
    $user->email = 'dipesh@gmail.com';
    $user->address = 'Kathmandu';
    $user->name = 'Admin';
    $user->phone = '9800916365';
    $user->role = 1;
    $user->save();
});
