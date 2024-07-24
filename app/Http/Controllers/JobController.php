<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function getData()
    {
        $data = [
            'send_cv' =>DB::table('applications')->where(['status' => 'Send CV'])->count(),
            'viewed' =>DB::table('applications')->where(['status' => 'Viewed'])->count(),
            'interview_hrd' =>DB::table('applications')->where(['status' => 'Interview HRD'])->count(),
            'interview_user' =>DB::table('applications')->where(['status' => 'Interview User'])->count(),
            'failed' =>DB::table('applications')->where(['status' => 'Failed'])->count(),
            'success' =>DB::table('applications')->where(['status' => 'Success'])->count(),
            'total' =>DB::table('applications')->count()
        ];

        return response()->json($data);
    }

    public function getDataCountApplied(){
        $data = [
            'linkedin' => DB::table('applications')->where('platform', 'Linkedin')->count(),
            'glints' => DB::table('applications')->where('platform', 'Glints')->count(),
            'jobstreet' => DB::table('applications')->where('platform', 'Job Street')->count(),
            'indeed' => DB::table('applications')->where('platform', 'Indeed')->count(),
            'pintarnya' => DB::table('applications')->where('platform', 'Pintarnya')->count(),
            'ekrut' => DB::table('applications')->where('platform', 'E-Krut')->count(),
        ];

        return response()->json($data);
    }

    public function getDataApplied(){
        $data['apply'] = DB::table('applications')->get();
        
        return response()->json($data);
    }
}