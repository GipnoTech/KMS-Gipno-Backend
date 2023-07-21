@php use Spatie\LaravelMarkdown\MarkdownRenderer; @endphp

<div class="rows">
    <div class="col-xl-12 mt-3">
        <x-markdown>
        {{$section->content}}
        </x-markdown>
    </div>
</div>


