<div class="modal fade" id="updateModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Ubah Data Reseller</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">


        <form action="{{route('user.edit', $user->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label >Username</label>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control @error('username') is-invalid @enderror" id="username" required placeholder="Masukkan Username">
                        @error('username')
                            <div class="invalid-feedback">
                                Username harus diisi!
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input type="password" value="{{ decrypt($user->password) }}" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required placeholder="Masukkan Password">
                        @error('password')
                            <div class="invalid-feedback">
                                Nomor Whatsapp harus diisi!
                            </div>
                        @enderror


        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
        </div>
    </div>
</div>
