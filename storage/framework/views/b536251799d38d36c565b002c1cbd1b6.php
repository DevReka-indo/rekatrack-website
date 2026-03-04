<?php $__env->startSection('title', 'Profil Saya - RekaTrack'); ?>
<?php ($pageName = 'Profil Saya'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- Kolom Kiri: Avatar & Info Singkat -->
        <div class="col-md-4">
            <div class="card card-round">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block mb-3">
                        <img
                            id="avatar-preview"
                            src="<?php echo e(auth()->user()->avatar_url); ?>"
                            alt="Foto Profil"
                            class="rounded-circle border"
                            style="width: 120px; height: 120px; object-fit: cover;"
                        />
                        <button
                            type="button"
                            class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle"
                            style="width: 32px; height: 32px; padding: 0;"
                            data-bs-toggle="modal"
                            data-bs-target="#avatarModal"
                            title="Ubah Foto"
                        >
                            <i class="fas fa-camera fa-xs"></i>
                        </button>
                    </div>
                    <h5 class="card-title mb-1"><?php echo e(auth()->user()->name); ?></h5>
                    <p class="text-muted mb-1"><?php echo e(auth()->user()->nip); ?></p>
                    <span class="badge bg-<?php echo e(auth()->user()->role?->name == 'Super Admin'
                            ? 'danger'
                            : (auth()->user()->role?->name == 'Admin' ? 'info' : 'secondary')); ?>">
                        <?php echo e(auth()->user()->role?->name ?? 'User'); ?>

                    </span>
                </div>
            </div>

            <!-- Info Kontak -->
            <div class="card card-round mt-4">
                <div class="card-body">
                    <h6 class="card-title mb-3">Kontak</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2 text-primary"></i>
                            <small><?php echo e(auth()->user()->email); ?></small>
                        </li>
                        <?php if(auth()->user()->phone_number): ?>
                            <li>
                                <i class="fas fa-phone me-2 text-primary"></i>
                                <small><?php echo e(auth()->user()->phone_number); ?></small>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Form Edit Profil -->
        <div class="col-md-8">
            <div class="card card-round">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Edit Profil</h4>
                </div>
                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <strong>Terjadi Kesalahan:</strong>
                            <ul class="mb-0 mt-2">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('profile.update')); ?>" id="profileForm">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="fullname"
                                        value="<?php echo e(old('fullname', auth()->user()->name)); ?>"
                                        class="form-control <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Masukkan nama lengkap"
                                        required
                                    />
                                    <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">NIP <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="nip"
                                        value="<?php echo e(old('nip', auth()->user()->nip)); ?>"
                                        class="form-control <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Masukkan NIP"
                                        required
                                    />
                                    <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">E-mail <span class="text-danger">*</span></label>
                                    <input
                                        type="email"
                                        name="email"
                                        value="<?php echo e(old('email', auth()->user()->email)); ?>"
                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="contoh@email.com"
                                        required
                                    />
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="telephone"
                                        value="<?php echo e(old('telephone', auth()->user()->phone_number)); ?>"
                                        class="form-control <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="08xxxxxxxxxx"
                                        required
                                    />
                                    <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Card Keamanan -->
            <div class="card card-round mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Keamanan</h4>

                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">
                        <i class="fas fa-info-circle me-1"></i>
                        Kelola keamanan akun Anda.
                    </p>
                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                        <i class="fas fa-lock me-1"></i> Ubah Password
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upload Avatar -->
    <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="avatarModalLabel">
                        <i class="fas fa-camera me-2"></i>Ubah Foto Profil
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="avatarForm" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            <img
                                id="avatar-modal-preview"
                                src="<?php echo e(auth()->user()->avatar_url); ?>"
                                alt="Preview Avatar"
                                class="rounded-circle border"
                                style="width: 150px; height: 150px; object-fit: cover;"
                            />
                        </div>
                        <div class="mt-3">
                            <label for="avatar-input" class="form-label">Pilih Foto Baru</label>
                            <input
                                type="file"
                                name="avatar"
                                id="avatar-input"
                                class="form-control"
                                accept="image/jpeg,image/jpg,image/png"
                                required
                            />
                            <small class="text-muted d-block mt-2">
                                <i class="fas fa-info-circle me-1"></i>
                                Format: JPG, JPEG, PNG | Maksimal: 2MB
                            </small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload me-1"></i> Simpan Foto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ganti Password -->
    <!-- Modal Ganti Password -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">
                        <i class="fas fa-key me-2"></i>Ganti Password
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="passwordForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <!-- Password Lama -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password Lama</label>
                            <div class="input-group">
                                <input
                                    type="password"
                                    name="current_password"
                                    id="current_password"
                                    class="form-control"
                                    placeholder="Masukkan password lama"
                                    required
                                />
                                <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Password Baru -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <div class="input-group">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Masukkan password baru"
                                    required
                                    minlength="8"
                                />
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <small class="form-text text-muted">
                                Minimal 8 karakter
                            </small>
                        </div>

                        <!-- Konfirmasi Password Baru -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="form-control"
                                    placeholder="Ulangi password baru"
                                    required
                                />
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirmation">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-key me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Preview gambar saat dipilih di modal avatar
    document.getElementById('avatar-input').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const file = e.target.files[0];

            if (file.size > 2048000) {
                Swal.fire({
                    icon: 'error',
                    title: 'File Terlalu Besar!',
                    text: 'Ukuran file maksimal 2MB',
                });
                this.value = '';
                return;
            }

            const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if (!validTypes.includes(file.type)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format Tidak Valid!',
                    text: 'Hanya file JPG, JPEG, dan PNG yang diperbolehkan',
                });
                this.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatar-modal-preview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    // Handle upload avatar via AJAX
    document.getElementById('avatarForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const closeBtn = this.querySelector('button[data-bs-dismiss="modal"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.disabled = true;
        closeBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Mengupload...';

        fetch('<?php echo e(route("profile.avatar")); ?>', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const timestamp = new Date().getTime();
                const newAvatarUrl = data.avatar_url + '?t=' + timestamp;
                document.getElementById('avatar-preview').src = newAvatarUrl;
                document.getElementById('avatar-modal-preview').src = newAvatarUrl;

                bootstrap.Modal.getInstance(document.getElementById('avatarModal')).hide();
                document.getElementById('avatarForm').reset();

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Foto profil berhasil diperbarui',
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                throw new Error(data.message || 'Upload gagal');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: error.message || 'Terjadi kesalahan saat mengupload foto',
            });
        })
        .finally(() => {
            submitBtn.disabled = false;
            closeBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });

    // Reset preview avatar saat modal ditutup
    document.getElementById('avatarModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('avatar-modal-preview').src = '<?php echo e(auth()->user()->avatar_url); ?>';
        document.getElementById('avatarForm').reset();
    });

    // Toggle visibility password lama
    document.getElementById('toggleCurrentPassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('current_password');
        const icon = this.querySelector('i');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Toggle visibility password baru
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Toggle visibility konfirmasi password
    document.getElementById('togglePasswordConfirmation').addEventListener('click', function () {
        const passwordInput = document.getElementById('password_confirmation');
        const icon = this.querySelector('i');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Handle ganti password via AJAX
    document.getElementById('passwordForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Menyimpan...';

        fetch('<?php echo e(route("profile.update-password")); ?>', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.reset();
                bootstrap.Modal.getInstance(document.getElementById('changePasswordModal')).hide();
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.message || 'Password berhasil diperbarui',
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                throw new Error(data.message || 'Gagal mengganti password');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: error.message || 'Terjadi kesalahan saat mengganti password',
            });
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });

    document.getElementById('changePasswordModal').addEventListener('hidden.bs.modal', function () {
        const form = document.getElementById('passwordForm');
        form.reset();

        // Kembalikan semua input ke type="password"
        document.getElementById('current_password').type = 'password';
        document.getElementById('password').type = 'password';
        document.getElementById('password_confirmation').type = 'password';

        // Kembalikan ikon mata ke posisi awal
        const icons = this.querySelectorAll('.input-group .btn i');
        icons.forEach(icon => {
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/server/Reka/current-rekatrack/current/resources/views/General/profile.blade.php ENDPATH**/ ?>