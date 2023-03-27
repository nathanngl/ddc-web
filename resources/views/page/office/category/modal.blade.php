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
    <form id="form_create_category">
        @csrf
        <!--begin::Heading-->
        <div class="mb-13 text-center">
            <!--begin::Title-->
            @if ($category->id)
                <h1 class="mb-3">Edit Category</h1>
            @else
                <h1 class="mb-3">Add Category</h1>
            @endif
            <!--end::Title-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label for="tc_title" class="required fw-bold fs-6 mb-2">Nama Kategori</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" id="tc_title" name="tc_title" class="form-control form-control-solid mb-3 mb-lg-0"
                placeholder="Masukan data" value="{{ $category->tc_title }}" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="text-center pt-15">
            @if ($category->id)
                <button id="tombol_kirim_category"
                    onclick="save_form_modal('#tombol_kirim_category','#form_create_category','{{ route('office.category.update', $category->id) }}','#ModalCreateCategory','POST');"
                    class="btn btn-primary">
                    Submit
                </button>
            @else
                <button id="tombol_kirim_category"
                    onclick="save_form_modal('#tombol_kirim_category','#form_create_category','{{ route('office.category.store') }}','#ModalCreateCategory','POST');"
                    class="btn btn-primary">
                    Submit
                </button>
            @endif
        </div>
        <!--end::Actions-->
    </form>
    <!--end:Form-->
</div>
<!--end::Modal body-->


<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
