<div class="modal fade" id="updateModal{{$ds->id}}" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Ubah Data Reseller</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">


        <form action="{{route('reseller.update', $ds->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label >Nama Reseller</label>
                        <input type="text" name="nama_reseller" value="{{ $ds->nama_reseller }}" class="form-control @error('nama_reseller') is-invalid @enderror" id="nama_reseller" required placeholder="Masukkan Nama Reseller">
                        @error('nama_reseller')
                            <div class="invalid-feedback">
                                Nama Reseller harus diisi!
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Nomor Whatsapp</label>
                        <input type="text" name="no_wa" onkeypress="return goodchars(event,'1234567890',this)" value="{{ $ds->no_wa }}" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa" required placeholder="Masukkan Nomor">
                        @error('no_wa')
                            <div class="invalid-feedback">
                                Nomor Whatsapp harus diisi!
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Domisili</label>
                        <input type="text" name="domisili" value="{{ $ds->domisili }}" class="form-control @error('domisili') is-invalid @enderror" id="domisili" required placeholder="Masukkan Domisili">
                        @error('domisili')
                            <div class="invalid-feedback">
                                Domisili harus diisi!
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
