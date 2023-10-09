<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\SF\SF;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request):array{
        $query = SF::getSortingFilterQueryBuilder(Post::whereIn('parent_id', [0]), $request->input('sortingFilter'));
        $data['dropdownMenus'] = SF::getDropdownsArray();
        $data['posts'] = $query->paginate(25)->toArray();
        return $data;
    }
}
