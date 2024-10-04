@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 text-center">Bekleyen Talepler</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Talebi Oluşturan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telefon</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Durumu</th>

                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Tarih</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder  "></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)

                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">

                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$request->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$request->phone}}</p>
                    </td>
                    <td class="text-xs font-weight-bold mb-0">
                        {{$request->email}}
                    </td>
                    <td class="align-middle text-center ">

                        @if($request->status == "bekliyor")
                            <span class="badge badge-sm bg-gradient-primary">Bekliyor</span>

                        @endif

                    </td>

                    <td class="align-middle">

                        <a href="{{route('customer.request.details', ['id'=>$request->id])}}"  class="text-secondary font-weight-bold text-xs mx-5" data-toggle="tooltip" data-original-title="Edit user">
                            Detay
                      </a>
                    </td>
                  </tr>

                  @endforeach



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
