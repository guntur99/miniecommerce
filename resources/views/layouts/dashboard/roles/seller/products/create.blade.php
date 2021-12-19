@extends('layouts.dashboard.app')

@section('content')

    <section class="admin-content" id="menu-search">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4>Create Product</h4>
                    </div>
                </div>
            </div>
        </div>
        <section class="pull-up">
            <div class="container">
                <form method="POST" action="{{ route('store.products') }}" enctype="multipart/form-data">
                @csrf

                    <div class="card m-b-30">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control js-select2">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group col-md-4">
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                            <label class="custom-file-label" for="thumbnail"
                                                    >Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="price">Price</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="number" class="form-control"  id="price" name="price" placeholder="1000000" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="stock">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" value="1">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="weight">Weight</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control"  id="weight" name="weight" value="1">
                                        <div class="input-group-append">
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <button type="submit" id="create-new-product" class="w-100 mt-3 btn btn-dark">Create New Product</button>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </section>

@endsection
