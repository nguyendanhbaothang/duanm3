<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        $param = [
            'categories'=> $categories
        ];

        return view('admin.category.index', $param );


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('admin.category.add');
        // return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                    'name' => 'required|unique:categories|min:2',
                ],
                    [
                        'name.required'=>'Không được để trống',
                        'name.unique'=>'Không trùng',
                        'name.min'=>'Lớn hơn:min'
                    ]
            );
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|min:2',
        ],
            [
                'name.required'=>'Không được để trống',
                'name.unique'=>'Không trùng',
                'name.min'=>'Lớn hơn :min'
            ]
    );
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();

        // return redirect('category');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        // return redirect('category');
        return redirect()->route('category.index');
    }
}
