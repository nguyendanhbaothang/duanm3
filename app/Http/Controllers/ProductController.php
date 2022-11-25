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
    public function index()
    {
        $products =Product::paginate(5);
        // dd($products);
        // $categories = Category::all();
        $param = [
            // 'categories' => $categories,
            'products' => $products,
        ];

        return view('admin.product.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        alert()->success('Thêm sản phẩm','thành công');

        return redirect()->route('product.index');
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
            return redirect()->route('product.index');
        }
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->paginate(5);

        return view('admin.product.index', compact('products'));
    }


    public function destroy($id)
    {
        $category=Product::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

    }
    public  function trash(){
        $products = Product::onlyTrashed()->get();
        $param = ['products'    => $products];
        return view('admin.product.trash', $param);
    }

    public  function softdeletes($id){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $product = Product::findOrFail($id);
        $product->deleted_at = date("Y-m-d h:i:s");
        $notification = [
            'message' => 'Đã chuyển vào kho lưu!',
            'alert-type' => 'success'
        ];
        $product->save();
        return redirect()->route('product.index')->with($notification);
    }

    public function restoredelete($id){
        $product=Product::withTrashed()->where('id', $id);
        $product->restore();
        $notification = [
                'message' => 'Khôi phục thành công!',
                 'alert-type' => 'success'
            ];
        return redirect()->route('product.trash')->with($notification);;
    }
}
