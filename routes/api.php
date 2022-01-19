<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/getuserdetails', function(Request $request) {

  $ud =  UserDetails::where('user_id','=',$request->get('id'))->get();

  return response()->json($ud, 200);
});
Route::get('/deluserdetails', function(Request $request) {
  Skill::where('user_id','=', $request->get('id'))->delete();
    Education::where('user_id','=', $request->get('id'))->delete();
    Employment::where('user_id','=', $request->get('id'))->delete();
  $ud =  UserDetails::where('user_id','=',$request->get('id'))->delete();
  if($ud) {
    return response()->json([
      'status' => 'Success'
    ], 200);
  }
});
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/storefile', [DocumentController::class, 'store']);
Route::post('/userdetails', [Controller::class, 'store']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function(Request $request) {
        return auth()->user();
    });


    Route::post('/auth/logout', [AuthController::class, 'logout']);
});
Route::get('/example', [Controller::class, 'example'])->name('example route');
/*
Route::get('/', [Controller::class, 'routes'])
    ->name('route information')
    ->withoutMiddleware('api');
Route::get('/example', [Controller::class, 'example'])->name('example route');
Route::get('/error', [Controller::class, 'error'])->name('error route');
*/
