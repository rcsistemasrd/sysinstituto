<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Menu;

use DataTables;

use DB;

class ConsultController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index(Request $request)
    {
        if ($request->ajax()) {        
			$datos =DB::table('MUDATA')			
			->orderBy('id','desc')       
			->get();			            
			return Datatables::of($datos)
			->make(true);;
        }		
        return view('consulta.index');	
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }
	
	public function excel() 
	{  							
			$datosexcel=DB::table('MUDATA')			
			->orderBy('id','desc')       
			->get();			     								
			
			return view('consulta.excel',compact("datosexcel"));		
    }

   
    public function destroy($id)
    {
        //
    }
}
