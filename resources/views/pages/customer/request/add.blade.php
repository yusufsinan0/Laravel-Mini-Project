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
                <div id="errorMessages"></div> <!-- Hata mesajları burada gösterilecek -->

                <form id="requestForm" action="{{route('customer.request.addPost')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 mx-6">
                        <label for="name" class="form-label">Adınız</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$name}}" readonly >
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="email" class="form-label">Email Adresi</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$email}}" readonly >
                        <div id="emailHelp" class="form-text">Email adresinizi kimseyle paylaşmayacağız.</div>
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="phone" class="form-label">Telefon Numarası</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{$phone}}" readonly required>
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="requestTitle" class="form-label">Talep Başlığı</label>
                        <input type="text" class="form-control" id="requestTitle" name="requestTitle" required >
                    </div>

                    <div class="mb-4 mx-6">
                        <label for="requestDescription" class="form-label">Talep Açıklaması</label>
                        <textarea class="form-control" id="requestDescription" name="requestDescription" rows="7"  ></textarea>


                    </div>

                    <div class="mb-4 mx-6">
                        <label for="fileUpload" class="form-label">Ek Dosyası (Mevcutsa)</label>
                        <input type="file" class="form-control" id="fileUpload" name="fileUpload" required>
                    </div>



                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-primary w-25"> Talebi Gönder</button>
                    </div>
                </form>

            </div>
          </div>
        </div>

      </div>
@endsection

@push('scripts')

<script>

document.getElementById('requestForm').addEventListener('submit',function(event){
    let isValid = true;
    let errorMessages = '';

    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const requestTitle = document.getElementById('requestTitle');
    const requestDescription = document.getElementById('requestDescription');

    if(!name.value.trim()){
        errorMessages+= '<div class="alert alert-danger" role="alert"> Adınızı girmeniz zorunludur </div>';
        isValid = false;
    }

    if(!email.value.trim()){
        errorMessages+= '<div class="alert alert-danger" role="alert">Email girmeniz zorunludur</div>'
        isValid = false;
    }

    if(!phone.value.trim()){
        errorMessages+= '<div class = "alert alert-danger" role = "alert">Telefon girmeniz zorunludur</div>'
        isValid = false;
    }

    if(!requestTitle.value.trim()){
        errorMessages+= '<div class = "alert alert-danger" role="alert"> Talep başlığı girmeniz zorunludur</div>'
        isValid = false;
    }

    if(!requestDescription.value.trim()){
        errorMessages+= '<div class = "alert alert-danger" role="alert"> Açıklama girmeniz zorunludur</div>'
        isValid = false;
    }

    if(!isValid){
        event.preventDefault();
        document.getElementById('errorMessages').innerHTML = errorMessages;
    }
})


</script>

@endpush

