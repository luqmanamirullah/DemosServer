<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_title',
        'news_content',
        'news_type',
        'news_image_url',
        'author',
        'created_at',
        'updated_at',
    ];

    public function role(): HasOne
    {
        return $this->hasOne(Role::class);
    }

    public function scopeTrending($query)
    {
        return $query->where('created_at', '>=', now()->subYear())
                    ->orderByDesc('news_view')
                    ->limit(3);
    }

    public function scopeBreakingNews($query, $type = null)
    {
        if ($type) {
            return $query->where('created_at', '>=', now()->subMonth())->where('news_type', $type)
                        ->orderByDesc('news_view')
                        ->limit(10); 
        }
        return $query->where('created_at', '>=', now()->subMonth())
                    ->orderByDesc('news_view')
                    ->limit(10);
    }

    protected $table = 'news';
}
