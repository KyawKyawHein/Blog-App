@props(['categories'])
<x-admin-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card p-3 m-4">
                    <h1 class="text-primary text-center">Create Blog</h1>
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <x-form.input name="title" />
                        <x-form.input name="slug"/>
                        <x-form.input name="thumbnail" type="file" />
                        <x-form.input name="intro" />
                        <x-form.textarea name="body" />
                        <div class="form-group mb-2">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id==old('category_id')?'selected':''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>