<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TranslateResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'translate';

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
            'name' => $this-> name,
            'abbreviation' => $this->abbreviation,
            'language' => new LanguageResource($this->whenLoaded('language')),
            'books' => new BooksCollection($this->whenLoaded('books')),
            // HATEOAS
            'links' => [
                [
                    'rel' => 'update translate',
                    'type' => 'PUT',
                    'link' => route('translate.update', $this->id),
                ],
                [
                    'rel' => 'delete translate',
                    'type' => 'DELETE',
                    'link' => route('translate.destroy', $this->id),
                ],
            ],
        ];
    }
}
