<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            $this->mergeWhen($this->token, [
                'token' => $this->token,
            ]),

        $this->mergeWhen($request->route()->getName() === 'user.detail', [
            'created_at' => $this->created_at,
            'sessions' => TokenResource::collection($this->tokens),
        ]),

        ];
    }
}
