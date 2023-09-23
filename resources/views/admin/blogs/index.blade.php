@props(['blogs'])
<x-admin-layout>
    @if(session("success"))
        <p class="bg-success p-3 text-light">{{session("success")}}</p>
    @endif
    <div class="mt-3">
        <h1>Blogs</h1>
        <table class="table">
            <thead>
                <td>Id</td>
                <td>Title</td>
                <td>Author</td>
                <td>Control</td>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->author->name}}</td>
                        <td class="d-flex gap-2">
                            <form action="/admin/blogs/{{$blog->slug}}/edit" method="get">
                                @csrf
                                <button class="btn-sm btn-warning">Edit</button>
                            </form>
                            <form action="/admin/blogs/{{$blog->slug}}/delete" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$blogs->links()}}
    </div>
</x-admin-layout>