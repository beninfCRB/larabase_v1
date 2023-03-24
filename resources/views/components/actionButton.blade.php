<div class="row mx-auto">
    <div class="col-sm-2">
        <a class="btn btn-sm btn-secondary btn-circle mr-2" href="{{ route($url . '.edit', $id) }}"><i
                class="fas fa-edit"></i></a>
    </div>
    <div class="col-sm-2 ml-4">
        <a class="btn btn-danger btn-circle btn-sm" href="#" data-toggle="modal" data-target="#deleteModal"><i
                class="fas fa-trash"></i></a>
    </div>
</div>

<div class="modal modal-danger" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route($url . '.destroy', $id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <h5 class="text-center">Are you sure you want to delete this contact?</h5>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Yes, Delete Contact</button>
            </div>
            </form>
        </div>
    </div>
</div>
