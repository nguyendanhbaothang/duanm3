<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        $categories = Category::paginate(5);
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
        $this->authorize('create', Category::class);
            return view('admin.category.add');
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
        alert()->success('Thêm sản phẩm','thành công');
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
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Category::class);
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
        alert()->success('Thêm sản phẩm','thành công');
        return redirect()->route('category.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('category.index');
        }
        $categories = Category::where('name', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    public function destroy($id)
    {
        $this->authorize('forceDelete', Category::class);
        $category=Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
    }
    public  function softdeletes($id){
        $this->authorize('delete', Category::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s");
        $notification = [
            'message' => 'Đã chuyển vào kho lưu!',
            'alert-type' => 'success'
        ];
        $category->save();
        return redirect()->route('category.index')->with($notification);
    }
    public  function trash(){
        $this->authorize('viewtrash', Category::class);
        $categories = Category::onlyTrashed()->get();
        $param = ['categories'    => $categories];
        return view('admin.category.trash', $param);
    }
    public function restoredelete($id){
        $this->authorize('restore',Category::class);
        $categories=Category::withTrashed()->where('id', $id);
        $categories->restore();
        $notification = [
                'message' => 'Khôi phục thành công!',
                 'alert-type' => 'success'
            ];
        return redirect()->route('category.trash')->with($notification);;
    }
}
