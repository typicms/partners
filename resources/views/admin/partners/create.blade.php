<x-core::layouts.admin :title="__('New partner')">
    {!! BootForm::open()->action(route('admin::index-partners'))->addClass('form') !!}
    @include('admin::partners._form')
    {!! BootForm::close() !!}
</x-core::layouts.admin>
