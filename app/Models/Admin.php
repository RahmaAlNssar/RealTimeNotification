<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard = "admin";
    protected $fillable = ['username','password','is_super-admin','status','email'];


    public const USER_STATUS_ACTIVE = 1;

    public function status(){
     //  if (canUser("users-update-status") == true ){
        return  $this->status == self::USER_STATUS_ACTIVE
        ? '<a href="'.route('admin.admins.update_status',$this->id).'"class="btn btn-outline-success btn-sm toggle-class"> <span class="badge bg-success"><i class="fa fa-power-off"></i></span></a>'
        : '<a href="'.route('admin.admins.update_status',$this->id).'"class="btn btn-outline-success toggle-class">  <span class="badge bg-danger"><i class="fa fa-power-off"></i></span></a>';

       }
    //  else{
    //     return "";
    //  }
    //}
}
