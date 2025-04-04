<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planpackages extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}
