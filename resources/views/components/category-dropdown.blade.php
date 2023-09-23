@props(['categories'])
<div class="dropdown">
    <a href="/" class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Filter by Category</a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="/">All</a>
        </li>
        @foreach($categories as $category)
        <li>
            <a class="dropdown-item" href="?{{request('search')?'search='.request('search').'&':''}}{{request('author')?'author='.request('author').'&':''}}category={{$category->slug}}">{{ucwords($category->name)}}</a>
        </li>
        @endforeach
    </ul>
</div>