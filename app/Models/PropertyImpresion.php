<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property\Content;


class PropertyImpresion extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'property_impression';
    public function propertyContent()
    {
        return $this->hasOne(Content::class);
    }
    public function propertyContents()
    {
        return $this->hasMany(Content::class, 'property_id','property_id');
    }
    public function userContents()
    {
        return $this->hasMany(User::class, 'id','user_id');
    }
    public function getContent($lanId)
    {
        return $this->propertyContents()->where('language_id', $lanId)->first();
    }

}
