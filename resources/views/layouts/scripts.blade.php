<script>
    var defaultThemeMode = "light";
    var themeMode;
    if ( document.documentElement ) { 
        if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { 
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); 
            } else {
                if ( localStorage.getItem("data-bs-theme") !== null ) {
                    themeMode = localStorage.getItem("data-bs-theme"); 
                } else { 
                    themeMode = defaultThemeMode; 
                } 
            } 
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
        } 
        document.documentElement.setAttribute("data-bs-theme", themeMode); 
    }
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--begin::Javascript-->
    <script>var hostUrl = "assets/";</script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script type="text/javascript" src="/assets/plugins/global/plugins.bundle.js"></script>
    <script type="text/javascript" src="/assets/js/scripts.bundle.js"></script>
    <script type="text/javascript" src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script type="text/javascript" src="/assets/js/widgets.bundle.js"></script>
    <script src="/assets/js/custom/apps/ecommerce/sales/listing.js"></script>
    <script type="text/javascript" src="/assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
    <script type="text/javascript" src="/assets/js/custom/widgets.js"></script>
    <script type="text/javascript" src="/assets/js/custom/apps/chat/chat.js"></script>
    <script type="text/javascript" src="/assets/js/custom/utilities/modals/users-search.js"></script>
       
    <script src="/assets/plugins/custom/summernote/summernote-lite.min.js"></script>	
