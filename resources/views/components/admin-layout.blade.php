<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-3">
            <ul class="list-group mt-4">
                <li class="list-group-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="list-group-item"><a href="/admin/blogs/create">Create</a></li>
            </ul>
            </div>
            <div class="col-9">
            {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>