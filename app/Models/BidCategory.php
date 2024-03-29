<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'seo_url', 'parent_id'];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }


}
