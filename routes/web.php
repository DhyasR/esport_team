    <?php

    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\Admin\PlayerController as AdminPlayerController;
    use App\Http\Controllers\Admin\TeamController as AdminTeamController;
    use App\Http\Controllers\Editor\PlayerController as EditorPlayerController;
    use App\Http\Controllers\Editor\TeamController as EditorTeamController;
    use App\Http\Controllers\PlayerController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/', [HomeController::class, 'indexTeams'])->name('home');

    Route::group(
        [
            'middleware' => 'admin',
            'prefix' => 'admin',
            'as' => 'admin'
        ],
        function () {
            Route::get('/player/addplayer', [AdminPlayerController::class, 'addPlayer'])->name('player.add');

            Route::get('/team/addteam', [AdminTeamController::class, 'addTeam'])->name('team.add');
        }
    );

    Route::group(
        [
            'middleware' => 'team',
            'prefix' => 'team',
            'as' => 'team'
        ],
        function () {
            Route::get('/addteam', [EditorTeamController::class, 'addTeam'])->name('team.add');
        }
    );

    Route::group(
        [
            'middleware' => 'player',
            'prefix' => 'player',
            'as' => 'player'
        ],
        function () {
            Route::get('/addplayer', [EditorPlayerController::class, 'addPlayer'])->name('player.add');
        }
    );

    // TEAM FOR ADMIN
    Route::get('/team/{team}', [AdminTeamController::class, 'showDetailTeam'])->name('team.showDetail');
    Route::post('/team/storeTeam', [AdminTeamController::class, 'storeTeam'])->middleware('auth')->name('team.store');
    Route::get('/team/editTeam/{team}', [AdminTeamController::class, 'editTeam'])->middleware('auth')->name('team.edit');
    Route::put('/team/updateTeam/{team}', [AdminTeamController::class, 'updateTeam'])->middleware('auth')->name('team.update');
    Route::delete('/team/destroy/{team}', [AdminTeamController::class, 'destroyTeam'])->middleware('auth')->name('team.destroy');

    // PLAYER FOR ADMIN
    Route::get('/showAllPlayer', [HomeController::class, 'indexPlayers'])->name('player.showAll');
    Route::get('/player/{player}', [AdminPlayerController::class, 'showDetailPlayer']);
    Route::post('/player/storePlayer', [AdminPlayerController::class, 'storePlayer'])->middleware('auth')->name('player.store');
    Route::get('/player/editPlayer/{player}', [AdminPlayerController::class, 'editPlayer'])->middleware('auth')->name('player.edit');
    Route::put('/player/updatePlayer/{player}', [AdminPlayerController::class, 'updatePlayer'])->middleware('auth')->name('player.update');
    Route::delete('/player/destroy/{player}', [AdminPlayerController::class, 'destroyPlayer'])->middleware('auth')->name('player.destroy');

    Auth::routes();
