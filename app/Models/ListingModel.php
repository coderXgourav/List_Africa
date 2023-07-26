<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingModel extends Model
{
    use HasFactory;
    protected $table = "listing";
    protected $primaryKey = "listing_id";

   

}
