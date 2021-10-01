<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function profileImage(){
        return ($this->image) ? '/storage/'.$this->image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/archive/a/ac/20121003093557%21No_image_available.svg/120px-No_image_available.svg.png';
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public  function user(){
        return $this->belongsTo(User::class);
    }
}
