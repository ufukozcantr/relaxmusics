<?php

namespace App\Http\Controllers\Api\Favorites;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Traits\ResponseSupport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers\Api\Favorutes
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
        return ResponseSupport::success(__('Return data'), 200, FavoriteResource::collection(Favorite::mine()->get()));
    }
}
