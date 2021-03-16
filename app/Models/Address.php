<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'area',
        'city',
        'zip',
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User','id','address_id');
    }
}
