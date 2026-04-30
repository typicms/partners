<x-core::layouts.admin :title="__('Partners')">
    <item-list url-base="/api/partners" fields="id,image_id,position,status,title" table="partners" title="partners" include="image" :exportable="true" :searchable="['title']" :sorting="['position']" :draggable="$can('update partners')">
        <template #top-buttons v-if="$can('create partners')">
            <x-core::create-button :url="route('admin::create-partner')" :label="__('Create partner')" />
        </template>

        <template #columns="{ sortArray }">
            <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Order')"></item-list-column-header>
            <item-list-column-header name="checkbox" v-if="$can('update partners')||$can('delete partners')"></item-list-column-header>
            <item-list-column-header name="edit" v-if="$can('update partners')"></item-list-column-header>
            <item-list-column-header name="status_translated" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
            <item-list-column-header name="image" :label="$t('Image')"></item-list-column-header>
            <item-list-column-header name="title_translated" sortable :sort-array="sortArray" :label="$t('Title')"></item-list-column-header>
        </template>

        <template #table-row="{ model, checkedModels, loading, sortArray }">
            <td class="drag-handle text-muted" v-if="$can('update partners')" :style="{ cursor: sortArray[0] === 'position' ? 'grab' : 'default' }">
                <i :class="['icon-grip-vertical', { 'opacity-50': sortArray[0] !== 'position' }]"></i>
            </td>
            <td class="checkbox" v-if="$can('update partners')||$can('delete partners')">
                <item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox>
            </td>
            <td v-if="$can('update partners')">
                <item-list-edit-button :url="'/admin/partners/' + model.id + '/edit'"></item-list-edit-button>
            </td>
            <td>
                <item-list-status-button :model="model"></item-list-status-button>
            </td>
            <td><img v-if="model.image_id" :src="model.thumb" alt="" height="27" /></td>
            <td>@{{ model.title_translated }}</td>
        </template>
    </item-list>
</x-core::layouts.admin>
