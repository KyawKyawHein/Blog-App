@props(['blog'])
<div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src='{{asset("/storage/$blog->thumbnail")}}'
            class="card-img-top"
            alt="..."
          />
          <h1 class="my-3 text-primary">{{$blog->title}}</h3>
          <div class="">
            <span>{{$blog->created_at->diffForHumans()}}</span>
            <p class="mt-1">{{$blog->author->name}}</p>
            @auth
            <form action="/blogs/{{$blog->slug}}/subscription" method="post">
              @csrf
              @if(auth()->user()->isSubscribed($blog))
              <button class="btn btn-danger btn-sm">Unsubscribe</button>
              @else
              <button class="btn btn-warning btn-sm">Subscribe</button>
              @endif
            </form>
            @endauth
          </div>
          <h5 class="mt-3">
            {{$blog->body}}
          </h5>
        </div>
      </div>
</div>
