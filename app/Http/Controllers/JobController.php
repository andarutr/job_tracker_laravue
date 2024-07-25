<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function getDataFirst(Request $req){
        $data = DB::table('applications')->where('id', $req->id)->first();

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

    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'company' => 'required',
            'role' => 'required',
            'platform' => 'required',
            'apply_at' => 'required',
            'status' => 'required',
            'link' => 'required',
            'description' => 'required',
        ],[
            'company.required' => 'Perusahaan harus diisi!',
            'role.required' => 'Role harus diisi!',
            'platform.required' => 'Platform harus diisi!',
            'apply_at.required' => 'Apply at harus diisi!',
            'status.required' => 'Status harus diisi!',
            'link.required' => 'Link harus diisi!',
            'description.required' => 'Deskripsi harus diisi!',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }else{
            DB::table('applications')
                ->insert([
                   'company' => $req->company,
                    'role' => $req->role,
                    'platform' => $req->platform,
                    'apply_at' => $req->apply_at,
                    'status' => $req->status,
                    'link' => $req->link,
                    'description' => $req->description, 
                ]);

            return response()->json([
                'message' => 'Berhasil membuat data!'
            ]);
        }
    }

    public function update(Request $req){
        $validator = Validator::make($req->all(), [
            'company' => 'required',
            'role' => 'required',
            'platform' => 'required',
            'apply_at' => 'required',
            'status' => 'required',
            'link' => 'required',
            'description' => 'required',
        ],[
            'company.required' => 'Perusahaan harus diisi!',
            'role.required' => 'Role harus diisi!',
            'platform.required' => 'Platform harus diisi!',
            'apply_at.required' => 'Apply at harus diisi!',
            'status.required' => 'Status harus diisi!',
            'link.required' => 'Link harus diisi!',
            'description.required' => 'Deskripsi harus diisi!',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }else{
            DB::table('applications')
                ->where('id', $req->id)
                ->update([
                    'company' => $req->company,
                    'role' => $req->role,
                    'platform' => $req->platform,
                    'apply_at' => $req->apply_at,
                    'status' => $req->status,
                    'link' => $req->link,
                    'description' => $req->description, 
                ]);

            return response()->json([
                'message' => 'Berhasil memperbarui data!'
            ]);
        }
    }

    public function remove(Request $req){
        DB::table('applications')->where('id', $req->id)->delete();

        return response()->json(['message' => 'Berhasil menghapus data!']);
    }
}