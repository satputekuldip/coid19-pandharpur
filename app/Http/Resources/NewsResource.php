<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'featured_image' => \Config::get('app.url').'/storage/news_images/'. $this->featured_image,
            'video' => $this->video,
            'link' => $this->link,
            'created_at' => Carbon::parse($this->created_at)->format('Y-d-m h:m:s a'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-d-m h:m:s a')
        ];

    }
}
