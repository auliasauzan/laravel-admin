<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow p-3 mb-3">
        <h5 class="fw-bold mb-0">{{ $title }}</h5>
    </div>

    <div class="card shadow p-3">
        <form method="POST" action="{{ route('user.store') }}" class="form" enctype="multipart/form-data">
            @csrf

            <!-- Baris Input Grid -->
            <div class="row g-3">
                <!-- Input Nama -->
                <div class="col-md-6">
                    <label for="name" class="form-label required">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label required">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Password -->
                <div class="col-md-6">
                    <label for="password" class="form-label required">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Masukkan password" minlength="8" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Konfirmasi Password -->
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label required">Konfirmasi Password</label>
                    <!-- FIXED: Menghapus karakter '>' yang bocor di ujung tag -->
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Masukkan ulang password" minlength="8" required data-parsley-equalTo="#password">
                </div>

                <!-- Input Role -->
                <div class="col-md-6">
                    <label for="role" class="form-label required">Role</label>
                    <select class="form-select @error('role') is-invalid @enderror" name="role" required>
                        <!-- FIXED: Menghapus duplikasi tulisan Pilih Role -->
                        <option value="">Pilih Role</option>
                        <option value="Superadmin" @selected(old('role') == 'Superadmin')>
                            Superadmin
                        </option>
                        <option value="Admin" @selected(old('role') == 'Admin')>
                            Admin
                        </option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="avatar" class="form-label">Avatar (MaxSize 1Mb)</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="upload"
                        name="avatar">
                    @error('avatar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <img src="{{ asset('niceadmin/img/noprofil.png') }}" alt="Avatar" class="w-50 rounded mt-2"
                        id="preview">
                </div>
            </div>


            <div class="text-end">
                <a class="btn btn-warning" href="{{ route('user.index') }}" role="button">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    @push('modals')
    @endpush

    @push('scripts')
    @endpush

</x-app>
