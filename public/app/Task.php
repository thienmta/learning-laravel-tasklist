<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class App extends Model
{
    protected $table = 'task';
    protected $primaryKey = 'taskId'; // chu y
    public $timestamps=false;
    public $updated_at=false;
}