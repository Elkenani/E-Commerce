@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name">Category</label>
                        <select class="form-select cus1" aria-label="Default select example" >
                            <option selected value="">{{$product->category->name}}</option>     
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$product->product_name}}" name="product_name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" value="{{$product->slug}}" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="small_description">Small Description</label>
                        <textarea name="small_description" rows="3" class='form-control'>{{$product->small_description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" rows="3" class='form-control'>{{$product->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="original_price">Original Price</label>
                        <input type="number" name="original_price" value="{{$product->original_price}}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" name="selling_price" value="{{$product->selling_price}}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tax">Tax</label>
                        <input type="number" name="tax" value="{{$product->tax}}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" value="{{$product->qty}}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status">status</label>
                        <input type="checkbox" {{$product->status == '1' ? 'checked' : ''}} name="status">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="trending">Trending</label>
                        <input type="checkbox" {{$product->trending == '1' ? 'checked' : ''}} name="trending">
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" value="{{$product->meta_title}}" name="meta_title">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class='form-control'>{{$product->meta_keywords}}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_description">Meta description</label>
                        <textarea name="meta_description" rows="3" class='form-control'>{{$product->meta_description}}</textarea>
                    </div>

                    @if($product->image)
                    <img src="{{asset('assets/uploads/products/'.$product->image)}}" class="cate-image" alt="">
                    @endif

                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection