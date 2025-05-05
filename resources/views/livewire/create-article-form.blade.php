<div>
    @if (session()->has('success'))
       <div class="alert alert-success text-center">
            {{session('success')}}
        </div> 
    @endif
    <form class="shadow rounded p-5 my-5" wire:submit="store">
        <div class="mb-3">
            <label for="title" class="form-label">{{__('ui.title')}}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror bg-dark text-white" id="title" wire:model.blur="title">
            @error('title')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{__('ui.description')}}</label>
            <textarea id="description" class="form-control @error('description') is-invalid @enderror bg-dark text-white" wire:model.blur="description" cols="30" rows="10"></textarea>
            @error('description')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">{{__('ui.price')}}</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror bg-dark text-white" id="price" wire:model.blur="price">
            @error('price')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>

        {{-- sezione immagini --}}
        <div class="mb-3">
            <label for="images" class="form-label">{{__('ui.images')}}</label>
            <input type="file" wire:model.live="temporary_images" multiple
                class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
            @error('temporary_images.*')
                <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
            @error('temporary_images')
                <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
        </div>
        
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo preview:</p>
                    <div class="row border border-4 rounded shadow py-4">
                        @foreach ($images as $key => $image)
                            <div class="col d-flex flex-column align-items-center my-3">
                                <div class="imgPreview mx-auto shadow rounded"
                                    style="background-image: url({{ $image->temporaryUrl() }});">
                                </div>
                                <button type="button" class="btn btn-danger mt-3"
                                wire:click="removeImage({{$key}})">{{__('ui.remove')}}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="mb-3">
            <label for="category" class="form-label">{{__('ui.category')}}</label>
            <select name="" id="category" wire:model.blur="category" class="form-control @error('category') is-invalid @enderror bg-dark text-white">
                <option label disabled> {{__('ui.chooseCategory')}} </option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                @endforeach
            </select>
            @error('category')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn buttonOpacity"> {{__('ui.publish')}} </button>
        </div>
    </form>
</div>
