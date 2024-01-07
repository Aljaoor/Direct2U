

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Logout</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="{{asset('admin_panel')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('admin_panel')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('admin_panel')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('admin_panel')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{asset('admin_panel')}}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('admin_panel')}}/js/demo/chart-area-demo.js"></script>
<script src="{{asset('admin_panel')}}/js/demo/chart-pie-demo.js"></script>

<!-- Select2 JS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDdW91znTQMTPpV-LbT50zTUWwTOjX7VHg",
        authDomain: "direct2u-d3914.firebaseapp.com",
        projectId: "direct2u-d3914",
        storageBucket: "direct2u-d3914.appspot.com",
        messagingSenderId: "804115700875",
        appId: "1:804115700875:web:94b26c45e122f7ef4a488e"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();

</script>
@stack('js')
