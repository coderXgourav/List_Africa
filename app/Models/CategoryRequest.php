<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRequest extends Model
{
    use HasFactory;
   protected $table = "category_request";
   protected $primaryKey = "request_id";
}