<div class="row artcilelist d-flex flex-column gap-1 w-100 mt-4 ">
    @if(isset($dataartikel) && $dataartikel!=null)
    @foreach($dataartikel as $artikeldata)
    <a href="/artikelpage/{{$artikeldata['id']}}">
        <div class="col list-articel">
            <div class="card mb-3" style="max-width: 100%; background-color: #D9EAFD;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset($artikeldata['img_artikel']) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$artikeldata['title_artikel']}}</h5>
                            <p class="card-text">{!! $artikeldata->sub_heading !!}</p>
                            <div class="col-2 d-flex flex-row w-100 justify-content-between align-middle p-2">
                                <p>{{$artikeldata->Category->Category_name}}</p>
                                <p>{{$artikeldata['created_at']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
    @endif
</div>