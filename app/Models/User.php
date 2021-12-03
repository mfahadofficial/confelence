<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function spaces()
    {
        // dd('test');
        return $this->hasMany(Space::class);
    }


    public function pages()
    {
        // dd('test');
        return $this->hasMany(Page::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class, 'role_user');
    }

    // public function spaceRoles(){
    //     return $this->belongsToMany(Role::class, 'space_permissions', 'role_id')->withPivot('space_id');
    //     }
        
    //     // public function spaces(){
    //     // return $this->belongsToMany(Space::class,'space_permissions')->withPivot('role_id');
    //     // }


    //     public function pages(){
    //         return $this->belongsToMany(Page::class,'page_permissions')->withPivot('role_id');
    //         }
            
    //         public function pageRoles(){
    //             return $this->belongsToMany(Role::class, 'page_permissions', 'role_id')->withPivot('page_id');
    //             }
}