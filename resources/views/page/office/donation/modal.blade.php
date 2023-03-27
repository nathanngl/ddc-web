<!--begin::Modal header-->
<div class="modal-header pb-0 border-0 justify-content-end">
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
<!--begin::Modal header-->
<!--begin::Modal body-->
<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
    <!--begin:Form-->
    <form id="form_create_donation" enctype="multipart/form-data">
        @csrf
        <!--begin::Heading-->
        <div class="mb-13 text-center">
            <!--begin::Title-->
            @if (Auth::user()->role == 'supervisor')
                <h1 class="mb-3">Tinjau Program Donasi</h1>
            @else
                <h1 class="mb-3">Kelola Program Donasi</h1>
            @endif
            <!--end::Title-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="nama_users" class="required fw-bold fs-6 mb-2">Pilih Kategori Donasi</label>
            <!--end::Label-->
            <!--begin::Input-->
            <select class="form-control selectpicker " name="id_category" required>
                <option selected disabled>Pilih Kategori</option>
                @foreach ($category as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $donation->id_category ? 'selected' : '' }}>
                        {{ $item->tc_title }}</option>
                @endforeach
            </select>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="td_receiver" class="required fw-bold fs-6 mb-2">Nama Penerima</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" id="td_receiver" name="td_receiver"
                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Masukan Nama Penerima"
                value="{{ $donation->td_receiver }}" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="td_receiver" class="required fw-bold fs-6 mb-2">Lokasi Penerima</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" id="td_receiver" name="td_location"
                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Masukan Lokasi Penerima"
                value="{{ $donation->td_location }}" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="nama_users" class="required fw-bold fs-6 mb-2">Judul Program</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" id="nama_users" name="td_title" class="form-control form-control-solid mb-3 mb-lg-0"
                placeholder="Masukan judul program" value="{{ $donation->td_title }}" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="td_target" class="required fw-bold fs-6 mb-2">Target Dana (Rp)</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="tel" id="td_target" name="td_target" class="form-control form-control-solid mb-3 mb-lg-0"
                placeholder="Masukan target nominal" value="{{ $donation->td_target }}" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="td_duration" class="required fw-bold fs-6 mb-2">Batas Waktu</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input id="kt_daterangepicker_2" name="td_duration" class="form-control form-control-solid"
                placeholder="Masukan batas waktu"
                value="{{ $donation->td_duration_started }} to {{ $donation->td_duration_end }}" />

            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <label for="nama_users" class="required fw-bold fs-6 mb-2">Gambar</label>
            <br>

            <!--begin::Label-->
            <img src="{{ asset($donation->td_image) }}" alt="test" height="230px">
            <!--end::Label-->
            <!--begin::Input-->
            <input type="file" class="form-control" name="td_image" placeholder="Upload gambar"
                aria-label="First name" class="form-control form-control-solid mb-3 mb-lg-0">

            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="td_description" class="required fw-bold fs-6 mb-2">Deskripsi</label>
            <!--d::Label-->
            <!--begin::Input-->
            <textarea name="td_description" id="td_description" cols="30" rows="5"
                class="form-control form-control-solid mb-3 mb-lg-0">{{ $donation->td_description }}</textarea>
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
                @if (empty($donation->comment))
                    <textarea class="form-control form-control-solid mb-3 mb-lg-0" id="" cols="10" rows="3">Belum ada komentar</textarea>
                @else
                    <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="comment" id="" cols="10"
                        rows="3">{{ $donation->comment }}</textarea>
                @endif
                <!--end::Input-->
            </div>
        @endif
        <!--end::Input group-->
        @if (Auth::user()->role == 'supervisor')
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label for="nama_users" class="fw-bold fs-6 mb-2">Berikan Komentar (Alasan Setuju/Tolak): </label>
                <!--end::Label-->
                <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="comment" id="" cols="10"
                    rows="3"></textarea>
            </div>
            <!--end::Input group-->

            <div class="text-center pt-15">
                <button id="tombol_kirim_donation"
                    onclick="save_form_modal('#tombol_kirim_donation','#form_create_donation','{{ route('office.donation.accept', $donation->id) }}','#ModalCreateDonation','POST');"
                    class="btn btn-success mx-5">
                    Setuju
                </button>
                <button id="tombol_kirim_donation"
                    onclick="save_form_modal('#tombol_kirim_donation','#form_create_donation','{{ route('office.donation.deny', $donation->id) }}','#ModalCreateDonation','POST');"
                    class="btn btn-danger mx-5">
                    Tolak
                </button>
            </div>
        @else
            <!--begin::Actions-->
            <div class="text-center pt-15">
                @if ($donation->id)
                    <button id="tombol_kirim_donation"
                        onclick="upload_form_modal('#tombol_kirim_donation','#form_create_donation','{{ route('office.donation.update', $donation->id) }}','#ModalCreatedonation','POST');"
                        class="btn btn-primary">
                        Submit
                    </button>
                @else
                    <button id="tombol_kirim_donation"
                        onclick="upload_form_modal('#tombol_kirim_donation','#form_create_donation','{{ route('office.donation.store') }}','#ModalCreatedonation','POST');"
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
    ribuan('td_target');
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    $("#kt_daterangepicker_2").flatpickr({
        mode: "range",
        minDate: "today",
        dateFormat: "Y-m-d",
    });

    // $("kt_daterangepicker_2").daterangepicker({
    //     timePicker: true,
    //     startDate: moment().startOf("hour"),
    //     endDate: moment().startOf("hour").add(32, "hour"),
    //     locale: {
    //         format: "M/DD hh:mm A"
    //     }
    // });
</script>
