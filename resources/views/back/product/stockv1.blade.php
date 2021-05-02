@extends('back.layouts.app')
@section('title','Manage Stock')
@section('content')

<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- .page -->
        <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <div class="card card-fluid" style="margin-top:1rem;">
                    <!-- .card-header -->
                    <div class="card-header">
                        <div class="d-md-flex align-items-md-start">
                            <h3 class="page-title mr-sm-auto"> Manage Product Stock of {{$product->name}} </h3>
                            <!-- .btn-toolbar -->
                            <div class="dt-buttons btn-group">
                                <a href="{{ route('product.index') }}" class="btn btn-primary">Product List</a>
                            </div><!-- /.btn-toolbar -->
                        </div>
                    </div><!-- /.card-header -->
                    <!-- .card-body -->
                    <div class="card-body">
                        @include('back.layouts.message')
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error has been occurred !</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div>
                            <div class="row">

                            </div>
                            <form action="/dashboard/variant/stock/Add" method="POST">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6">
                                                Size
                                            </div>
                                            <div class="col-md-12 col-sm-6">
                                                <select name="size_id" id="size_id" required class="form-control">
                                                    <option>Select Size</option>
                                                    @foreach (\App\Size::all() as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6">
                                                Color
                                            </div>
                                            <div class="col-md-12 col-sm-6">

                                                <select name="color_id" id="color_id" required class="form-control">
                                                    <option>Select Color</option>
                                                    @foreach (\App\Color::all() as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6">
                                                Price
                                            </div>
                                            <div class="col-md-12 col-sm-6">
                                                <input type="number" name="price" placeholder="Enter Price" min="0"
                                                    value="{{$product->price}}" required class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6">
                                                Sale Price
                                            </div>
                                            <div class="col-md-12 col-sm-6">
                                                <input type="number" name="saleprice" placeholder="Enter Sale Price"
                                                    min="0" value="{{$product->sales_price}}" required
                                                    class="form-control" />

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6">
                                                Stock
                                            </div>
                                            <div class="col-md-12 col-sm-6">
                                                <input type="number" name="total" placeholder="Enter Stock" required
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <br>
                                        <input type="submit" class="btn btn-primary form-control" value="Add Stock" />
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="mt-3 mb-3">
                            <table class="table">
                                <tr style="background: #30619F;color:white;">
                                    <th>
                                        Size
                                    </th>
                                    <th>
                                        Color
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Sale Price
                                    </th>
                                    <th>
                                        Stock
                                    </th>
                                    <th>Action</th>
                                </tr>
                                @foreach (\App\Stock::where('product_id',$product->id)->get() as $item)
                                <form action="/dashboard/variant/stock/Add" method="POST">
                                    @csrf
                                    <tr>
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <td>
                                            {{$item->size->name}}
                                            <input type="hidden" name="size_id" value={{$item->size_id}}>
                                        </td>
                                        <td>
                                            {{$item->color->name}}
                                            <input type="hidden" name="color_id" value={{$item->color_id}}>
                                        </td>
                                        <td>
                                            <input class="form-control" value={{$item->price}} name="price" />
                                        </td>
                                        <td>
                                            <input class="form-control" value={{$item->saleprice}} name="saleprice" />
                                        </td>
                                        <td>
                                            <input class="form-control" value={{$item->total}} name="total" />
                                        </td>
                                        <td>
                                            <input type="submit" class="btn btn-primary form-control" value="Update" />
                                        </td>
                                    </tr>
                                </form>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('scripts')

@endsection
