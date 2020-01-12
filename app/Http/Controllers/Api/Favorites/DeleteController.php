<?php

namespace App\Http\Controllers\Api\Favorites;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Traits\ResponseSupport;
use Exception;
use Illuminate\Http\JsonResponse;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Favorite $favorite
     * @return JsonResponse
     * @throws Exception
     */
    public function __invoke(Favorite $favorite)
    {
        if ($favorite->createdBy->id != auth()->user()->id)
            return ResponseSupport::error(__('You are not owner for this record'), 400);

        $favorite->delete();

        return ResponseSupport::success(__('Record deleted'), 200);
    }
}
