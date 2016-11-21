<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  /**
   * The database for the model
   *
   */
    protected $table='blogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];
}
