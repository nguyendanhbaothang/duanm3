<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Product::class);

        $products =Product::all();
        $categories = Category::all();
        $key        = $request->key ?? '';
        $name      = $request->name ?? '';
        $price      = $request->price ?? '';
        $category_id       = $request->category_id ?? '';
        $size      = $request->	size ?? '';
        $color      = $request->	color ?? '';
        $id         = $request->id ?? '';
        $query = Product::query(true);

        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($price) {
            $query->where('price', 'LIKE', '%' . $price . '%');
        }
        if ($category_id) {
            $query->where('category_id', 'LIKE', '%' . $category_id . '%');
        }
        if ($size) {
            $query->where('size', 'LIKE', '%' . $size . '%');
        }
        if ($color) {
            $query->where('color', 'LIKE', '%' . $color . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('name', 'LIKE', '%' . $key . '%');
            $query->orWhere('price', 'LIKE', '%' . $key . '%');
            $query->orWhere('category_id', 'LIKE', '%' . $key . '%');
            $query->orWhere('size', 'LIKE', '%' . $key . '%');
            $query->orWhere('color', 'LIKE', '%' . $key . '%');
        }

        $products = $query->paginate(1);

       $params = [
            'f_id'        => $id,
            'f_name'     => $name,
            'f_price'     => $price,
            'f_category_id'     => $category_id,
            'f_size'     => $size,
            'f_key'       => $key,
            'f_categories' => $categories,
            'f_color' => $color,
            'products'    => $products,
        ];
        return view('admin.product.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Product::class);

        $categories=Category::get();
        $param = [
            'categories' => $categories
        ];
        return view('admin.product.add', $param);
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
            'name' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'size' => 'required',
            'color' => 'required',
        ],
            [
                'name.required'=>'Không được để trống',
                'price.required'=>'Không được để trống',
                'amount.required'=>'Không được để trống',
                'description.required'=>'Không được để trống',
                'category_id.required'=>'Không được để trống',
                'size.required'=>'Không được để trống',
                'color.required'=>'Không được để trống',

            ]
    );
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->size = $request->size;
        $product->color = $request->color;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public/uploads/product/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->save();
        alert()->success('Thêm sản phẩm','thành công');

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Product::class);

        $productshow = Product::findOrFail($id);
        $param =[
            'productshow'=>$productshow,
        ];

        // $productshow-> show();
        return view('admin.product.show',  $param );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Product::class);

        $product = Product::find($id);
        $categories=Category::get();
        $param = [
            'product' => $product ,
            'categories' => $categories
        ];
        return view('admin.product.edit' , $param);
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
            'name' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'size' => 'required',
            'color' => 'required',
        ],
            [
                'name.required'=>'Không được để trống',
                'price.required'=>'Không được để trống',
                'amount.required'=>'Không được để trống',
                'description.required'=>'Không được để trống',
                'category_id.required'=>'Không được để trống',
                'size.required'=>'Không được để trống',
                'color.required'=>'Không được để trống',

            ]
    );

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->size = $request->size;
        $product->color = $request->color;
        $get_image=$request->image;
        if($get_image){
            $path='public/uploads/product/'.$product->image;
            if(file_exists($path)){
                unlink($path);
            }
        $path='public/uploads/product/';
        $get_name_image=$get_image->getClientOriginalName();
        $name_image=current(explode('.',$get_name_image));
        $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $product->image=$new_image;
        // dd($product);

        $data['product_image']=$new_image;
        }
        $product->save();
        alert()->success('Sửa ','thành công');

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function destroy($id)
    {
        $this->authorize('forceDelete', Product::class);
        $products=Product::onlyTrashed()->findOrFail($id);
        $products->forceDelete();

    }
    public  function trash(){
        $this->authorize('viewtrash', Product::class);
        $products = Product::onlyTrashed()->get();
        $param = ['products'    => $products];
        return view('admin.product.trash', $param);
    }

    public  function softdeletes($id){
        $this->authorize('delete', Product::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $product = Product::findOrFail($id);
        $product->deleted_at = date("Y-m-d h:i:s");
        // $notification = [
        //     'message' => 'Đã chuyển vào kho lưu!',
        //     'alert-type' => 'success'
        // ];
        $product->save();
        alert()->success('Đã chuyển vào kho lưu trữ ','thành công');

        return redirect()->route('product.index');
    }

    public function restoredelete($id){
        $this->authorize('restore', Product::class);
        $product=Product::withTrashed()->where('id', $id);
        $product->restore();
        // $notification = [
        //         'message' => 'Khôi phục thành công!',
        //          'alert-type' => 'success'
        //     ];
        alert()->success('Khôi phục ','thành công');

        return redirect()->route('product.trash');
    }
}
