<?php

namespace App\Http\Resources\Api\v1\News;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'status'=>$this->status,
            'view_count'=>$this->view_count,
            'title'=>$this->title,
            'description'=>$this->description,
            'category'=>$this->category->name,
        ];
    }
}
