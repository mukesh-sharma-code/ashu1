
<style>
.disabledbutton {
    pointer-events: none;
    opacity: 0.4;
}
</style>
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row p-0 m-0 " style="padding:0 !important;margin:0 !important">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="/">
                <!-- <img src="/assets/template/images/logo.svg" alt="logo" /> --><b>HOME</b>
            </a>
            <a class="navbar-brand brand-logo-mini" href="/">
                <!-- <img src="/assets/template/images/logo-mini.svg" alt="logo" /> --><b>HOME</b>
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">Client</span></h1>
                <h3 class="welcome-sub-text">Your performance summary this week </h3>
            </li>
        </ul>
        
        <ul class="navbar-nav ms-auto" id="indexPageDateRangeDivUl">
            <li class="nav-item d-none d-lg-block">
                <!-- <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                    <span class="input-group-addon input-group-prepend border-right">
                        <span class="icon-calendar input-group-text calendar-icon"></span>
                    </span>
                    <input type="text" id="indexPageDateRange" class="form-control">
                </div> -->
                
                    <div id="indexPageDateRangeDiv" class=" date datepicker d-flex">
                        <!-- <span class="input-group-addon input-group-prepend border-right" > -->
                            <span class="icon-calendar input-group-text calendar-icon" style="border-right:none !important;border-radius:4px;background:white;border-top-right-radius:0 ! important;border-bottom-right-radius:0 ! important;border-color: #e9e9ed;"></span>
                        <!-- </span> -->
                        <input id="indexPageDateRange" type="text" class="form-control" style="min-width: 187px;border-left:none !important;border-top-left-radius:0;border-bottom-left-radius:0; border-color: #e9e9ed;padding-left:0" >
                    </div>
                    
                    
                    
                
            </li>
            <li class="nav-item d-none d-lg-block">
            <button type="button" name="refresh" id="refresh" class="cusBtn">Refresh</button>
            </li>
            
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
<script>
    
</script>
