<x-core::layouts.page
    :page="$page"
    :body-class="'body-partners body-partners-index body-page body-page-' . $page->id"
>
    <div class="page-body">
        <div class="page-body-container">
            @include('public::pages._main-content', ['page' => $page])
            @include('public::files._document-list', ['model' => $page])
            @include('public::files._image-list', ['model' => $page])

            <x-core::json-ld :schema="[
                '@context' => 'https://schema.org',
                '@type' => 'ItemList',
                'itemListElement' => $models->map(fn ($item, $index) => [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'url' => $item->url(),
                ])->all(),
            ]" />

            @includeWhen($models->count() > 0, 'public::partners._list', ['items' => $models])
        </div>
    </div>
</x-core::layouts.page>
