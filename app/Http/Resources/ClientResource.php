<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'client_url' => $this->client_url,
            'client_logo' => $this->client_logo ? asset('storage/' . $this->client_logo) : null,
        ];
    }
}
