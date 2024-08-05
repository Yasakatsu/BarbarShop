<!DOCTYPE html>
<html lang="ja">

<head>
    @include('partials.head')
</head>

<body class="bg-stone-900 text-white font-serif text-sm md:text-md">
    @include('partials.header')
    <main class="py-8">
        @include('sections.concept')
        @include('sections.service')
        @include('sections.menu')
        @include('sections.hours')
        @include('sections.address')
        @include('sections.reserve')
        @include('sections.social')
    </main>
    @include('partials.footer')
</body>

</html>
