@extends('layouts.auth')

@section('body')
<div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
	<!--begin::Wrapper-->
	<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
		<!--begin::Form-->
		<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="/admin/sign-up">
			@csrf
			<!--begin::Heading-->
			<div class="text-center mb-11">
				<!--begin::Title-->
				<h1 class="text-gray-900 fw-bolder mb-3">Sign Up Admin</h1>
				<!--end::Title-->
			</div>
			<!--begin::Heading-->
			<!--begin::Input group=-->
			<div class="fv-row mb-8">
				<!--begin::Email-->
				<input type="text" placeholder="Name" name="name" autocomplete="off" class="form-control bg-transparent" />
				<!--end::Email-->
			</div>
			<div class="fv-row mb-8">
				<!--begin::Email-->
				<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
				<!--end::Email-->
			</div>
			<div class="fv-row mb-8">
				<!--begin::Email-->
				<input type="text" placeholder="Nip" name="nip" autocomplete="off" class="form-control bg-transparent" />
				<!--end::Email-->
			</div>
			<!--end::Input group=-->
			<div class="fv-row mb-3">
				<!--begin::Password-->
				<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
				<!--end::Password-->
			</div>
			<!--end::Input group=-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
				<div></div>
				<!--begin::Link-->
				<a href="authentication/layouts/overlay/reset-password.html" class="link-primary">Forgot Password ?</a>
				<!--end::Link-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Submit button-->
			<div class="d-grid mb-10">
				<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
					<!--begin::Indicator label-->
					<span class="indicator-label">Sign Up</span>
					<!--end::Indicator label-->
					<!--begin::Indicator progress-->
					<span class="indicator-progress">Please wait... 
					<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
					<!--end::Indicator progress-->
				</button>
			</div>
			<!--end::Submit button-->
			<!--begin::Sign up-->
			<div class="text-gray-500 text-center fw-semibold fs-6">Sudah punya akun?
			<a href="{{ route ('login') }}" class="link-primary">Login</a></div>
			<!--end::Sign up-->
		</form>
		<!--end::Form-->
	</div>
	<!--end::Wrapper-->
	
</div>
@endsection