<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
    use HasFactory;
    protected $table = 'team';
    protected  $primaryKey = 'id';


    protected $fillable = [
        'name','image','phone','email','designation_id','status'
    ];

    public function get_desigantion(){
        return $this->hasMany('App\Models\DesignationModel','id','designation_id');
    }
}
