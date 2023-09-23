@props(['name','value'=>''])
<x-form.form-wrapper>
    <x-form.label name="{{$name}}" />
    <textarea name="{{$name}}" id="{{$name}}" cols="30" rows="5" class="editor form-control  @error($name) is-invalid @enderror">{{old($name,$value)}}</textarea>
    @error($name)
        <p class="text-danger">{{$message}}</p>
    @enderror
</x-form.form-wrapper>