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

    public static function Store($nama,$alamat,$email,$telp)
    {
        return DB::INSERT("insert into table_outlet(nama,alamat,email,telp) values(UPPER(?),?,?,?)",[$nama,$alamat,$email,$telp]);
    }

    public static function UpdateOutlet($id,$nama,$alamat,$email,$telp)
    {
        return DB::UPDATE("UPDATE table_outlet set nama=UPPER(?), alamat=?, email=?, telp=? where id=?",[$nama,$alamat,$email,$telp,$id]);
    }


    public static function DeleteOutet($id)
    {
        return DB::delete("Delete from table_outlet where id=?",[$id]);
    }


}
