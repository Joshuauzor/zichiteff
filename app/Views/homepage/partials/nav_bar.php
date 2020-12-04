<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a href="<?= base_url() ?>" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="<?= base_url('home/about') ?>" class="nav-link">About</a></li>
                <li class="nav-item"><a href="<?= base_url('home/services') ?>" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="<?= base_url('home/projects') ?>" class="nav-link">Projects</a></li>
                <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
                <li class="nav-item"><a href="<?= base_url('home/contact') ?>" class="nav-link">Contact</a></li>
            </ul>
            <a href="#" class="btn-custom" data-toggle="modal" data-target="#requestAservice">Request A Service</a>
        </div>
    </div>
</nav>
<!-- END nav -->