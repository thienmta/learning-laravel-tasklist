<?php

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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('taskList', function(){
	$listTask = DB::table('task')->get();
	return view('task')->with('task', $listTask);
});

Route::post('createTask', function(Request $request){
	if($request->isMethod('POST')){
		$taskName = $request->input('taskName');
		$taskTime = $request->input('taskTime');
		DB::table('task')->insert(
			['taskName'=> $taskName,
				'taskTime' => $taskTime
			]
		);
	}
	return redirect('taskList');
});

Route::get('deleteTask/{id}', function($id){
	DB::table('task')->where('taskId', $id)
						->delete();
	return redirect('taskList');
});

Route::get('editTask/{id}', function($id){
	$editTask = DB::table('task')->where('taskId', $id)->get();
	$taskName = $editTask[0]->taskName;
	$taskTime = $editTask[0]->taskTime;
	$listTask = DB::table('task')->get();
	return view('editTask')->with('taskName', $taskName)->with('taskTime', $taskTime)->with('task', $listTask);
});

Route::post('editTask/{id}', function(Request $request, $id){
	if($request->isMethod('POST')){
		$taskName = $request->input('taskNameE');
		$taskTime = $request->input('taskTimeE');
		DB::table('task')
			->where('taskId', $id)
			->update(
				['taskName' => $taskName, 'taskTime' => $taskTime]
			);
		return redirect('taskList');
	}
});

