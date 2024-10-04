@extends('layouts.app')

@section('content')


    <div class="container-fluid py-4 ">


      <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6 class="">Talep Gönderme Sayfası</h6>
                  <p class="text-sm mb-0  py-3">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">Destek ekibimiz</span> talebinize hızlıca dönüş yapacaktır
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>

                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <form action="{{route('customer.request.addPost')}}"  method="POST">
                    @csrf
                    <div class="mb-4 mx-6">
                        <label for="name" class="form-label">Adınız</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$request->name}}" readonly >
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="email" class="form-label">Email Adresi</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$request->email}}" readonly >
                        <div id="emailHelp" class="form-text">Email adresinizi kimseyle paylaşmayacağız.</div>
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="phone" class="form-label">Telefon Numarası</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{$request->phone}}" readonly required>
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="requestTitle" class="form-label">Talep Başlığı</label>
                        <input type="text" class="form-control" id="requestTitle" name="requestTitle" value="{{$request->requestTitle}}" required readonly>
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="requestDescription" class="form-label">Talep Açıklaması</label>
                        <textarea class="form-control" id="requestDescription" name="requestDescription" rows="7" required readonly >{{$request->requestDescription}}</textarea>
                    </div>






                </form>

            </div>
          </div>
        </div>

      </div>
@endsection
