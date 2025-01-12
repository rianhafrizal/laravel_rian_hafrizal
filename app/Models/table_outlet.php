<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class table_outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'tlp',
        'email',
    ];


    public static function getoutletAll()
    {
        return DB::select("SELECT * from table_outlet");
    }

    public static function getoutletByid($id)
    {
        return DB::select("SELECT * from table_outlet where id=?",[$id]);
    }


}
