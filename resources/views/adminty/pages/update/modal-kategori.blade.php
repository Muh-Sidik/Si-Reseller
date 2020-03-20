<div class="modal fade" id="updateModal{{$ds->id}}" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Ubah Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">


        <form action="{{route('kategori.update', $ds->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label >Nama Kategori</label>
                        <input type="text" name="nama_kategori" value="{{ $ds->nama_kategori }}" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" required placeholder="Masukkan Nama Kategori">
                        @error('nama_kategori')
                            <div class="invalid-feedback">
                                Nama Kategori harus diisi!
                            </div>
                        @enderror
                    </div>


        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
        </div>
    </div>
</div>
