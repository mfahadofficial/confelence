<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

        
    public function pageUsers(){
        return $this->belongsToMany(User::class, 'page_permissions', 'user_id')->withPivot('role_id');
        }
        
        public function pageRoles(){
            return $this->belongsToMany(Role::class, 'page_permissions', 'role_id')->withPivot('user_id');
            }
}
