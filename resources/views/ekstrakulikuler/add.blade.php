@extends('layouts.dashboard')

@section('content')
    	<!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <!--begin::Form-->
                    <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="" action="{{ route('add.ekstra') }}" method="POST">
                        @csrf
                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
         
                           
                        
                        </div>
                        <!--end::Aside column-->
                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin:::Tabs-->
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">Tambah Ekstrakulikuler</a>
                                </li>
                                <!--end:::Tab item-->
                         
                            </ul>
                            <!--end:::Tabs-->
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::General options-->
                                        <div class="card card-flush py-2">
                                    
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0 mb-2">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Nama Ektrakulikuler</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="name" class="form-control mb-2" placeholder="Masukan nama Ekstrakulikuler" value="" />
                                                    <!--end::Input-->
                                                <!--begin::Input group-->
                                            
                                                    
                                                <select name="admin_id" class="form-select form-select-lg mt-8" aria-label="Large select example">
                                                    <option selected disabled>Nama Pembina</option>
                                                    @foreach ($pembinas as $pembina)
                                                    <option value="{{ $pembina->id }}">{{ $pembina->name }}</option>
                                                @endforeach
                                                  </select>
                                              
                                                </div>
                                           
                                                <!--end::Input group-->
                                            
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::General options-->
                                       
                                    </div>
                                </div>
                                <!--end::Tab pane-->
                       
                            </div>
                            <!--end::Tab content-->
                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <a href="/dashboard" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--end::Main column-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
        <!--end::Content-->
@endsection