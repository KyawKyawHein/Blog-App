<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card p-3 m-4">
                    <form method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Enter your name">
                            @error("name")
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="username" >Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{old('username')}}" placeholder="Enter your username">
                            @error("username")
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" placeholder="Enter email">
                            @error("email")
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{old('password')}}" placeholder="Password">
                            @error("password")
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>