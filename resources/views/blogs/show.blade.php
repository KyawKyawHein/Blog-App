@props(['blog','randomBlogs'])
<x-layout>
    <x-single-blog :blog="$blog" />
    @auth
    <x-comment-form :blog='$blog' />
    @endauth
    <x-comments :comments="$blog->comments()->latest()->paginate(3)" />
    <x-blogs_you_may_like :randomBlogs="$randomBlogs"/>

    <x-subscribe/>
</x-layout>