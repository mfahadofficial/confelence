<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ["name"];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'role_user');
    }


    public function spaceUsers(){
        return $this->belongsToMany(User::class, 'space_permissions', 'user_id')->withPivot('space_id');
        }
        
        public function spaces(){
        return $this->belongsToMany(Space::class,'space_permissions')->withPivot('user_id');
        }

        public function pageUsers(){
            return $this->belongsToMany(User::class, 'page_permissions', 'user_id')->withPivot('page_id');
            }

            public function pages(){
                return $this->belongsToMany(Page::class,'page_permissions')->withPivot('user_id');
                }
}