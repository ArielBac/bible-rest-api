<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
        /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'book';

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
            'position' => $this->position,
            'name' => $this->name,
            'abbreviation' => $this->abbreviation,
            'testament' => new TestamentResource($this->whenLoaded('testament')),
            'verses' => new VersesCollection($this->whenLoaded('verses')),
            'translate' => new TranslateResource($this->whenLoaded('translate')),
            // HATEOAS
            'links' => [
                [
                    'rel' => 'update book',
                    'type' => 'PUT',
                    'link' => route('book.update', $this->id),
                ],
                [
                    'rel' => 'delete book',
                    'type' => 'DELETE',
                    'link' => route('book.destroy', $this->id),
                ],
            ],
        ];
    }
}
