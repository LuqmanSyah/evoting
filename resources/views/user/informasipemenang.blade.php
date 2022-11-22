@extends('layouts.main')

@section('content')
    <div class="container">
      <br><br>
        <div class="row justify-content-center align-items-center text-center mb-5">
            <div class="col">
              <h3>Informasi Pemenang Dan Struktur Organisasi</h3>
            </div>
        </div>

        <div class="row mb-5">
          <div class="card p-5">
            <div class="nomer">
              <h5>1</h5>
            </div>
              @foreach ($winner as $item)
              <div class="card-body">
                <div class="row justify-content-start">
                    <div class="col-auto">
                      <img src="{{ asset('images/'. $item->candidate->img) }}" width="250px" class="rounded" alt="">
                    </div>
                    <div class="col-auto">
                      <div class="row d-block ">
                        <div class="col">
                          <h6>Ketua:</h6>
                          <h5>{{ $item->candidate->ketua }}</h5>
                        </div>
                        <div class="col">
                          <h6>Wakil:</h6>
                          <h5>{{ $item->candidate->wakil }}</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                        <h6 class="viisi-misi fw-bold">Visi</h6>
                            @foreach ($item->candidate->visi as $visis)
                                <p class="mt-3">{{$visis->visi}}</p>
                            @endforeach
                        <h6 class="viisi-misi fw-bold">Misi</h6>
                            <ol>
                                @foreach ($item->candidate->misi as $misis)
                                    <li class="mt-3">{{$misis->misi}}</li>
                                @endforeach
                            </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="suara">
                            @php
                                $suara=$count->where('candidate_id', $item->candidate->id)->count();
                            @endphp
                            <div class="d-inline-flex">
                                <h6 id="suara_{{ $item->id}}">{{ $suara }}</h6>
                                <h6 class="mx-1">Suara</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col" >
                        <h6 style="float:right">Total dari {{ $users->count() }} murid</h6>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar" id="progress_{{ $item->id}}" role="progressbar" style="width: {{ $suara/$users->count()*100 }}%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="row mt-4">
                    <img src="{{ asset('images/'. $item->img) }}" alt="">
                </div>
            </div>
              @endforeach
            </div>
          </div>
        </div>
    </div>
    @endsection
