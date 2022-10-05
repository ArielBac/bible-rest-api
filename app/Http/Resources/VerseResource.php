<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VerseResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'verse';

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
            'chapter' => $this->chapter,
            'verse' => $this->verse,
            'text' => $this->text,
            'book' => new BookResource($this->whenLoaded('book')),
            // HATEOAS
            'links' => [
                [
                    'rel' => 'update verse',
                    'type' => 'PUT',
                    'link' => route('verse.update', $this->id),
                ],
                [
                    'rel' => 'delete verse',
                    'type' => 'DELETE',
                    'link' => route('verse.destroy', $this->id),
                ],
            ],
        ];
    }
}
