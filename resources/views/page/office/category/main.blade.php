<x-office-layout title="category">
    <div id="content_list">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <form id="content_filter">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="black" />
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <input type="text" name="keywords" onkeyup="load_list(1);"
                                        class="form-control form-control-solid w-250px ps-15"
                                        placeholder="Cari data..." />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::Add user-->
                                    <button type="button" class="btn btn-primary"
                                        onclick="handle_open_modal('{{ route('office.category.create') }}','#ModalCreateCategory','#contentCategoryModal');">
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <rect fill="#000000" x="4" y="11" width="16"
                                                    height="2" rx="1" />
                                                <rect fill="#000000" opacity="0.5"
                                                    transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                                                    x="4" y="11" width="16" height="2"
                                                    rx="1" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Add Category
                                    </button>
                                    <!--end::Add user-->
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none"
                                    data-kt-user-table-toolbar="selected">
                                    <div class="fw-bolder me-5">
                                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                    </div>
                                    <button type="button" class="btn btn-danger"
                                        data-kt-user-table-select="delete_selected">Delete Selected</button>
                                </div>
                                <!--end::Group actions-->
                                <!--begin::Modal - Adjust Balance-->
                                <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bolder">Export Users</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                    data-kt-users-modal-action="close">
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                                fill="#000000">
                                                                <rect fill="#000000" x="0" y="7"
                                                                    width="16" height="2" rx="1" />
                                                                <rect fill="#000000" opacity="0.5"
                                                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                                    x="0" y="7" width="16"
                                                                    height="2" rx="1" />
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
                                                <form id="kt_modal_export_users_form" class="form" action="#">
                                                    <!--begin::Input group-->

                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold form-label mb-2">Select
                                                            Export Format:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select name="format" data-control="select2"
                                                            data-placeholder="Select a format" data-hide-search="true"
                                                            class="form-select form-select-solid fw-bolder">
                                                            <option></option>
                                                            <option value="excel">Excel</option>
                                                            <option value="pdf">PDF</option>
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center">
                                                        <button type="reset" class="btn btn-light me-3"
                                                            data-kt-users-modal-action="cancel">Discard</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            data-kt-users-modal-action="submit">
                                                            <span class="indicator-label">Export</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal - New Card-->
                            </div>
                        </div>
                    </form>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <div id="list_result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content_input"></div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-office-layout>
