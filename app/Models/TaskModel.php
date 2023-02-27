<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name','project_id','start_date','end_date','status','note'
    ];




    public function get_project(){
        return $this->hasMany('App\Models\ProjectsModel','id','project_id');
    }
}
