<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'content', 'key', 'category_id','space_id', 'user_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function space()
    {
        return $this->belongsTo(Space::class);
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
