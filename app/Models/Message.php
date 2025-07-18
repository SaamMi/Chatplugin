<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    



       /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'message',
        'cookievalue',
        'auth',
        'replied',
       ];




      
        public function post(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
    







}
