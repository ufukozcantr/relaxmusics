<?php

namespace App\Http\Controllers\Api\Songs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Songs\StoreRequest;
use App\Http\Resources\SongResource;
use App\Models\Song;
use App\Traits\ImageSupport;
use App\Traits\ResponseSupport;
use App\Traits\SoundSupport;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreRequest $request
     * @return JsonResponse|Response
     * @throws Exception
     */
    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validated();

        $image_path = 'songs/images/'; // this is s3 file path
        $sound_path = 'songs/sounds/'; // this is s3 file path
        $validated['image'] = ImageSupport::save($validated['image'], $image_path); // image is saving in trait
        $validated['sound'] = SoundSupport::save($validated['sound'], $sound_path); // sound is saving in trait

        // if image is not save
        if (!$validated['image'])
            return ResponseSupport::error(__('Image didnt save'), 400);

        // if sound is not save
        if (!$validated['sound'])
            return ResponseSupport::error(__('Sound didnt save'), 400);

        $song = Song::create($validated);

        return ResponseSupport::success(__('Record saved'), 200, new SongResource($song));
    }
}
