<?php
use App\Models\Task;
use illuminate\HTTP\Response;
use illuminate\HTTP\Request;
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
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{id}/edit', function ($id)  {
    return view('edit',[
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id)  {
    return view('show',[
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');



// Route::get('/sss', function () {
//     return 'hello';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . "!";
// });

Route::fallback(function () {
    return 'still got somewhere!';
});
