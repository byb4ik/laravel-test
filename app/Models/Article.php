<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * bind to table articles
     * @var string
     */
    protected $table = 'articles';

    /**
     * @var array
     */
    protected $fillable = [
        'short_article',
        'full_article',
        'category_id',
        'user_id',
        'comment_id',
        'rating',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * get Category's
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * get User's
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }

}
