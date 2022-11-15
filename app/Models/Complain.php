<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = ['body','user_id','seen'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public const USER_STATUS_ACTIVE = 1;

    public function status(){
     //  if (canUser("users-update-status") == true ){
        return  $this->seen == self::USER_STATUS_ACTIVE
        ? '<span class="badge bg-success">مرئي</span>'
        : ' <span class="badge bg-danger">غير مرئي</span>';

       }
}
