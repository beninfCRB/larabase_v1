<div class="row mx-auto">
    <div class="col-sm-2">
        <a class="btn btn-sm btn-secondary btn-circle mr-2" href="{{ route($url . '.edit', $id) }}"><i
                class="fas fa-edit"></i></a>
    </div>
    <div class="col-sm-2 ml-4">
        <form action="{{ route($url . '.destroy', $id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-circle btn-sm" type="submit"
                onclick="return confirm('Anda yakin mau menghapus Data ini ?')"><i class="fas fa-trash"></i></button>
        </form>
    </div>
</div>
