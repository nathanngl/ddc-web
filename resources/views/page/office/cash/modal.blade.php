<!--begin::Modal header-->
<div class="modal-header pb-0 border-0 justify-content-end">
    <!--begin::Close-->
    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
        <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                    fill="#000000">78
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
<!--begin::Modal header-->
<!--begin::Modal body-->
<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
    <!--begin:Form-->
    <form id="form_create_cash">
        @csrf
        <!--begin::Heading-->
        <div class="mb-13 text-center">
            <!--begin::Title-->
            @if (Auth::user()->role == 'supervisor')
                <h1 class="mb-3">Tinjau Donasi Tunai</h1>
            @else
                <h1 class="mb-3">Kelola Donasi Tunai</h1>
            @endif
            <!--end::Title-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="nama_users" class="required fw-bold fs-6 mb-2">Nama Sumber donasi</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" id="nama_users" name="tcs_source" class="form-control form-control-solid mb-3 mb-lg-0"
                placeholder="Masukan Nama Sumber donasi" value="{{ $cash->tcs_source }}" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="nama_users" class="required fw-bold fs-6 mb-2">Pilih Tujuan Donasi</label>
            <!--end::Label-->
            <!--begin::Input-->
            <select class="form-control selectpicker" name="id_donation" required>
                <option selected disabled>Pilih Tujuan</option>
                @foreach ($donation as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $cash->id_donation ? 'selected' : '' }}>
                        {{ $item->td_title }}</option>
                @endforeach
            </select>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="nama_users" class="required fw-bold fs-6 mb-2">Total Donasi (Rp)</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="tel" id="tcs_total" name="tcs_total" class="form-control form-control-solid mb-3 mb-lg-0"
                placeholder="Masukan Total Donasi" value="{{ $cash->tcs_total }}" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        @if (Auth::user()->role == 'admin')
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label for="nama_users" class="required fw-bold fs-6 mb-2">Komentar Supervisor</label>
                <!--end::Label-->
                <!--begin::Input-->
                @if (empty($cash->comment))
                    <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="comment" id="" cols="10"
                        rows="3">Belum ada komentar</textarea>
                @else
                    <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="comment" id="" cols="10"
                        rows="3">{{ $cash->comment }}</textarea>
                @endif
                <!--end::Input-->
            </div>
        @endif
        <!--end::Input group-->
        <!--begin::Actions-->
        @if (Auth::user()->role == 'supervisor')
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label for="nama_users" class="fw-bold fs-6 mb-2">Berikan Komentar: </label>
                <!--end::Label-->
                <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="comment" id="" cols="10"
                    rows="3"></textarea>
            </div>
            <!--end::Input group-->

            <div class="text-center pt-15">
                <button id="tombol_kirim_cash"
                    onclick="save_form_modal('#tombol_kirim_cash','#form_create_cash','{{ route('office.cash.accept', $cash->id) }}','#ModalCreateCash','POST');"
                    class="btn btn-success mx-5">
                    Setuju
                </button>
                <button id="tombol_kirim_cash"
                    onclick="save_form_modal('#tombol_kirim_cash','#form_create_cash','{{ route('office.cash.deny', $cash->id) }}','#ModalCreateCash','POST');"
                    class="btn btn-danger mx-5">
                    Tolak
                </button>
            </div>
        @else
            <div class="text-center pt-15">
                @if ($cash->id)
                    <button id="tombol_kirim_cash"
                        onclick="save_form_modal('#tombol_kirim_cash','#form_create_cash','{{ route('office.cash.update', $cash->id) }}','#ModalCreateCash','POST');"
                        class="btn btn-primary">
                        Submit
                    </button>
                @else
                    <button id="tombol_kirim_cash"
                        onclick="save_form_modal('#tombol_kirim_cash','#form_create_cash','{{ route('office.cash.store') }}','#ModalCreateCash','POST');"
                        class="btn btn-primary">
                        Submit
                    </button>
                @endif
            </div>
        @endif
        <!--end::Actions-->
    </form>
    <!--end:Form-->
</div>
<!--end::Modal body-->


<script>
    ribuan('tcs_total');
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
