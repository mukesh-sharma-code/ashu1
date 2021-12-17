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
                $data = staging_table::all();
                
               //  $finalData = []; 
               //  foreach($data as $obj){
               //      $obj->isprocessed = $obj->isprocessed == 1 ? 'Yes' : " No";
               //      $obj->isfiledownloaded = $obj->isfiledownloaded == 1 ? 'Yes' : " No";
               //      array_push($finalData,$obj);
               //  }
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '';
                        return $actionBtn;
                    })
                    ->addColumn('viewDetail', function($row){
                        $viewBtn = '';
                        return $viewBtn;
                    })
                    ->rawColumns(['action','viewDetail'])
                    ->make(true);
            }
        }catch(Exception $e){
            Log::error($e->getMessage());
        }
    }
}
