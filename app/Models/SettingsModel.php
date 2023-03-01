<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $primaryKey = 'id';

    public $fillable = [
        'name','email','phone1','phone2','footer_text','logo'
    ];

}
