<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductivityModel extends Model
{
    use HasFactory;
    protected $table = 'productivity';
    protected $priamryKey = 'id';

    protected $fillable = [
        'project_id','task_id','subject','status','date','start_time','end_time','note'
    ];


    public function get_task(){
        return $this->hasMany('App\Models\TaskModel','id','task_id');
    }
    public function get_project(){
        return $this->hasMany('App\Models\ProjectsModel','id','project_id');
    }
}
