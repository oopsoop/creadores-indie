<?php namespace CreadoresIndie\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'body'
    ];

    public function getParsedBodyAttribute()
    {
        return $this->body;
    }

    public function getRelativeDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class, 'id_discussion');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
