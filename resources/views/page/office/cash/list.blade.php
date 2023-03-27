    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_cash">
        <!--begin::Table head-->
        <thead>
            <!--begin::Table row-->
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                {{-- <th class="w-10px pe-2">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                    </div>
                </th> --}}
                <th class="min-w-125px">Nama Sumber Donasi</th>
                <th class="min-w-125px">Tujuan Program Donasi</th>
                <th class="min-w-125px">Total Donasi</th>
                <th class="min-w-125px">Dibuat Oleh</th>
                <th class="min-w-125px">Dibuat Tanggal</th>
                <th class="min-w-125px">Status</th>
                <th class="min-w-125px">Aksi</th>
            </tr>
            <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-bold">
            <!--begin::Table row-->
            @foreach ($cash as $item)
                <tr>
                    <!--begin::Role=-->
                    <td>{{ $item->tcs_source }}</td>
                    <td>{{ $item->donation->td_title }}</td>
                    <td>Rp. {{ number_format($item->tcs_total) }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <!--begin::Action=-->
                    <td>
                        <div class="btn-group" role="group">
                            @if ($item->tcs_status == 'accepted')
                                <button id="aksi" type="button" class="btn btn-sm btn-success ">
                                    Diterima
                                </button>
                            @elseif ($item->tcs_status == 'denied')
                                <a href="javascript:;"
                                    onclick="handle_open_modal('{{ route('office.cash.edit', $item->id) }}','#ModalCreateCash','#contentCashModal');"
                                    class="btn btn-sm btn-danger ">Perbaiki</a>
                            @else
                                <button id="aksi" type="button" class="btn btn-sm btn-warning">
                                    Menunggu
                                </button>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <button id="aksi" type="button" class="btn btn-sm btn-light btn-active-light-primary">
                                <a href="javascript:;"
                                    onclick="handle_open_modal('{{ route('office.cash.edit', $item->id) }}','#ModalCreateCash','#contentCashModal');"
                                    class="menu-link px-3">Lihat</a>
                            </button>
                        </div>
                    </td>
                    <!--end::Action=-->
                </tr>
            @endforeach
            <!--end::Table row-->
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
    {{ $cash->links() }}
