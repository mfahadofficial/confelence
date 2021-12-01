<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'itemCode', 'description','user_id', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function spaceUsers(){
        return $this->belongsToMany(User::class, 'space_permissions', 'user_id')->withPivot('role_id');
        }
        
        public function spaceRoles(){
            return $this->belongsToMany(Role::class, 'space_permissions', 'role_id')->withPivot('user_id');
            }
}
