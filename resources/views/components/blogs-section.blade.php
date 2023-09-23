@props(['blogs','categories'])
<section class="container text-center" id="blogs">
      <h1 class="display-5 fw-bold mb-4">Blogs</h1>
      <x-category-dropdown/>
      <form action="" class="my-3">
        <div class="input-group mb-3">
          @if(request('category'))
            <input type="text" name="category" hidden value="{{request('category')}}">
          @endif
          @if(request('author'))
            <input type="text" name="author" hidden value="{{request('author')}}">
          @endif
          <input
            type="text"
            autocomplete="false"
            class="form-control"
            placeholder="Search Blogs..."
            name="search"
            value="{{request('search')}}"
          />
          <button
            class="input-group-text bg-primary text-light"
            id="basic-addon2"
            type="submit"
          >
            Search
          </button>
        </div>
      </form>
      <div class="row">
        @forelse($blogs as $blog)
        <x-blog-card :blog="$blog"/>
        @empty
          <h5 class="text-danger">Oops!!There is no blogs.</h5>
        @endforelse
        {{ $blogs->links()}}
      </div>    
</section>
   
   