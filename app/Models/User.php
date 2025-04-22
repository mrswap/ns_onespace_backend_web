<?php

namespace App\Models;

use App\Models\Project\Project;
use App\Models\Property\Property;
use App\Models\Property\PropertyContact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Property\Wishlist;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasFactory, Notifiable;

  use HasApiTokens, Notifiable;

  protected $fillable = [
    'name',
    'username',
    'email',
    'phone',
    'country',
    'state',
    'city',
    'zip_code',
    'address',
    'password',
    'otp',
    'otp_expires_at',
    'image',
  ];
  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function properties()
  {
    return $this->hasMany(Property::class, 'vendor_id', 'id');
  }

  public function projects()
  {
    return $this->hasMany(Project::class, 'vendor_id', 'id');
  }

  public function agents()
  {
    return $this->hasMany(Agent::class, 'vendor_id', 'id');
  }
  public function propertyContacts()
  {
    return $this->hasMany(PropertyContact::class, 'vendor_id', 'id');
  }
  public function wishlists()
  {
    return $this->hasMany(Wishlist::class, 'property_id', 'id');
  }
}
