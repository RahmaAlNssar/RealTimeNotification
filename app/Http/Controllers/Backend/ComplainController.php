<?php

namespace App\Http\Controllers\Backend;

use App\Models\Complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\ComplainDataTable;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ComplainDataTable $dataTable)
    {
        try{

            return $dataTable->render('backend.includes.table');

        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStatus($id,ComplainDataTable $dataTable){
        try{

            $complain = Complain::where('id',$id)->first();
           $complain->update(['seen'=>'1']);
           $count_complains  = DB::scalar(
            "select count(case when seen = '0' then 1 end) as count from complains"
             );
           return $dataTable->render('backend.includes.table',['count_complains'=>$count_complains]);
          }catch(\Exception $e){
              return response()->json($e->getMessage(), 500);
          }
    }

    public function MultiDelete(Request $request){

        try{
           $rows = Complain::whereIn('id',(array)$request['id'])->get();
           DB::beginTransaction();
           foreach ($rows as $row)
               $row->delete();
           DB::commit();
           return response()->json(['title'=>__('messages.success'),'message'=>__('messages.delete'),'status'=>'success']);

            }catch(\Exception $e){
              return response()->json($e->getMessage(), 500);
          }

    }
}
