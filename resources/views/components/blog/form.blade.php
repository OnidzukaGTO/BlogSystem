@props(['blog' => null])

<x-form {{ $attributes->merge([
    'method' => 'post'
])}}>
    <x-form-item>
        <x-label required>{{ __('Title') }}</x-label>
        <x-input name="title" value="{{ $blog['title'] ?? '' }}" autofocus />
        <x-error name="title"/>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Content') }}</x-label>
        <x-trix name="content" value="{{ $blog['content'] ?? '' }}" />
        <x-error name="content"/>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Picture') }}</x-label>
        <x-input type="file" name="file[]" multiple value="{{ $blog['file'] ?? '' }}" />
        <x-error name="file"/>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Date Published') }}</x-label>
        <x-input name="published_at" placeholder="dd.mm.yyyy" />
        <x-error name="published_at"/>
    </x-form-item>

    {{$slot}}
</x-form>
