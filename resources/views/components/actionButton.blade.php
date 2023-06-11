<div class="row mx-auto">
    <div class="col-sm-2">
        <button class="btn btn-sm btn-secondary btn-circle mr-2" data-toggle="modal"
            data-target="#edit{{ $id }}"><i class="fas fa-edit"></i></button>
    </div>
    <div class="col-sm-2 ml-4">
        <form id="form" action="{{ route($url . '.destroy', $id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-circle btn-sm btn-submit"><i
                    class="fas fa-trash"></i></button>
        </form>
    </div>
</div>
<script type="module">
    $(".btn-submit").click(function(e) {
        e.preventDefault();
        var form = this
        Swal.fire({
            title: "Yakin ingin menhapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya!",
            cancelButtonText: "Batal",
            closeOnConfirm: true
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).parent('form').trigger('submit')
            }
        });
    });
</script>
