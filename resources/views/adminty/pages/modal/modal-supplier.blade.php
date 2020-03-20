<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModal">Tambah Supplier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">


                <form action="{{route('supplier.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label >Nama Supplier</label>
                        <input type="text" name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama_supplier" required placeholder="Masukkan Nama Supplier">
                        @error('nama_supplier')
                            <div class="invalid-feedback">
                                Nama Supplier harus diisi!
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >No.Hp</label>
                        <input type="text" name="no_hp" onkeypress="return goodchars(event,'1234567890',this)" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" required placeholder="Masukkan Nomor Hp">
                        @error('no_hp')
                            <div class="invalid-feedback">
                                Nomor Hp harus diisi!
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="5" required placeholder="Masukkan Alamat"></textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                Alamat harus diisi!
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
