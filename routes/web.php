<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/walletr', function () {
    $user = User::FindorFail("5");
        $wallet = $user->walletbalance;
        $updated = $wallet + 100;
        $user->update(['walletbalance' => $updated]);

    return ['User' => $wallet, 'Userup' => $updated ];
});*/

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});


require __DIR__.'/auth.php';
