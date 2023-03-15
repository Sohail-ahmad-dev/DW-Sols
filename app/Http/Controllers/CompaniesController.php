<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companie;
use DataTables;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $companie = [];
            $date_range = "";
            $from = "";
            $end = "";

            $companie = Companie::all();
            
            if (!empty($request->get('status'))) {
                $companie = Companie::where('status',$request->get('status'))->get();
            }
            
            if (!empty($request->get('cro'))) {
                $companie = Companie::where('cro',$request->get('cro'))->get();
            }

            if (!empty($request->get('date_range'))) {

                $date_range = $request->get('date_range');

                // Convert string from - to date to array
                $range_array = explode(" - ", $date_range);

                // Convert Date to sql date format
                $from = date('Y-m-d',strtotime($range_array[0]));
                $end = date('Y-m-d',strtotime($range_array[1]));
                
                
                $companie = Companie::whereBetween('reg_date',[$from,$end])->get();
                
            }
            
            if (!empty($request->get('status')) && !empty($request->get('cro'))) {
                $companie = Companie::
                    where('status',$request->get('status'))
                    ->where('cro',$request->get('cro'))
                    ->get();
            }
            
            if (!empty($request->get('status')) && !empty($request->get('date_range'))) {
                $companie = Companie::
                    where('status',$request->get('status'))
                    ->whereBetween('reg_date',[$from,$end])
                    ->get();
            }
            
            if (!empty($request->get('cro')) && !empty($request->get('date_range'))) {
                $companie = Companie::
                    where('cro',$request->get('cro'))
                    ->whereBetween('reg_date',[$from,$end])
                    ->get();
            }
            
            if (!empty($request->get('cro')) && !empty($request->get('date_range')) && !empty($request->get('status'))) {
                $companie = Companie::
                    where('cro',$request->get('cro'))
                    ->where('status',$request->get('status'))
                    ->whereBetween('reg_date',[$from,$end])
                    ->get();
            }
            // dd($companie->toArray(),"hhh");
            
            
            return Datatables::of($companie)
                ->addIndexColumn()
                ->make(true);
        }
        
        
        return view("companies");
    }
}
