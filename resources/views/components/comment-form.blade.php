@props(['blog']);
<div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
            <x-card-wrapper >
                <form method="post" action="/blogs/{{$blog->slug}}/comment">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="body" class="form-control mb-2" id="comment" cols="30" rows="4"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </x-card-wrapper>
        </div>
    </div>
</div>