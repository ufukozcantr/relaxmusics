<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ResponseSupport;
use Exception;
use Illuminate\Http\JsonResponse;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Category $category
     * @return JsonResponse
     * @throws Exception
     */
    public function __invoke(Category $category)
    {
        $category->delete();

        return ResponseSupport::success(__('Record deleted'), 200);
    }
}
