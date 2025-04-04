<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'category_id','status'];
  
    
    protected $guarded = [];

    
    public function getContent($langId)
    {
        return $this->stateContents()->where('language_id', $langId)->first();
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
