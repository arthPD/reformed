<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recordpledge;
use App\Breakdown;
use JavaScript;

class FinanceController extends Controller
{
    public function __construct(){

    	$this->middleware('auth');
    }

    public function index(){
    	/*List of Pledgor*/
    	$users = User::all();
        if(!empty(session("recordSession"))){
            /*$recordPledge = Recordpledge::findOrFail(session("recordSession"));
            $usersTotal = $recordPledge->user;*/
            $breakdownUser = Breakdown::where('recordpledge_id', '=', session("recordSession"))->get();

            /*List of Pledge record*/
            $records = Recordpledge::findOrFail(session("recordSession"));
            JavaScript::put([
                'records' => $records,
                'breakdownusers' => $breakdownUser
            ]);
        }
        JavaScript::put([
            'members' => $users
        ]);
    	return view('blades.finance');
    }

    public function newRecord(){

        /*Create new record*/
        $record = new Recordpledge;
        $record->record_date = date("Y-m-d");
        $record->save();
        session(["recordSession" => $record->id]);//record id as session
        return back();
    }

    public function saveRecord(Request $request){

        if(session("recordSession")){
            /*Save Record*/
            $record = Recordpledge::findOrFail(session('recordSession'));
            $record->note = $request->note;
            //get total
            $breakdowns = Breakdown::where('recordpledge_id', '=', session("recordSession"))->get();
            $total = 0;
            foreach($breakdowns as $breakdown){
                $total += $breakdown->total;
            }
            $record->total = $total;
            $record->save();
            session()->forget('recordSession');
            return back()->with('message', ['success', 'Record saved!']);
        }else{
            return back()->with('message', ['warning', 'Please add new record first!']);
        }
    }

    public function breakdown(Request $request){/*store amount breakdown*/

        if(session('recordSession')){
            $ifUpdate = Breakdown::where(['recordpledge_id', '=', session("recordSession")], ['user_id', '=', $request->user_id])->get();
            if(!$ifUpdate->isEmpty()){
                $ifUpdate->delete();
            }
            $breakdown = new Breakdown;
            /*compute total*/
            $decimals = [
                ['thousands', 1000],['five_hundreds', 500],['two_hundreds', 200],['hundreds', 100],['fifties', 50],['twenties', 20],['tens', 10],['fives', 10],['ones', 1],
            ];

            //validation
            //$this->validate(request(), [

                //'thousands' => 'required_without_all:five_hundreds,two_hundreds,hundreds,fifties,twenties,tens,fives,ones|integer',

            //]);

            $total = 0;
            foreach($decimals as $key => $places){
                $field = $places[0];
                $total += $request->$field * $places[1];

                $breakdown->$field = $request->$field;
            }
            $breakdown->total = $total;
            $breakdown->note = $request->note;
            /*create pivot row*/
            $record = Recordpledge::findOrFail(session('recordSession'));
            $breakdown->recordpledge_id = $record->id;
            $breakdown->user_id = $request->user_id;
            $breakdown->save();
            return back()->with('message', ['success', 'Success!']);
            /*Save data to database*/
        }else{
            return back()->with('message', ['warning', 'Please add new record first!']);
        }
    }
}
