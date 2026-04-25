<ul class="partner-list-list">
    @foreach ($items as $partner)
        @include('public::partners._list-item')
    @endforeach
</ul>
