@props(['randomBlogs'])
<section class="container text-center" id="blogs">
      <h3 class="display-5 fw-bold mb-4 text-primary">Blogs you may like</h3>
      <div class="row">
        @foreach($randomBlogs as $blog)
            <x-blog-card :blog="$blog"/>
        @endforeach
      </div>    
</section>
   
   