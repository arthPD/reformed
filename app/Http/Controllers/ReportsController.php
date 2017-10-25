<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recordpledge;
use App\Breakdown;
use JavaScript;

class ReportsController extends Controller
{
    public function index(){

    	$records = Recordpledge::all();
        JavaScript::put([
            'records' => $records
        ]);

        return view('blades.reports');
    }

    public function view($id){

    	$record = Recordpledge::find($id);
    	$breakdowns = Breakdown::where('recordpledge_id', '=', $id)->get();
    	dd($record);

    	/*
    		Graph?
    		
    	*/
    }
}
