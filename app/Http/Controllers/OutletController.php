<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\table_outlet;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class OutletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('outlet.data_rs');
    }

    public function InsertOutlet(Request $request)
    {
        return view('data_rs');
    }

    public function GetOutletByid(Request $request){
        $p_id = $request->input('id_outlet');
        return $data = table_outlet::getoutletByid($p_id);
       

    }

    public function Getlist4form(){
        $data = table_outlet::getoutletAll();
        return DataTables::of($data)->toJson();
        

    }


}
