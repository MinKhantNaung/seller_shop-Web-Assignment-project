@extends('dashboard.layouts.app')

@section('content')
<!-- Start Table -->
<div class="card col-lg-10 col-12">
    <div class="card-header">
        <h5 class="card-title">Add Items</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('items.create') }}" enctype="multipart/form-data" method="POST" class="row">
            @csrf
            <div class="col-md-6">
                <h5>Item Information</h5>
                <div class="mb-3">
                    <label for="name" class="my-2">Item Name*</label>
                    <input type="text" name="name" id="name" placeholder="Input Name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error ('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id">Select Category*</label>
                    <select name="category_id" id="category_id"
                        class="form-select mt-2 @error('category_id') is-invalid @enderror">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error ('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price">Price*</label>
                    <input type="number" name="price" id="price"
                        class="form-control mt-2 @error('price') is-invalid @enderror" placeholder="Enter Price ($)"
                        value="{{ old('price') }}" required>
                    @error ('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="mb-2">Description*</label>
                    <textarea name="description" id="description">{{ old('description') }}</textarea>
                    @error ('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="condition">Select Item Condition</label>
                    <select name="condition" id="condition"
                        class="form-select mt-2 @error('condition') is-invalid @enderror">
                        <option value="">Select Item Condition</option>
                        <option value="0">New</option>
                        <option value="1">Used</option>
                        <option value="2">Good Second Hand</option>
                    </select>
                    @error ('condition')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type">Select Item Type</label>
                    <select name="type" id="type" class="form-select mt-2 @error('type') is-invalid @enderror">
                        <option value="">Select Item Type</option>
                        <option value="0">For Sell</option>
                        <option value="1">For Buy</option>
                        <option value="2">For Exchange</option>
                    </select>
                    @error ('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_publish" value="1" id="is_publish">
                        <label class="form-check-label user-select-none ms-0" for="is_publish">
                            Publish
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image">Item Photo*</label> <br>
                    <small class="text-muted">Recommended Size 400 x 200</small>
                    <input type="file" name="image" id="image"
                        class="form-control mt-2 @error('image') is-invalid @enderror" required>
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12">
                        <h5>Owner Information</h5>
                        <div class="mb-3">
                            <label for="owner_name" class="my-2">Owner Name*</label>
                            <input type="text" name="owner_name" id="owner_name" placeholder="Input Owner Name"
                                class="form-control @error('owner_name') is-invalid @enderror"
                                value="{{ old('owner_name') }}" required>
                            @error ('owner_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone">Contact Number</label>
                            <div class="input-group">
                                <span class="input-group-text mt-2">+95</span>
                                <input type="number" id="phone" name="phone" placeholder="Add Number"
                                    class="form-control mt-2 @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" required>
                                @error ('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" placeholder="Enter Address"
                                class="form-control mt-2 @error('address') is-invalid @enderror"
                                required>{{ old('address') }}</textarea>
                            @error ('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Map Picker Start -->
                        <input class="example" name="coordinates" type="text" value="21.982316,96.179738"/>
                        <div id="mapContainer" class="w-100" style="height: 500px"></div>
                        <!-- Map Picker End -->
                    </div>
                    <div class="mt-5 col-12">
                        <button type="submit" class="btn btn-sm btn-primary float-end px-3 ms-2">Save</button>
                        <a href="{{ route('items.index') }}"
                            class="btn btn-sm btn-outline-light text-dark float-end">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('script')
<!-- jquery -->
<script>
    CKEDITOR.replace('description');

    $(document).ready(function () {
        $('.example').leafletLocationPicker({
            alwaysOpen: true,
            mapContainer: "#mapContainer",
            position: 'bottomleft',
            height: 500,
        });
    })

</script>
@endsection
