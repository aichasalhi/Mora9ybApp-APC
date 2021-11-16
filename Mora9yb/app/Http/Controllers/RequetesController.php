<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centreresult;
use App\Models\Office;
use CreateCentreresultsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequetesController extends Controller
{
    public function create()
    {
        $centres = Centre::all();
        return view('supervisor.createdirectcommune',compact('centres'));
    }
   
}
