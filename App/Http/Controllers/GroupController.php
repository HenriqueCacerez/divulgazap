<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        $category      = request('category');
        $resultsByPage = 16;

        $category = $category ? Category::where('name', $category)->first() : null;

        if ($category) {
            $groups = $category->groups()->orderBy('created_at', 'DESC')->paginate($resultsByPage);
        } else {
            $groups = Group::orderBy('created_at', 'DESC')->paginate($resultsByPage);
        }

        return view('groups.index', compact('groups', 'category'));
    }
    
    public function show(string $uri)
    {
        $group = Group::where('uri', $uri)->first();

        if (!$group) {
            return redirect('/');
        }

        return view('groups.show', compact('group'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('groups.create', compact('categories'));
    }
}