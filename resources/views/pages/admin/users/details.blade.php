



@extends('layouts.app')

@section('content')


    <div class="container-fluid py-4 ">


      <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6 class="">Kullanıcı Detay Sayfası</h6>
                  <p class="text-sm mb-0  py-3">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                    </a>

                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <form action="{{ route('admin.user.delete', ['userId' => $userId]) }}" method="POST">
                    @csrf
                    <div class="mb-4 mx-6">
                        <label for="name" class="form-label">Adınız</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$users->name ?? '' }}" readonly >
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="email" class="form-label">Email Adresi</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$users->email ?? '' }}" readonly >
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="email" class="form-label">Oluşturulma Tarihi</label>
                        <input type="email" class="form-control" id="created_at" name="created_at" value="{{formatDateDayMonthYear($users->created_at)}}" readonly >
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="phone" class="form-label">Telefon Numarası</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{$users->phone ?? ''}}" readonly required>
                    </div>


                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-danger w-25"> Kullanıcıyı Sil</button>
                    </div>










                </form>

            </div>
          </div>
        </div>

      </div>
@endsection

