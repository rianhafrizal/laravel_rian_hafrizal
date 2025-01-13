<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class table_pasien extends Model
{
    use HasFactory;

    
    public static function getpasienAll()
    {
        return DB::select("SELECT id_pasien, a.nama, a.alamat, a.telp,a.id_outlet,b.nama as nama_rs from table_pasien a
                    left join table_outlet b on a.id_outlet =b.id");
    }

    public static function getpasienByid($id)
    {
        return DB::select("SELECT id_pasien, a.nama, a.alamat, a.telp,a.id_outlet,b.nama as nama_rs from table_pasien a
                    left join table_outlet b on a.id_outlet =b.id
                    where  id_pasien=?",[$id]);
    }

    public static function Store($nama,$alamat,$id_outlet,$telp)
    {
        return DB::INSERT("insert into table_pasien(nama,alamat,id_outlet,telp) values(UPPER(?),?,?,?)",[$nama,$alamat,$id_outlet,$telp]);
    }

    public static function Updatepasien($id,$nama,$alamat,$id_outlet,$telp)
    {
        return DB::UPDATE("UPDATE table_pasien set nama=UPPER(?), alamat=?, id_outlet=?, telp=? where id_pasien=?",[$nama,$alamat,$id_outlet,$telp,$id]);
    }


    public static function DeleteOutet($id)
    {
        return DB::delete("Delete from table_pasien where id_pasien=?",[$id]);
    }

}
