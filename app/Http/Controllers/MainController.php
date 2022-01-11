<?php

namespace App\Http\Controllers;

use DataTables;
use Exception;
use Log;
use Illuminate\Http\Request;
use App\Models\staging_table;
use DB;
use PDO;
use DateTime;
use DateInterval;
use DatePeriod;

class MainController extends Controller
{
   public function index(){
        $dataArr = Staging_Table::select(DB::raw("Source,SUM(Price) as TotalPrice"))->groupBy('Source')->get();
        
        $dataArr = DB::select("SELECT Source,SUM(Price) as TotalPrice FROM `staging_table` where str_to_date(`Date`, '%m/%d/%YYYY') >= '".date('m/d/Y')."' AND str_to_date(`Date`, '%m/%d/%YYYY') <= '".date('m/d/Y')."' Group By Source");
        if(!count($dataArr)){
            $tmpDataArr = Staging_Table::select(DB::raw("Source"))->groupBy('Source')->get();
            foreach($tmpDataArr as $arr){
                array_push($dataArr,["Source" => $arr['Source'],"TotalPrice" => 0]); 
            }
        }
        return view('index',compact('dataArr'));
   }
   public function getTableData(Request $request){
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
                $query = Staging_Table::select('*');
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
    public function showSourceData(Request $req){
        $source = $req->sourceName;
        $startDate = $req->startDate;
        $endDate = $req->endDate;
        return view('showSourceData',compact('source','startDate','endDate'));
    }
    public function getSourceDataForGrid(Request $request,$source){
        try{
            if ($request->ajax()) {
                // $fromDate = null;
                // $toDate = null;
                // if($request->fromDate != null){
                //     $str = strtotime($request->fromDate);
                //     $fromDate = date('m/d/Y',$str);
                // }
                // if($request->toDate != null){
                //     $str = strtotime($request->toDate);
                //     $toDate = date('m/d/Y',$str);
                // }

                // old code
                // $query = Staging_Table::where('Source','like', $source);
                // if($fromDate != null && $toDate != null){
                //     $query->whereBetween('date',array($fromDate,$toDate));
                // }else{
                //     if($fromDate != null){
                //         $query->where('date','=',$fromDate);    
                //     }
                //     if($toDate != null){
                //         $query->where('date','=',$toDate);    
                //     }
                // }
                // if($source == "Amazon"){
                //     $query->where('Subject','like',"%Sold, ship now%"); 
                // }elseif($source == "Home Depot"){
                //     $query->where('Subject','like',"%We received your order!%"); 
                // }elseif($source == "Walmart"){
                //     $query->where('Subject','like',"%OOM, thanks for your order%"); 
                // }elseif($source == "Payoneer"){
                //     $query->where('Subject','like',"%You Have Received a Payment!%"); 
                // }
                // $data = $query->get();
                // return DataTables::of($data)
                //     ->addIndexColumn()
                    
                //     ->make(true);

                // new code
                $data = DB::select("SELECT Sum(Price) SumPrice, Subject FROM `staging_table` where str_to_date(`Date`, '%m/%d/%YYYY') >= '".$request->fromDate."' AND str_to_date(`Date`, '%m/%d/%YYYY') < '".$request->toDate."' AND Source LIKE '".$source."' GROUP BY Subject");
                if(!count($data)){
                    $data = DB::select("SELECT Subject FROM `staging_table` where Source LIKE '".$source."' GROUP BY Subject");
                }
                return $data;

            }
        }catch(Exception $e){
            Log::error($e->getMessage());
        }
    }
    public function getIndexFileData(REQUEST $req){
        $begin = new DateTime($req->fromDate);
        $end = new DateTime($req->toDate);
    
        $interval = new DateInterval('P1D'); // 1 Day
        $dateRange = new DatePeriod($begin, $interval, $end);
    
        $range = [];
        foreach ($dateRange as $date) {
            $range[] = $date->format("Y-m-d");
        }
        if(empty($range)){
            array_push($range,$req->fromDate,$req->toDate);
            
        }
        $graphTmpData = DB::select("SELECT Date, Price,Source FROM `staging_table` where str_to_date(`Date`, '%m/%d/%YYYY') >= '".$req->fromDate."' AND str_to_date(`Date`, '%m/%d/%YYYY') < '".$req->toDate."'");
        $graphDataOnDateArr = [];
        $graphDataOnSourceArr = [];
        $graphSourcePriceArr = [];
        $graphDateArr = [];
        foreach($graphTmpData as $stdClass){
            if(!in_array($stdClass->Date,$graphDateArr)){
                array_push($graphDateArr,$stdClass->Date);
            }  
            $source = str_replace(' ', '_', $stdClass->Source);
            if(!array_key_exists($source,$graphSourcePriceArr)){
                $graphSourcePriceArr[$source] = [];
            }  
            if($stdClass->Price != ""){
                array_push($graphSourcePriceArr[$source],$stdClass->Price);
            }
        }    
        $graphDateArr = $range;
        $companyNameArr = [];
        $companyNameArrTmp = Staging_Table::select(DB::raw("Source"))->groupBy('Source')->orderBy('Source','asc')->get()->toArray();
        foreach($companyNameArrTmp as $value){
            array_push($companyNameArr,$value['Source']);
        }
        $companyDataArrTmp = DB::select("SELECT Source,ROUND(SUM(Price),2) as TotalPrice FROM `staging_table` where str_to_date(`Date`, '%m/%d/%YYYY') >= '".$req->fromDate."' AND str_to_date(`Date`, '%m/%d/%YYYY') <= '".$req->toDate."' Group By Source Order By Source asc");
        $companyDataArrTmp = array_map(function ($value) {
            return (array)$value;
        }, $companyDataArrTmp); 
        $companyDataArr = [];
        foreach($companyDataArrTmp as $valueArr){
            $companyDataArr[$valueArr['Source']] = $valueArr;
        }
        $dataArr2 = DB::select("SELECT Source,Price,Date FROM `staging_table` where str_to_date(`Date`, '%m/%d/%YYYY') >= '".$req->fromDate."' AND str_to_date(`Date`, '%m/%d/%YYYY') <= '".$req->toDate."'");
        $dataArr1 = [];
        foreach($companyNameArr as $companyName){
            if(!array_key_exists($companyName,$companyDataArr)){
                $companyDataArr[$companyName] = ["Source" => $companyName,"TotalPrice" => 0];
            }
        }
        ksort($companyDataArr);
        $response['dataArr1'] = $companyDataArr;
        $response['graphDateArr'] = $graphDateArr;
        $response['graphSourcePriceArr'] = $graphSourcePriceArr;
        return json_encode($response);
    }

}
