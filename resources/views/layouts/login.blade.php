<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>AP2TKI</title>
    <!-- Bootstrap Core CSS -->
    <link href="/dashboard/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/dashboard/assets/plugins/dropify/dist/css/dropify.min.css">
    <link href="/dashboard/css/style.css" rel="stylesheet">
    <link href="/dashboard/css/colors/blue.css" id="theme" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    @yield('content')
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/dashboard/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/dashboard/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/dashboard/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/dashboard/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/dashboard/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/dashboard/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/dashboard/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/dashboard/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Plugins for this page -->
    <!-- ============================================================== -->
    <!-- jQuery file upload -->
    <script src="/dashboard/assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>

      $(document).ready(function() {
          // Basic
          $('.dropify').dropify();

          // Translated
          $('.dropify-fr').dropify({
              messages: {
                  default: 'Glissez-déposez un fichier ici ou cliquez',
                  replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                  remove: 'Supprimer',
                  error: 'Désolé, le fichier trop volumineux'
              }
          });

          // Used events
          var drEvent = $('#input-file-events').dropify();

          drEvent.on('dropify.beforeClear', function(event, element) {
              return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
          });

          drEvent.on('dropify.afterClear', function(event, element) {
              alert('File deleted');
          });

          drEvent.on('dropify.errors', function(event, element) {
              console.log('Has Errors');
          });

          var drDestroy = $('#input-file-to-destroy').dropify();
          drDestroy = drDestroy.data('dropify')
          $('#toggleDropify').on('click', function(e) {
              e.preventDefault();
              if (drDestroy.isDropified()) {
                  drDestroy.destroy();
              } else {
                  drDestroy.init();
              }
          })
      });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="/dashboard/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

</body>

</html>
