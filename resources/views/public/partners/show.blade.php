<x-core::layouts.public
    :title="$model->title . ' – ' . __('Partners') . ' – ' . websiteTitle()"
    :og-title="$model->title ?? ''"
    :description="$model->summary ?? ''"
    :og-image="$model->ogImageUrl()"
    :body-class="'body-partners body-partner-' . $model->id . ' body-page body-page-' . $page->id"
    :page="$page"
    :model="$model"
>
    <article class="partner">
        <header class="partner-header">
            <div class="partner-header-container">
                <div class="partner-header-navigator">
                    <x-core::items-navigator :$model :$page />
                </div>
                <h1 class="partner-title">{{ $model->title }}</h1>
                @if ($model->website)
                    <p class="partner-website">
                        <a class="partner-website-link" href="{{ $model->website }}" target="_blank" rel="noopener noreferrer">{{ $model->website }}</a>
                    </p>
                @endif
            </div>
        </header>
        <div class="partner-body">
            <x-core::json-ld
                :schema="[
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => $model->title,
                'url' => $model->website,
            ]"
            />
            <p class="partner-summary">{!! nl2br($model->summary) !!}</p>
            @if ($model->image)
                <figure class="partner-picture">
                    <img class="partner-picture-image" src="{{ $model->image->render(2000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="" />
                    @if ($model->image->description)
                        <figcaption class="partner-picture-legend">{{ $model->image->description }}</figcaption>
                    @endif
                </figure>
            @endif

            <div class="rich-content">{!! $model->formattedBody() !!}</div>
        </div>
    </article>
</x-core::layouts.public>
