<x-applayout title="{{ $title }}">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">{{ $title }}</h1>

        <div class="card shadow-lg">
            <h1 class="mx-auto mt-4">{{ $method }}</h1>
            <x-AddButton module="users" />
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-applayout>
