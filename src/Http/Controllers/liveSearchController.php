<?php

namespace GMTCC\Search\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use DB;

class liveSearchController extends Controller
{
    function action(Request $request){
        
        $canSearch = false;
        if($request->ajax()){
            $query = $request->get('query');
            $tableName = $request->get('tableName');
            $col1 = $request->get('col1');
            $col2 = $request->get('col2');
            
            if ($tableName != null & Schema::hasTable($tableName) )
                if($col1 != null & Schema::hasColumn($tableName,$col1))
                    if($col2 != null & Schema::hasColumn($tableName,$col2))
                        $canSearch = true;
             
        
                        
            if($canSearch)
            {
                if($query != ''){
                    $data = DB::table($tableName)->where($col1,'like','%'.$query.'%')->orWhere($col2,'like','%'.$query.'%')->get();
                    } else {
                    $data = DB::table($tableName)->take(10)->get();
                    }
             
            }

            $fdata = $data->toArray();
            echo json_encode($fdata);
        }
    }
}
