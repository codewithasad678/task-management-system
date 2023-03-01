<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsModel extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id';
  

    protected $fillable = [
        'name','start_date','end_date','admin_id','category_id','team_id','status','note'
    ];

    public function get_category(){
        return $this->hasMany('App\Models\CategoryModel','id','category_id');
    }
    public function get_admin(){
        return $this->hasMany('App\Models\AdminModel','id','admin_id');
    }
    public function get_team(){
        return $this->hasMany('App\Models\TeamModel','id','team_id');
    }

    
}
