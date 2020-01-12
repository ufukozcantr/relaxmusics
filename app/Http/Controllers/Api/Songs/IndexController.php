<?php

namespace App\Http\Controllers\Api\Songs;

use App\Http\Controllers\Controller;
use App\Http\Resources\SongResource;
use App\Models\Song;
use App\Traits\ResponseSupport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers\Api\Songs
 */
class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        return ResponseSupport::success(__('Return data'), 200, SongResource::collection(Song::all()));
    }
}
