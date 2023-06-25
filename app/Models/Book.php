<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Book extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id' => 'integer',
    ];

    /**
     * Get the user that owns the book.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the book's title.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the book's author.
     *
     * @param  string  $value
     * @return string
     */
    public function getAuthorAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the book's title.
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        return $this->attributes['title'] = ucfirst($value);
    }

    /**
     * Set the book's author.
     *
     * @param  string  $value
     * @return void
     */
    public function setAuthorAttribute($value)
    {
        return $this->attributes['author'] = ucfirst($value);
    }
}
