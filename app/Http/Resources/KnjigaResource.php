<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KnjigaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap='knjiga'; 

    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'nazivKnjige'=>$this->resource->nazivKnjige,
            'godinaIzdanja'=>$this->resource->godinaIzdanja,
            'brojStrana'=>$this->resource->brojStrana,
            'opis'=>$this->resource->opis,
            'autor_id'=>new AutorResource($this->resource->autor),
            'zanr_id'=>new ZanrResource($this->resource->zanr),
            'user_id'=>new UserResource($this->resource->user)
        ];
    }
}
