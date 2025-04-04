<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property\Content;


class ContactUs extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'contact_us';
}
