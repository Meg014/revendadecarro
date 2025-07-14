<div class="container container-normal py-4">
    <div class="row align-items-center g-4">
        <div class="col-lg">
            <div class="container-tight">
                <div class="text-center mb-4">
                    <a href="." class="navbar-brand navbar-brand-autodark">
                        <!-- <?= $this->Html->image('logo.png', ['alt' => 'Revenda de Carro', 'style' => 'height: 32px; width: 110px']) ?> -->
                    </a>
                </div>
                <div class="card card-md">
                    <div class="card-body">
                        <h2 class="h2 text-center mb-4">Faça login na sua conta</h2>

                        <?= $this->Form->create(null, ['autocomplete' => 'off']) ?>

                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <?= $this->Form->control('email', [
                                'label' => false,
                                'class' => 'form-control',
                                'placeholder' => 'seu@email.com',
                                'autocomplete' => 'off'
                            ]) ?>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Senha</label>
                            <div class="input-group input-group-flat">
                               <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Sua senha" autocomplete="off">

                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Ver senha" onclick="togglePasswordVisibility()" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" />
                                <span class="form-check-label">Lembrar de mim neste dispositivo</span>
                            </label>
                        </div>

                        <div class="form-footer">
                            <?= $this->Form->button('Entrar', ['class' => 'btn btn-primary w-100']) ?>
                        </div>

                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg d-none d-lg-block">
            <?= $this->Html->image('bg.svg', ['alt' => 'Revenda de Carro', 'class' => 'd-block mx-auto']) ?>
        </div>
    </div>
</div>

<!-- 👁 Script para ativar/desativar visualização da senha -->
<script>
    function togglePasswordVisibility() {
        const input = document.getElementById('passwordInput');
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
    }
</script>
