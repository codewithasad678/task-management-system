<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignationModel extends Model
{
    use HasFactory;
    protected $table = "designation";
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','category_id','note'
    ];


    public function get_category(){
        return $this->hasMany('App\Models\CategoryModel','id','category_id');
    }
}
