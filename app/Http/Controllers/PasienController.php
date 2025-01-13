<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\table_outlet;
use App\Models\table_pasien;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Livewire\Attributes\Validate;
use Dotenv\Validator;
use App\Http\Controllers\Throwable;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pasien.index');
    }

    public function store(Request $request)
    {
        $p_nama = $request->input('nama');
        $p_alamat = $request->input('alamat');
        $id_outlet = $request->input('id_outlet');
        $p_telp = $request->input('telp');

        try {
                table_pasien::Store($p_nama,$p_alamat,$id_outlet,$p_telp);
            } catch (Throwable $e) {
                report($e);
                return false;
            }
     
    return 'Tambah '.$p_nama.' Berhasil !!' ;
    }

    public function GetPasienByid(Request $request){
        $p_id = $request->input('id_pasien');
        return $data = table_pasien::getpasienByid($p_id);
       

    }
    
    public function update(Request $request){
      
        $p_nama = $request->input('nama');
        $p_alamat = $request->input('alamat');
        $p_telp = $request->input('telp');
        $p_id = $request->input('id_pasien');
        $id_outlet = $request->input('id_outlet');
        
  
          try {
                  table_pasien::Updatepasien($p_id,$p_nama,$p_alamat,$id_outlet,$p_telp);
              } catch (Throwable $e) {
                return  report($e);
                   
              }
       
      return 'Update Berhasil !!' ;
  
      }

    public function delete(Request $request){
      
        $p_id = $request->input('id_pasien');
  
          try {
                table_pasien::DeleteOutet($p_id);
              } catch (Throwable $e) {
                  report($e);
                  return false;
              }
       
      return 'Hapus Berhasil !!' ;
  
       
      }

    public function Getlist4form(){
        $data = table_pasien::getpasienAll();
        return DataTables::of($data)->toJson();
        

    }
}
