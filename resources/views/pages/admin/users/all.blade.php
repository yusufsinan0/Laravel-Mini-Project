@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 text-center">Kullanıcılar</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adı Soyadı</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telefon</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Oluşturulma Tarihi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Tarih</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)

                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">

                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$user->email}}</p>
                    </td>
                    <td class="text-xs font-weight-bold mb-0"> {{$user->phone}}
                    </td>
                    <td class="align-middle text-center ">{{$user->created_at}}
                    </td>
                    <td class="align-middle">

                      <a href="{{ route('admin.user.details', Crypt::encrypt($user->id)) }}" class="text-secondary font-weight-bold text-xs mx-5" data-toggle="tooltip" data-original-title="Edit user">
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
