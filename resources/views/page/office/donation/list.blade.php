    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_donation">
        <!--begin::Table head-->
        <thead>
            <!--begin::Table row-->
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                {{-- <th class="w-10px pe-2">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                    </div>
                </th> --}}
                <th class="min-w-125px">Gambar</th>
                <th class="min-w-125px">Nama Program</th>
                <th class="min-w-125px">Batas Waktu</th>
                <th class="min-w-125px">Target Dana</th>
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
            @foreach ($donation as $item)
                <tr>
                    <!--begin::Role=-->
                    <td><img src="{{ asset($item->td_image) }}" alt="test" height="30px"></td>
                    <td>{{ $item->td_title }}</td>
                    {{-- Ubah jadi Total hari --}}
                    <td>{{ $item->td_duration_started }} to {{ $item->td_duration_end }}</td>
                    <td>Rp. {{ number_format($item->td_target) }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <!--begin::Action=-->
                    <td>
                        <div class="btn-group" role="group">
                            @if ($item->td_status == 'accepted')
                                <button id="aksi" type="button" class="btn btn-sm btn-success"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Diterima
                                </button>
                            @elseif ($item->td_status == 'denied')
                                <a href="javascript:;"
                                    onclick="handle_open_modal('{{ route('office.donation.edit', $item->id) }}','#ModalCreateDonation','#contentDonationModal');"
                                    class="btn btn-sm btn-danger btn-active-light-primary3">Perbaiki</a>
                            @else
                                <a href="javascript:;"
                                    class="btn btn-sm btn-warning btn-active-light-primary3">Menunggu</a>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <button id="aksi" type="button" class="btn btn-sm btn-light btn-active-light-primary">
                                <a href="javascript:;"
                                    onclick="handle_open_modal('{{ route('office.donation.edit', $item->id) }}','#ModalCreateDonation','#contentDonationModal');"
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
    {{ $donation->links() }}
