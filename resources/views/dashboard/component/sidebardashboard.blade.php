<div class="offcanvas offcanvas-start text-light" tabindex="-1" id="sidebar" aria-labelledby="offcanvasExampleLabel"
    style="background-color: rgba(0, 0, 0, 1)">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Dashboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr>
    <div class="offcanvas-body">
        <div class="container mb-2">
            <a class="text-decoration-none text-light icon-link icon-link-hover"
                style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);" href="/dashboard"><i
                    class="bi bi-house-door-fill me-2"></i>Dashboard</a>
        </div>
        <div class="container mb-2">
            <a class="text-decoration-none text-light icon-link icon-link-hover"
                style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);" href="/profile"><i
                    class="bi bi-file-person-fill me-2"></i>Profile</a>
        </div>
        <hr>
        @can('admin')
        <h5 class="offcanvas-title mb-4" id="offcanvasExampleLabel">Administrator</h5>
        <div class="container mb-2">
            <a class="text-decoration-none text-light icon-link icon-link-hover"
                style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);"
                href="/dashboard/event"><i class="bi bi-file-earmark-fill me-2"></i>Event</a>
        </div>
        <hr>
        @endcan
        <div class="container mb-2">
            <a class="text-decoration-none text-light icon-link icon-link-hover"
                style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);" href="/logout"><i
                    class="bi bi-door-open-fill"></i>Logout</a>
        </div>
    </div>
</div>
