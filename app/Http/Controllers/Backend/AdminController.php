<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\DataTables\AdminDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use App\Http\Services\AdminService;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDataTable $dataTable)
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
        try{
           // $roles = Role::pluck('name', 'name')->all();
          //  return view('backend.admins.form',compact('roles'));
          return view('backend.admins.form');

        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request,AdminService $AdminService)
    {
        $admin = $AdminService->handle($request->all());
        if (is_string($admin)) return $this->throwException($admin);
        return response()->json(['title'=>__('messages.success'),'message'=>__('messages.store'),'status'=>'success']);
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
        try{
           //$row = Admin::query()->with('roles')->where('id',$id)->first();
           $row = Admin::query()->where('id',$id)->first();
            // $roles = Role::pluck('name', 'name')->all();
            // $userRole = $row->roles->pluck('name', 'name')->all();

            //return view('backend.admins.form',compact('roles','row','userRole'));
            return view('backend.admins.form',compact('row'));

        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id,AdminService $AdminService)
    {
        $admin = $AdminService->handle($request->all(), $id);
        if (is_string($admin)) return $this->throwException($admin);
        return response()->json(['title'=>__('messages.success'),'message'=>__('messages.update'),'status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $admin = Admin::where('id',$id)->first();
           $admin->delete();
            return response()->json(['title'=>__('messages.success'),'message'=>__('messages.delete'),'status'=>'success']);
          }catch(\Exception $e){
              return response()->json($e->getMessage(), 500);
          }
    }

    public function updateStatus($id){
        try{
            $user = Admin::where('id',$id)->first();
            $user->update(['status'=>!$user->status]);
            return response()->json(['title'=>__('messages.success'),'message'=>__('messages.update'),'status'=>'success']);
          }catch(\Exception $e){
              return response()->json($e->getMessage(), 500);
          }
    }

    public function MultiDelete(Request $request){

        try{
           $rows = Admin::whereIn('id',(array)$request['id'])->get();
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
