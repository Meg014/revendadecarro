<style>
    .upload-box {
        border: 2px dashed #ccc;
        padding: 30px;
        text-align: center;
        background-color: #f9f9f9;
        cursor: pointer;
        min-height: 300px;
    }

    .upload-box.dragover {
        background-color: #e9f7ef;
        border-color: #28a745;
    }

    .upload-icon {
        width: 48px;
        height: 48px;
        stroke: #ccc;
        margin-bottom: 15px;
    }

    .file-item {
        position: relative;
        margin-bottom: 15px;
    }

    .file-icon {
        width: 32px;
    }

    .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        color: #dc3545;
        cursor: pointer;
        font-weight: bold;
        font-size: 18px;
    }

    .file-name {
        word-break: break-word;
    }

    .progress {
        height: 6px;
    }
</style>

<div class="page-wrapper">

    <br>

    <div class="alert alert-info" role="alert">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list-details">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M13 5h8" />
                    <path d="M13 9h5" />
                    <path d="M13 15h8" />
                    <path d="M13 19h5" />
                    <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                    <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                </svg>
            </div>
            <div>
                <h4 class="alert-title">Cadastro de Imagens</h4>
                <div class="text-secondary">Você pode cadastrar até 10 imagens de seus carros.</div>
            </div>
        </div>
    </div>




    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <div class="col-12">
                    <div class="card">


                        <div class="container mt-5">
                            <h3 class="mb-4 text-center">Imagem Upload</h3>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">

                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <?= $this->Form->create(null, ['type' => 'file']) ?>
                                            <div id="uploadBox" class="upload-box mb-3">
                                                <!-- SVG e Botão -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="upload-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                                    <path d="M21 15l-5-5L5 21" />
                                                </svg>
                                                <p class="mb-2"><strong>Arraste os arquivos para carregar</strong></p>
                                                <button type="button" class="btn btn-success" onclick="document.getElementById('fileInput').click()">Selecione os arquivos</button>
                                                <?= $this->Form->control('imagens[]', ['type' => 'file', 'multiple' => true, 'label' => false, 'id' => 'fileInput', 'accept' => 'image/*', 'class' => 'd-none']) ?>
                                                <p class="text-muted mt-2">Máximo de 10 imagens</p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div id="fileList" class="file-list"></div>
                                        </div>

                                        <!-- Botão centralizado abaixo dos dois blocos -->
                                        <div class="col-12 text-center">
                                            <?= $this->Form->button('Salvar imagens', ['class' => 'btn btn-primary mt-4']) ?>
                                            <?= $this->Form->end() ?>
                                        </div>

                                    </div>
                                    <br>


                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    const fileInput = document.getElementById('fileInput');
    const fileList = document.getElementById('fileList');
    const uploadBox = document.getElementById('uploadBox');
    let uploadedCount = 0;
    const maxFiles = 10;

    uploadBox.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadBox.classList.add('dragover');
    });

    uploadBox.addEventListener('dragleave', () => {
        uploadBox.classList.remove('dragover');
    });

    uploadBox.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadBox.classList.remove('dragover');
        handleFiles(e.dataTransfer.files);
    });

    fileInput.addEventListener('change', () => {
        handleFiles(fileInput.files);
    });

    function handleFiles(files) {
        const filesArray = Array.from(files);
        for (let file of filesArray) {
            if (uploadedCount >= maxFiles) {
                alert('Limite de 10 imagens atingido!');
                return;
            }
            if (!file.type.startsWith('image/')) {
                alert('Apenas imagens são permitidas.');
                continue;
            }
            createFileItem(file);
            uploadedCount++;
        }
    }

    function createFileItem(file) {
        const item = document.createElement('div');
        item.className = 'file-item border rounded p-2';

        item.innerHTML = `
      <span class="remove-btn" onclick="removeItem(this)">×</span>
      <div class="d-flex align-items-center gap-3">
        <img src="${URL.createObjectURL(file)}" class="file-icon" />
        <div class="flex-grow-1">
          <div class="d-flex justify-content-between">
            <span class="file-name">${file.name}</span>
            <span>${(file.size / 1024 / 1024).toFixed(1)} MB</span>
          </div>
          <div class="progress mt-1">
            <div class="progress-bar bg-success" role="progressbar" style="width: 0%"></div>
          </div>
        </div>
      </div>
    `;

        fileList.appendChild(item);
        simulateUpload(item.querySelector('.progress-bar'));
    }

    function simulateUpload(progressBar) {
        let progress = 0;
        const interval = setInterval(() => {
            if (progress >= 100) {
                clearInterval(interval);
            } else {
                progress += 5;
                progressBar.style.width = `${progress}%`;
            }
        }, 100);
    }

    function getIcon(type) {
        if (type.includes('png') || type.includes('jpeg') || type.includes('jpg')) return 'https://img.icons8.com/color/48/000000/image.png';
        return 'https://img.icons8.com/ios-filled/50/000000/file.png';
    }

    function removeItem(el) {
        el.closest('.file-item').remove();
        uploadedCount--;
    }
</script>