<?php

namespace App\Http\Controllers\Api\Songs;

use App\Http\Controllers\Controller;
use App\Models\Song;
use App\Traits\ResponseSupport;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Song $song
     * @return JsonResponse|Response
     * @throws Exception
     */
    public function __invoke(Song $song)
    {
        $song->delete();

        return ResponseSupport::success(__('Record deleted'), 200);
    }
}
