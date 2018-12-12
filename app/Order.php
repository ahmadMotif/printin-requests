<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_title', 'slug', 'description', 'user_id',
    ];
    // Relation With User
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
