<?php

namespace App\Http\Controllers\Api\Favorites;

use App\Http\Controllers\Controller;
use App\Http\Requests\Favorites\StoreRequest;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Traits\ResponseSupport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreRequest $request
     * @return JsonResponse|Response
     */
    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validated();

        $favorite = Favorite::create($validated);

        return ResponseSupport::success(__('Record saved'), 200, new FavoriteResource($favorite));
    }
}
