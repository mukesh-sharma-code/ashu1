<?php

namespace App\Http\Controllers;

use DataTables;
use Exception;
use Log;
use Illuminate\Http\Request;
use App\Models\staging_table;

class UserController extends Controller
{
   // public function getAllUsers(Request $request){
   //      $users = User::all();

   //      echo json_encode($users);
   // }
   public function getTableData(Request $request)
    {
        try{
            if ($request->ajax()) {
                $fromDate = null;
                $toDate = null;
                if($request->fromDate != null){
                    $str = strtotime($request->fromDate);
                    $fromDate = date('m/d/Y',$str);
                }
                if($request->toDate != null){
                    $str = strtotime($request->toDate);
                    $toDate = date('m/d/Y',$str);
                }
                $query = staging_table::select('*');
                if($fromDate != null && $toDate != null){
                    $query->whereBetween('date',array($fromDate,$toDate));
                }else{
                    if($fromDate != null){
                        $query->where('date','=',$fromDate);    
                    }
                    if($toDate != null){
                        $query->where('date','=',$toDate);    
                    }
                }
                $data = $query->get();

                
               //  $finalData = []; 
               //  foreach($data as $obj){
               //      $obj->isprocessed = $obj->isprocessed == 1 ? 'Yes' : " No";
               //      $obj->isfiledownloaded = $obj->isfiledownloaded == 1 ? 'Yes' : " No";
               //      array_push($finalData,$obj);
               //  }
                return DataTables::of($data)
                    ->addIndexColumn()
                    
                    ->make(true);
            }
        }catch(Exception $e){
            Log::error($e->getMessage());
        }
    }
}
