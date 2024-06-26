@extends('bo.layout.main')
@section('title', 'Editer Produit')

@section('content')
    <form action="{{ route('bo.products.update',$product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            {{-- Titre --}}
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" value="{{ $product->title }}" id="title" name="title" placeholder=""
                        class="form-control">
                    <label for="title">Titre</label>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- SKU --}}
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" value="{{ $product->sku}}" id="sku" name="sku" placeholder=""
                        class="form-control">
                    <label for="sku">SKU</label>
                    @error('sku')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- is_published --}}
            <div class="col-md-6">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="is_published" name="is_published"
                        @checked($product->is_published)>
                    <label class="form-check-label" for="is_published">
                        Est Publié?
                    </label>
                    @error('is_published')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Price --}}
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="number" value="{{ $product->price}}" id="price" name="price" placeholder=""
                        class="form-control">
                    <label for="price">Prix</label>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Store --}}
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="store_id" name="store_id" aria-label="Store">
                        <option value="">Choisir un store</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}" @selected($product->store->id == $store->id)>
                                {{ $store->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="store_id">Store</label>
                    @error('store_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Categories --}}
            <div class="col-md-12 p-2 ">
                <label for="">Catégories</label>
                <div class=" row mb-3">
                    @foreach ($categories as $cat)
                        <div class="col-sm-3">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="{{ $cat->id }}"
                                    id="{{ 'cat' . $loop->index }}" name="categories[]"
                                    @checked(in_array($cat->id, $selected_categories) )
                                    >
                                <label class="form-check-label" for="{{ 'cat' . $loop->index }}">
                                    {{ $cat->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('cateogires[]')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <textarea id="description" name="description" placeholder="" class="form-control" style="height: 100px"
                    >{{ $product->description }} </textarea>
                    <label for="description">Description</label>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
             {{-- Image --}}
             <div class="col-md-12">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>




        <input type="submit" value="Sauvegarder" class="btn btn-primary">
    </form>
@endsection
