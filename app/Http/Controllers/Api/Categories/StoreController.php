<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\StoreRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\ImageSupport;
use App\Traits\ResponseSupport;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class StoreController
 * @package App\Http\Controllers\Api\Categories
 */
class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreRequest $request
     * @return JsonResponse|void
     * @throws Exception
     */
    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validated();

        $path = 'categories/images/'; // this is s3 file path
        $validated['image'] = ImageSupport::save($validated['image'], $path); // image is saving in trait
        if (!$validated['image'])
            return ResponseSupport::error(__('Image didnt save'), 400);

        $category = Category::create($validated);

        return ResponseSupport::success(__('Record saved'), 200, new CategoryResource($category));
    }
}
