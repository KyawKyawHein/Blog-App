<x-layout>

    @if(session("success"))
        <p class="bg-success p-3 text-light">{{session("success")}}</p>
    @endif

    <x-hero/>

    <x-blogs-section :blogs="$blogs"/>

    <x-subscribe/>
</x-layout>