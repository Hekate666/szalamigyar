<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Szalami extends JsonResource
{
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
            'termek_nev' => $this->termek_nev,
            'termek_ar' => $this->termek_ar,
            'termek_alapanyag' => $this->termek_alapanyag,
            'gyartasi_ido' => $this->gyartasi_ido,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
