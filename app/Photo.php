<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  /**
   * The database for the model
   *
   */
    protected $table='photos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path', 'blog_id',
    ];
}
