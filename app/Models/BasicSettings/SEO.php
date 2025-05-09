<?php

namespace App\Models\BasicSettings;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
  use HasFactory;

  protected $table = 'seos';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'language_id',
    'meta_keyword_home',
    'meta_description_home',
    'meta_keyword_properties',
    'meta_description_properties',
    'meta_keyword_projects',
    'meta_description_projects',
    'meta_keyword_agent_login',
    'meta_description_agent_login',
    'meta_keywords_agent_forget_password',
    'meta_descriptions_agent_forget_password',
    'meta_keyword_blog',
    'meta_description_blog',
    'meta_keyword_faq',
    'meta_description_faq',
    'meta_keyword_contact',
    'meta_description_contact',
    'meta_keyword_login',
    'meta_description_login',
    'meta_keyword_signup',
    'meta_description_signup',
    'meta_keyword_forget_password',
    'meta_description_forget_password',
    'meta_keywords_vendor_login',
    'meta_description_vendor_login',
    'meta_keywords_vendor_signup',
    'meta_description_vendor_signup',
    'meta_keywords_vendor_forget_password',
    'meta_descriptions_vendor_forget_password',
    'meta_keywords_vendor_page',
    'meta_description_vendor_page',
    'meta_keywords_about_page',
    'meta_description_about_page',
    'meta_keywords_pricing_page',
    'meta_description_pricing_page'
  ];

  public function seoLang()
  {
    return $this->belongsTo(Language::class);
  }
}
