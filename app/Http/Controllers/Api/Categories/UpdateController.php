<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\UpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\ImageSupport;
use App\Traits\ResponseSupport;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class UpdateController
 * @package App\Http\Controllers\Api\Categories
 */
class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdateRequest $request
     * @param Category $category
     * @return JsonResponse|Response
     * @throws Exception
     */
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $validated = $request->validated();

        if($validated['image']){
            $path = 'categories/images/'; // this is s3 file path
            $validated['image'] = ImageSupport::save($validated['image'], $path); // image is saving in trait
            if (!$validated['image']) // if have a problem when image is saving
                return ResponseSupport::error(__('Image didnt save'), 400);
        }

        $category = $category->update($validated);

        return ResponseSupport::success(__('Record updated'), 200, new CategoryResource($category));
    }
}
