<div class="modal fade" id="deleteModal{{$or->id_order}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModal">Hapus</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            Anda Yakin Ingin Menghapus Data ini?

        </div>
            <div class="modal-footer">
                <form action="{{route('order.delete', $or->id_order)}}" method="POST">
                                    @csrf
                                    @method('delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>
