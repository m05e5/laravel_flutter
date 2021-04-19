<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\DocBlock\Tag;
use Tymon\JWTAuth\Contracts\JWTSubject;



class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $fillable = [
        'name',
        'pseudo',
        'email',
        'matricule',
        'password',
        'filiere',
    ];

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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function tag()
    {
        return $this->hasMany(Tag::class, 'user_with_tags');
    }

    const STATUS_MESSAGE = [
        '200' => 'Request_Successfull',
        '201' => 'Created_Successfully',
        '201B' => 'Updated_Successfully',
        '204' => 'No_Content!!!',
        '400' => 'Invalide_data',
        '401' => 'Unautorised_Request',
        '404' => 'Not_found',
        '500' => 'Something_Went_Wrong !!!',
    ];
}
