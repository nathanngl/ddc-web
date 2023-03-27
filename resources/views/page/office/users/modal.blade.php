<!--begin::Modal header-->
<div class="modal-header">
    <!--begin::Modal title-->
    <h2 class="fw-bolder">Add User</h2>
    <!--end::Modal title-->
    <!--begin::Close-->
    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
        <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                    fill="#000000">
                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                    <rect fill="#000000" opacity="0.5"
                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                        x="0" y="7" width="16" height="2" rx="1" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Close-->
</div>
<!--end::Modal header-->
<!--begin::Modal body-->
<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
    <!--begin::Form-->
    <form id="form_create_users">
        <!--begin::Scroll-->
        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="ModalCreateUsers_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#ModalCreateUsers_header" data-kt-scroll-wrappers="#ModalCreateUsers_scroll"
            data-kt-scroll-offset="300px">
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="d-block fw-bold fs-6 mb-5">Foto Profil</label>
                <!--end::Label-->
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px">
                        <img id="output"class="w-125px h-125px" src="{{ asset($user->photo) }}">
                    </div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label for="photo"
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="photo" id="photo" onchange="loadFile(event)" />

                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                <!--end::Hint-->
            </div>
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label for="nama_users" class="required fw-bold fs-6 mb-2">Nama</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" id="nama_users" name="nama"
                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nama Lengkap"
                    value="{{ $user->name }}" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label for="email_users" class="required fw-bold fs-6 mb-2">Email</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="email" id="email_users" name="email"
                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email"
                    value="{{ $user->email }}" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            @if ($user->id)
                <label for="password_users" class="required fw-bold fs-6 mb-2">Anda Tidak Dapat Mengubah
                    Password</label>
                <input type="hidden" id="password_users" name="password"
                    class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $user->password }}" />
            @else
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label for="password_users" class="required fw-bold fs-6 mb-2">Password</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="password" id="password_users" name="password"
                        class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $user->password }}" />
                    <!--end::Input-->
                </div>
            @endif
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="required fw-bold fs-6 mb-5">Role</label>
                <!--end::Label-->
                <!--begin::Roles-->
                <!--begin::Input row-->
                <div class="d-flex fv-row">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input me-3" name="role" type="radio"
                            value="Admin"{{ $user->role == 'Admin' ? 'selected' : '' }} id="role_users_1" />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <label class="form-check-label" for="role_users_1">
                            <div class="fw-bolder text-gray-800">Admin</div>
                            <div class="text-gray-600">Admin memiliki akses terhadap fitur create,read,and update</div>
                        </label>
                        <!--end::Label-->
                    </div>
                    <!--end::Radio-->
                </div>
                <!--end::Input row-->
                <div class='separator separator-dashed my-5'></div>
                <!--begin::Input row-->
                <div class="d-flex fv-row">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input me-3" name="role" type="radio"
                            value="Supervisor"{{ $user->role == 'Supervisor' ? 'selected' : '' }} id="role_users_2" />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <label class="form-check-label" for="role_users_2">
                            <div class="fw-bolder text-gray-800">Supervisor</div>
                            <div class="text-gray-600">Supervisor memiliki akses terhadap fitur review</div>
                        </label>
                        <!--end::Label-->
                    </div>
                    <!--end::Radio-->
                </div>
                <!--end::Input row-->
                <div class='separator separator-dashed my-5'></div>
                <!--begin::Input row-->
                <div class="d-flex fv-row">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input me-3" name="role" type="radio"
                            value="User"{{ $user->role == 'User' ? 'check' : '' }} id="role_users_3" />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <label class="form-check-label" for="role_users_3">
                            <div class="fw-bolder text-gray-800">User</div>
                            <div class="text-gray-600">User Tidak dapat mengakses Admin page</div>
                        </label>
                        <!--end::Label-->
                    </div>
                    <!--end::Radio-->
                </div>
                <!--end::Input row-->
                <!--end::Roles-->
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Scroll-->
        <!--begin::Actions-->
        <div class="text-center pt-15">
            @if ($user->id)
                <button id="tombol_kirim_users"
                    onclick="upload_form_modal('#tombol_kirim_users','#form_create_users','{{ route('office.users.update', $user->id) }}','#ModalCreateUsers','POST');"
                    class="btn btn-primary">
                    Submit
                </button>
            @else
                <button id="tombol_kirim_users"
                    onclick="upload_form_modal('#tombol_kirim_users','#form_create_users','{{ route('office.users.store') }}','#ModalCreateUsers','POST');"
                    class="btn btn-primary">
                    Submit
                </button>
            @endif
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Modal body-->

<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
