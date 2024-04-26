<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $primaryKey = 'id';
    public $incrementing=true;
    protected $keyType='int';
    public $timestmps = true;
    protected $dateFormate='U';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',

    ];




}
