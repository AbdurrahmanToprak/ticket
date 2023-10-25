<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Level;
class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'department',
        'level',
        'name',
        'subject',
        'message',
    ];
    public function departman(){
        return $this->hasOne(Department::class,'id', 'department_id');
    }
    public function seviye(){
        return $this->hasOne(Level::class,'id', 'level_id');
    }
}
