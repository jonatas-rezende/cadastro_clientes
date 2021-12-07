<?php require_once(APPPATH.'Views/layouts/header.php'); ?>
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-4">
                        <h3 class="mb-5 text-center">Login</h3>
                        <form method="POST" action="#">
                            <div class="form-group mb-4">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                            </div>
                            <div class="form-group mb-4">
                                <label>Senha</label>
                                <input type="password" id="senha" name="senha" class="form-control form-control-lg" />
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Acessar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once(APPPATH.'Views/layouts/footer.php'); ?>