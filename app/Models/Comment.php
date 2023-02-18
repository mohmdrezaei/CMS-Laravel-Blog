<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
     protected $fillable = [
         'content',
         'status',
         'comment_id',
         'user_id',
         'post_id'
     ];
     protected $with =['approvedReplies'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class);
    }

    public function approvedReplies()
    {
        return $this->replies()->where('status',true);
    }
    public function getCreatedAtJalali()
    {
        return jdate($this->created_at)->format('Y/m/d');
    }

    public function getStatusInFarsi()
    {
        return !! $this->status ? "تایید شده" : "تایید نشده";
    }
}
