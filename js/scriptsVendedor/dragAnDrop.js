const dropArea=document.getElementById('dropArea');
const dragText=document.getElementById('dragText');
const input=document.getElementById('input-file');
const button=document.getElementById('seleccionar-pics');
let files;

button.addEventListener('click', (e) => {
    input.click();
});

input.addEventListener('change', (e)=>{
    files=input.files;    
    dropArea.classList.add("active");
    showFiles(files);
    dropArea.classList.remove("active");
});

dropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropArea.classList.add('active');
    dragText.textContent="Suelta para subir los archivos";
});
dropArea.addEventListener('dragleave', (e) => {
    e.preventDefault();
    dropArea.classList.remove('active');
    dragText.textContent="Arrastra y suelta imágenes";
});
dropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    files=e.dataTransfer.files;
    showFiles(files);
    dropArea.classList.remove('active');
    dragText.textContent="Arrastra y suelta imágenes";
});

// function previewImages() {

//     if (this.files) {
//       [].forEach.call(this.files, readAndPreview);
//     }
//     function readAndPreview(file) {
//       if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
//         return Swal.fire({
//           title: 'Archivo no válido',
//           text: `El archivo ${file.name} no es valido`,
//           icon: 'error',
//           showConfirmButton: 'true',
//         }).then((result) => {
//           if(result.isConfirmed){
//             location = '/Praedium/Praedium/php/modulos/vendedor/propiedades.php';
//           }
//         });
//       }
//     }
// }

function showFiles(files){
    if(files.length===undefined){
        processFile(files);
    }else{
        for(const file of files){ 
            processFile(file);
        }
    }
}

function processFile(file){
    const docType=file.type;
    const validExtensions=['image/jpeg', 'image/jpg', 'image/png'];

    if(validExtensions.includes(docType)){
        //archivo válido
        const fileReader=new FileReader();
        const id=`file-${Math.random().toString(32).substring(7)}`;

        fileReader.addEventListener('load', e=>{
            const fileUrl=fileReader.result;
            const image=
            `<div id="${id}" class="file-container">
                <img src="${fileUrl}" alt="${file.name}" width="50px">
                <div class="status">
                    <span>${file.name}</span>
                    <span class="status-text">
                        Seleccionando...
                    </span>
                </div>
             </div>
            `;
            const html = document.querySelector("#preview").innerHTML;
            document.querySelector("#preview").innerHTML=image+ html;
        });
        fileReader.readAsDataURL(file);
        uploadFile(file,id);
    }else{
        alert("No es un archivo válido");
    }
}

// async function uploadFile(file, id){
//     const formData=new FormData();
//     formData.append("file",file);
//     try {
//         const response= await fetch("http://localhost/Praedium/Praedium/img/casasIMG",{
//             method:"POST",
//             body: formData,
//         });
//         location = '/Praedium/Praedium/php/modulos/vendedor/propiedades.php';

//         document.querySelector(`#${id} .status-text`
//         ).innerHTML= `<span class="success">Imagen subida</span>`;
//     } catch (error) {
//         document.querySelector(`#${id} .status-text`
//         ).innerHTML= `<span class="failure">Error de subida</span>`;
//     }

// }

