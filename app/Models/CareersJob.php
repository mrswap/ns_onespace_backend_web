<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareersJob extends Model
{
    use HasFactory;
    protected $table = 'careers_jobs';
    protected $guarded = [];

    public function careersjob_Contents()
    {
        return $this->hasMany(CareersJob_content::class,'jobs_id',  'id');
    }
    public function CareersJob_content()
    {
        return $this->hasOne(CareersJob_content::class, 'jobs_id', 'id');
    }
    public function getContent($langId)
    {
        return $this->careersjob_Contents()->where('language_id', $langId)->first();
    }
   
}
