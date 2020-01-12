<?php

namespace App\Http\Resources;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CategoryResource
 * @package App\Http\Resources
 */
class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->image,
            'songs' =>  SongResource::collection($this->songs),
            'settings' => SettingResource::collection(Setting::active()->get()),
            // if status 1, we sent app settings
            // there are app version, lang version, force_update, soft_update
            // there is status because if we want to force change. We can not want force update
        ];
    }
}
