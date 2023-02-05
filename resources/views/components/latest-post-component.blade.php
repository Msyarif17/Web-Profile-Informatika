@foreach($posts as $post)
                    <div class="col-12 pb-3">
                        <div class="card">
                            <img src="{{ asset('storage'.$post->thumbnail) }}"  alt="" class="card-img-top img-fluid" style="height:152px;object-fit: cover;object-position: center;">
                            <div class="card-body">
                                <div class="card-tittle fw-bold ">{{$post->title}}</div>
                                <div class="row p-0 m-0 justify-content-between py-1">
                                    <div class="col-6 p-0 m-0 text-start"><span class=""><i
                                                class="fa-solid fa-calendar"></i>{{Carbon\Carbon::parse($post->created_at)->format('l, d F Y, H:m A')}}</span></div>
                                    <div class="col-6 p-0 m-0 text-end"><span class=""><i
                                                class="fa-solid fa-comment"></i> 0 Comment</span></div>
                                </div>
                                <div class="card-text ">
                                    <p>{{Str::limit(strip_tags($post->content),100,'...')}}</p>

                                </div>
                                <div class="text-end">
                                    <a href="" class="text-decoration-none ">Baca selengkapnya <img
                                            src="{{ asset('assets/images/Vector.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endForeach