<div class="modal fade" id="updateModal{{$ds->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Ubah Data Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">


        <form action="{{route('barang.update', $ds->id_barang)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label >Nama Barang</label>
                        <input type="text" name="nama_barang" value="{{ $ds->nama_barang }}" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" required placeholder="Masukkan Nama Barang">
                        @error('nama_barang')
                            <div class="invalid-feedback">
                                Nama Paket harus diisi!
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3">Rp.</span>
                        <input type="text" value="{{ $ds->harga_barang }}" onkeypress="return goodchars(event,'1234567890',this)" name="harga_barang" class="form-control @error('harga_barang') is-invalid @enderror" id="harga_barang" placeholder="Masukkan Harga">
                        </div>
                        @error('harga_barang')
                            <div class="invalid-feedback">
                                Harga harus diisi!
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jumlah Barang</label>
                        <div class="input-group">
                            <input type="text" value="{{ $ds->jumlah_barang }}" name="jumlah_barang" onkeypress="return goodchars(event,'1234567890',this)" class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah_barang" placeholder="Masukkan Jumlah Barang">
                        </div>
                        @error('jumlah_barang')
                            <div class="invalid-feedback">
                                Jumlah harus diisi!
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Supplier</p>
                        <select name="id_supplier" class="form-control @error('id_supplier') is-invalid @enderror">
                            <option>- Pilih Supplier -</option>
                            @foreach ($supplier as $supp)
                            @if ($supp->id == $ds->id_supplier)
                            @php
                                $select = 'selected';
                            @endphp
                            @else
                            @php
                                $select = '';
                            @endphp
                            @endif
                            <option {{$select}} value="{{$supp->id}}">{{$supp->nama_supplier}}</option>
                            @endforeach
                        </select>
                        @error('id_supplier')
                            <div class="invalid-feedback">
                                Supplier harus dipilih!
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Kategori Barang</p>
                        <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                            <option>- Pilih Kategori -</option>
                            @foreach ($kategori as $category)
                            @if ($category->id == $ds->id_kategori)
                            @php
                                $select = 'selected';
                            @endphp
                            @else
                            @php
                                $select = '';
                            @endphp
                            @endif
                            <option {{$select}} value="{{$category->id}}">{{$category->nama_kategori}}</option>
                            @endforeach
                        </select>
                        @error('id_supplier')
                            <div class="invalid-feedback">
                                Kategori harus dipilih!
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
