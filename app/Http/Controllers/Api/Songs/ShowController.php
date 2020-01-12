<?php

namespace App\Http\Controllers\Api\Songs;

use App\Http\Controllers\Controller;
use App\Http\Resources\SongResource;
use App\Models\Song;
use App\Traits\ResponseSupport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class ShowController
 * @package App\Http\Controllers\Api\Songs
 */
class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Song $song
     * @return JsonResponse|Response
     */
    public function __invoke(Song $song)
    {
        return ResponseSupport::success(__('Record show'), 200, new SongResource($song));
    }
}
