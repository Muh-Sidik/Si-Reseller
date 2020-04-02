<div class="modal fade" id="updateModal{{ $ds->id }}" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModal">Tambah Harga Jual {{ $ds->nama_barang }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">


            <form action="{{route('update.harga', $ds->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="number" name="harga_jual" value="{{ $ds->harga_jual }}" onkeypress="return goodchars(event,'1234567890',this)" class="form-control @error('harga_jual') is-invalid @enderror" id="harga" required placeholder="Tentukan Harga Jual Barang">
                    @error('harga_jual')
                        <div class="invalid-feedback">
                            Harga Jual harus diisi!
                        </div>
                    @enderror
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
        </div>
    </div>
</div>
