<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fname','lname','phone','email','address','status','password','textpassword','group','image'
    ];


    public function get_group(){
        return $this->hasMany('App\Models\GroupModel','id','group_id');
    }
}
