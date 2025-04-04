<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $guarded = [];

    public function Service_contents()
    {
        return $this->hasMany(Service_content::class,'service_id',  'id');
    }
    public function Service_content()
    {
        return $this->hasOne(Service_content::class, 'service_id', 'id');
    }
    public function getContent($langId)
    {
        return $this->Service_contents()->where('language_id', $langId)->first();
    }
}
