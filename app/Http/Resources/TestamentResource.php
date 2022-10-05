<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestamentResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'testament';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'books' => new BooksCollection($this->whenLoaded('books')),
            // HATEOAS
            'links' => [
                [
                    'rel' => 'update testament',
                    'type' => 'PUT',
                    'link' => route('testament.update', $this->id),
                ],
                [
                    'rel' => 'delete testament',
                    'type' => 'DELETE',
                    'link' => route('testament.destroy', $this->id),
                ],
            ],
        ];
    }
}
