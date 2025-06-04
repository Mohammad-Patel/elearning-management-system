<?php

namespace App\Models;

use App\Http\Controllers\ReviewController;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table='review';
    protected $fillable=['user_id', 'username', 'phone', 'usertype', 'rating', 'review', 'date_display'];
}
