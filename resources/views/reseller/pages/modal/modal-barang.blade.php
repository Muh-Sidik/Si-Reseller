<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModal">Tambah Data Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">


            <form action="{{route('reseller.order')}}" method="POST">
                @csrf
                <input type="hidden" name="id_reseller" value="{{ $reseller->id }}">
                <div class="form-group">
                    <label for="id_barang">Nama Barang</label>
                    <select id="id_barang" name="id_barang" class="form-control @error('id_barang') is-invalid @enderror">
                        <option selected>-- Pilih Barang --</option>
                        @foreach ($barang as $item)
                            <option value="{{$item->id}}">{{ $item->nama_barang }}, harga: Rp. {{number_format($item->harga_jual,0,',','.')}}</option>
                        @endforeach
                    </select>
                    @error('id_barang')
                        <div class="invalid-feedback">
                            Barang harus dipilih!
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jumlah Order</label>
                    <input type="number" name="total_order" onkeypress="return goodchars(event,'1234567890',this)" class="form-control @error('total_order') is-invalid @enderror" id="total_order" required placeholder="Masukkan Jumlah Barang">
                    @error('total_order')
                        <div class="invalid-feedback">
                            Jumlah Order harus diisi!
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="number" name="harga" onkeypress="return goodchars(event,'1234567890',this)" class="form-control @error('harga_jual') is-invalid @enderror" id="harga" required placeholder="Tentukan Harga Jual Barang">
                    @error('harga_jual')
                        <div class="invalid-feedback">
                            Harga Jual harus diisi!
                        </div>
                    @enderror
                </div>
                @include('reseller.pages.accept.modal-barang')
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#acceptModal">Simpan</button>
        </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
        </div>
    </div>
</div>
