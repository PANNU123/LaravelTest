<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PoductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function product(Request $request){
        if ($request->ajax()){
            if(!empty($request->title)){
                $data = Product::with('product_variants')->where('title', 'LIKE', "%$request->title%")->get();
            }elseif(!empty($request->priceFrom ) && !empty($request->priceTo )){
                $data = Product::with('product_variants')
                ->whereBetween('price', [$request->priceFrom, $request->priceTo])
                ->get();
            }elseif(!empty($request->date)){
                $date = Carbon::parse($request->date)->format('Y-m-d');
                $data = Product::with('product_variants')->whereDate('created_at', $date)->get();
            }
            else{
                $data = Product::with('product_variants')->latest()->get();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {

                    $btn ='<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBlog">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBlog">Delete</a>';
                    return $btn;

                })
                ->editColumn('Title', function ($data) {
                    return Str::limit($data->title, 15);
                })
                ->editColumn('Variant', function ($data) {
                    $html='';
                    foreach($data->product_variants as $item){
                        $html= $html.'<span style="margin-left: 5px" class="badge bg-success">'.$item->variant.'</span>';
                    }
                    $price=$data->price;
                    $qty=$data->qty;
                     return $html .'<span style="margin-left: 5px" class="badge bg-warning">$'.$price.'</span>'.'<span style="margin-left: 5px" class="badge bg-danger">qty-'.$qty.'</span>';
                })
                ->editColumn('Price', function ($data) {
                    return $data->price;
                })
                ->editColumn('Quantity', function ($data) {
                    return $data->qty;
                })
                ->editColumn('Description', function ($data) {
                    return Str::limit($data->description, 15);
                })
                ->rawColumns(['action', 'Title','Variant','Description'])
                ->make(true);
        }
        return view('admin.pages.product.index');
    }

    public function productStore(Request $request){
// return $request->all();
        if($request->ajax()){
            $pro=PoductImage::where('product_id',$request->id)->first();

            if (!empty($request->image)) {
                $image = fileUpload($request->image, product_image());
            }elseif (!empty($request->hidden_image)){
                $image = $pro->thumbnail;
            }else{
                return redirect()->back()->with(Toastr::error('Image is Required', 'Title', ["positionClass" => "toast-top-center"]));
            }

            $product=Product::updateOrCreate(['id' => $request->id],[
                'title'=>$request->title,
                'sku'=>$request->sku,
                'description'=>$request->description,
                'price'=> $request->price,
                'qty'=> $request->qty,
            ]);
            if($product){
               $productImage =  PoductImage::updateOrCreate(['product_id' => $request->id],[
                'product_id'=>$product->id,
                'thumbnail'=>$image,
               ]);

               if($productImage){
                foreach($request->tag as $item){
                    ProductVariant::updateOrCreate(['product_id' => $product->id,'variant_id'=>$request->variant_one],[
                        'variant'=>$item,
                        'variant_id'=>$request->variant_one,
                        'product_id'=>$product->id,
                    ]);
                }
                foreach($request->tags as $item){
                    ProductVariant::updateOrCreate(['product_id' => $product->id,'variant_id'=>$request->variant_two],[
                        'variant'=>$item,
                        'variant_id'=>$request->variant_two,
                        'product_id'=>$product->id,
                    ]);
                }
               }
            }
        }
        return response()->json(['success' => true]);
    }
    public function productEdit($id){
        // $blog_edit=Product::with('product_variants','images')->where('id',$id)->first();
        $blog_edit = Product::with('product_variants','product_variants.variant','images')->where('id',$id)->first();
        return response()->json($blog_edit);
    }
    public function productDelete($id){
        $blog_delete=Product::where('id',$id)->delete();
        return response()->json($blog_delete);
    }
}
