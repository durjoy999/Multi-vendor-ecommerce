<!-- JAVASCRIPT -->
<script src="{{ asset('admin_assets') }}/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="{{ asset('admin_assets') }}/libs/pace-js/pace.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
@yield('admin_js_link')
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

<script src="{{ asset('admin_assets') }}/js/sweetalert2.all.min.js"></script>
<!-- choices js -->
<script src="{{ asset('admin_assets') }}/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="{{ asset('admin_assets/js/pages/form-advanced.init.js') }}"></script>
<!-- init js -->
<script src="{{ asset('admin_assets') }}/js/app.js"></script>
<script>
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
</script>
@yield('admin_js')