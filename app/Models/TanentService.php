<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanentService extends Model
{
    use HasFactory;
    protected $table = 'tanent_services';
    protected $guarded = [];

    public function TanentService_contents()
    {
        return $this->hasMany(TanentService_content::class,'tanentservice_id',  'id');
    }
    public function TanentService_content()
    {
        return $this->hasOne(TanentService_content::class, 'tanentservice_id', 'id');
    }
    public function getContent($langId)
    {
        return $this->TanentService_contents()->where('language_id', $langId)->first();
    }
}
