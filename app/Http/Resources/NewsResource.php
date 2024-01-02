<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id, 
            'title' => $this->news_title,
            'image_url' => $this->news_image_url,
            'content' => $this->news_content,
            'author' => $this->author,
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d')
        ];
    }
}
