<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap='autor'; 

    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'imeAutora'=>$this->resource->imeAutora,
            'prezimeAutora'=>$this->resource->prezimeAutora,
            'datumRodjenja'=>$this->resource->datumRodjenja,
            'pol'=>$this->resource->pol
        ];

    }
}
