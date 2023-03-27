<x-user-layout title="Home" keywords="Del Donation Care">
    <section id="content">
        <div class="content-wrap pt-0">

            <div class="section mt-0 overflow-visible">
                <div class="container">
                    <div class="row justify-content-center center">
                        <div class="col-lg-7">
                            <div class="heading-block border-bottom-0 mb-4">
                                <h2 class="mb-3">Ingin berdonasi? Pilih donasi</h2>
                                <p class="text-muted mb-0">Silahkan pilih dan cari berbagai kategori dan nama program
                                    donasi yang anda ingin berikan sumbangan.</p>
                            </div>
                            <div class="input-group input-group-lg mb-4">
                                <input type="text" name="keywords" onkeyup="load_list(1);"
                                    class="form-control w-auto" placeholder="Cari..." />
                                <select class="form-select col col-4">
                                    <option selected value="All">Semua</option>
                                    <option value="Bencana Alam">Bencana Alam</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Kabar Duka Cita">Kabar Duka Cita</option>
                                </select>
                                <button class="btn bg-color text-white border-0" type="button"><i
                                        class="icon-search"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <!-- Item 1 -->
                    @foreach ($donation as $item)
                        @if ($item->td_status == 'accepted')
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="i-products">
                                    <div class="products-image">
                                        <a href="{{ route('single', [$item->td_title]) }}">
                                            <img src="{{ asset($item->td_image) }}" alt="Image 1">
                                            <span class="badge">{{ $item->category->tc_title }}</span>
                                        </a>
                                    </div>
                                    <div class="products-desc">
                                        <h3><a href="{{ route('single', [$item->td_title]) }}">{{ $item->td_title }}</a>
                                        </h3>
                                        <p>{{ $item->td_description }}</p>
                                        <div class="clear"></div>
                                        <ul class="skills">
                                            <li data-percent="73">
                                                <span class="d-flex justify-content-between w-100">
                                                    <span class="counter"><span data-from="0" data-to="73"
                                                            data-refresh-interval="10"
                                                            data-speed="2000"></span><strong>%</strong> Dana
                                                        Terkumpul</span>
                                                    <span class="counter"><span data-from="0" data-to="20"
                                                            data-refresh-interval="3" data-speed="1200"></span> Hari
                                                        lagi</span>
                                                </span>
                                                <div class="progress"></div>
                                            </li>
                                        </ul>
                                        <div class="products-hoverlays">
                                            <span class="products-location"><i
                                                    class="icon-map-marker1"></i>{{ $item->td_location }}</span>
                                            <ul class="list-group-flush my-3 mb-0">
                                                <li class="list-group-item"><strong>IDR 1.257.000</strong> Terkumpul
                                                </li>
                                                <li class="list-group-item"><strong>30</strong> Donatur</li>
                                                <li class="list-group-item"><strong>Kontribusi</strong> 37</li>
                                                <li class="list-group-item"><strong>20</strong> Hari lagi</li>
                                            </ul>
                                            <div class="product-user d-flex align-items-center mt-4">
                                                <img src="{{ asset($item->photo) }}" alt="">
                                                <a href="{{ route('single', [$item->td_title]) }}">{{ $item->user->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

                <ul class="pagination justify-content-center mt-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                            aria-disabled="true"> <span class="op-05" aria-hidden="true">&laquo;</span></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                aria-hidden="true">&raquo;</span></a></li>
                </ul>
            </div>

        </div>
    </section>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-user-layout>
