@props(['name','type'=>'text','value'=>''])
<x-form.form-wrapper>
    <x-form.label name="{{$name}}" />
    <input type="{{$type}}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}" id="{{$name}}" value="{{old($name,$value)}}" placeholder="Enter {{$name}}">
    @error($name)
        <p class="text-danger">{{$message}}</p>
    @enderror
</x-form.form-wrapper>