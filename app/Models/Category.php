<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Category extends Model
{
    use HasFactory;
    public function getRemaining()
{
    if ($this ->expiry){
        $remaining= Carbon ::now()->diffInDays($this ->expiry);
    } else{
        $remaining= 0;
    }
    return $remaining;


}

}
