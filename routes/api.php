<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\PumpController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\GasTypeController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PointController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);
Route::post('station', [StationController::class, 'store']);
Route::post('fuel', [FuelController::class, 'store']);
Route::post('pump', [PumpController::class, 'store']);
Route::post('gastype', [GasTypeController::class, 'store']);
Route::post('operator', [OperatorController::class, 'store']);
Route::post('supply', [SupplyController::class, 'store']);
Route::post('product', [ProductController::class, 'store']);
Route::post('group', [ProductGroupController::class, 'store']);
Route::post('sale', [SaleController::class, 'store']);
Route::get('sale/{sale}', [SaleController::class, 'show']);
Route::post('detail', [DetailController::class, 'store']);
Route::get('detail/{sale}', [DetailController::class, 'show']);
Route::post('promotion', [PromotionController::class, 'store']);
Route::post('rule', [RuleController::class, 'store']);
Route::post('prize', [PrizeController::class, 'store']);


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);
    Route::get('show_user', [ApiController::class, 'show']);
    Route::post('update_user', [ApiController::class, 'update']);
    Route::get('get_promotion', [PromotionController::class, 'show']);
    Route::post('ticket', [TicketController::class, 'store']);
    Route::get('point', [PointController::class, 'show']);
});
