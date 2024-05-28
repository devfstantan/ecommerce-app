@extends('manager.layout.main')
@section('title', 'Nouveau Produit')

@section('content')
    <form 
        action="{{ route('manager.products.store') }}" 
        method="post" 
        enctype="multipart/form-data"
    >
        @csrf

        <div class="row">
            {{-- Titre --}}
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('title') }}" id="title" name="title" placeholder=""
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
                    <input type="text" value="{{ old('sku') }}" id="sku" name="sku" placeholder=""
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
                        @checked(old('is_published'))>
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
                    <input type="number" value="{{ old('price') }}" id="price" name="price" placeholder=""
                        class="form-control">
                    <label for="price">Prix</label>
                    @error('price')
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
                                    id="{{ 'cat' . $loop->index }}" name="categories[]">
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
                    <textarea id="description" name="description" placeholder="" class="form-control" style="height: 100px">{{ old('description') }}</textarea>
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




        <input type="submit" value="Ajouter" class="btn btn-primary">
    </form>
@endsection
