@extends('layouts.dashboard')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-customer-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-12" placeholder="Search Student" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                            </div>
                            <!--end::Toolbar-->
                            @if (auth()->check() && auth()->guard('student')->check())
                            <!--begin::Add product-->
                            <a href="{{ route('students.register') }}" class="btn btn-primary">Daftar Ekstra</a>
                            <!--end::Add product-->
                        @endif
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-customer-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-customer-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">Nama Siswa</th>
                                    <th class="min-w-125px">Email</th>
                                    <th class="min-w-125px">NIS</th>
                                    <th class="min-w-125px">Kelas</th>
                                    <th class="min-w-125px">Jenis Kelamin</th>
                                    <th class="min-w-125px">Tanggal Daftar</th>
                                    <th class="text-end min-w-70px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-900">
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->nis }}</td>
                                        <td>{{ $student->classroom->name }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->created_at }}</td>
                                        <td class="text-end">
                                            @if (auth()->check() && auth()->guard('admin'))
                                                <!-- Admin can see Edit and Delete buttons -->
                                                <a href="#"
                                                    class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        {{-- <a href="{{ route('students.accept', $student->id) }}" class="menu-link px-3">Diterima</a> --}}

                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <form action="/student/delete/{{ $student->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="menu-item px-3">
                                                            <button type="submit"
                                                                class="px-3 border-0 bg-transparent btn-link text-start w-100 text-danger">Tidak diterima</button>
                                                        </div>

                                                    </form>
                                                    <!--end::Menu item-->
                                                </div>

                                                <!--end::Menu-->
                                            @elseif(auth()->check() && auth()->guard('student'))
                                                <!-- Students can only see "View" button -->
                                                <a href="/student/view/{{ $student->id }}"
                                                    class="btn btn-sm btn-light-primary">View</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
