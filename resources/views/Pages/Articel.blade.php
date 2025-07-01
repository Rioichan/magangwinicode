@extends('Layouts.Template')
@Section('content')
    <article class="row articelpage d-flex flex-row gap-3 p-4">
        <div class="col-4 img-article w-100 d-flex align-items-center p-3">
            <img src="{{ asset($dataartikel['img_artikel']) }}" class="img-fluid rounded-start w-100 border border-info rounded-4 w-50" alt="...">
        </div>
        <div class="col-11">
            <div class="col-2 articeltime d-flex w-100 ">
                <p>{{$dataartikel['created_at']}}</p>
            </div>
            <div class="articelHeader">
                <h4>{{$dataartikel['title_artikel']}}</h4>
            </div>
            <div class="article">
                {!! $dataartikel->body_artikel !!}
            </div>
           
            <div class="container my-4">
                <h4 class="mb-3">Komentar</h4>
                <div class="mb-4">
                    @foreach($komentar as $datakomentar)
                    <div class="card mb-3">
                    <div class="card-body d-flex">
                        <div>
                        <h6 class="card-title mb-1">{{$datakomentar->user->name}} <small class="text-muted">• {{$datakomentar->tanggal_komentar}}</small></h6>
                        <p class="card-text">{{$datakomentar->isi_komentar}}</p>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
                 @if(Auth::check())
                <div class="card">
                    <div class="card-header">Tinggalkan Komentar</div>
                    <div class="card-body">
                        <form action="{{route('komentar')}}" method="POST">
                            @csrf
                            <input type="hidden" name="artikels_id" value="{{$dataartikel['id']}}">
                            <div class="mb-3">
                                <label for="isi_komentar" class="form-label">Komentar</label>
                                <textarea class="form-control" id="isi_komentar" name="isi_komentar" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </article>

@endSection