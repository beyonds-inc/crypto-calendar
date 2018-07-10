<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'url', 'date', 'first_time', 'end_time', 'prefectures', 'body'];

    protected $dates = [
      'date',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }

    public function scopeDateGreaterThan($query, $n){
        return $query->where('date','>=', $n);
    }

    public function scopeDateLessThan($query, $n){
        return $query->where('date','<=', $n);
    }

    public function scopePrefecturesEqual($query, $str)
    {
        return $query->where('prefectures', $str);
    }




}
