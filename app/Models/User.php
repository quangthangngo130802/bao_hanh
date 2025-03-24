<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserInfo;
use App\Models\Storage;
use App\Models\Campaign;
use App\Models\CampaignDetail;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'company_name',
        'password',
        'dob',
        'status',
        'role_id',
        'city_id',
        'tax_code',
        'store_name',
        'field',
        'domain',
        'address',
        'storage_id',
        'wallet',
        'source',
        'expired_at',
        'username',
        'sub_wallet',
        'prefix',
        'parent_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = ['user_info'];

    // Accessor for user info
    public function getUserInfoAttribute()
    {
        return UserInfo::where('user_id', $this->attributes['id'])->first();
    }

    // Relationship with City
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Relationship with Field
    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    // Relationship with Config
    public function config()
    {
        return $this->hasOne(Config::class);
    }

    // Relationship with Storage
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    // Relationship with CampaignDetail
    public function campaignDetails()
    {
        return $this->hasMany(CampaignDetail::class, 'user_id');
    }

    // Access Campaigns through CampaignDetail
    public function campaigns()
    {
        return $this->hasManyThrough(
            Campaign::class,          // Target model
            CampaignDetail::class,    // Intermediate model
            'user_id',                // Foreign key on CampaignDetail table
            'id',                     // Foreign key on Campaign table (assumes campaign_id)
            'id',                     // Local key on User table
            'campaign_id'             // Local key on CampaignDetail table
        );
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function transfer()
    {
        return $this->hasMany(Transfer::class, 'user_id');
    }

    public function message()
    {
        return $this->hasMany(ZnsMessage::class, 'user_id');
    }

    public function zaloOa()
    {
        return $this->hasMany(ZaloOa::class, 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }
}
