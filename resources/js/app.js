import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const imagenInput = document.querySelector('input[name="imagen"]');

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube tu imagen aquí",
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (imagenInput.value.trim()) {
            const imagenPublicada = {
                size: 1234,
                name: imagenInput.value.trim(),
            };

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(
                this,
                imagenPublicada,
                `/uploads/${imagenPublicada.name}`
            );

            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("success", (file, response) => {
    imagenInput.value = response.imagen;
});

dropzone.on("removedfile", () => {
    if (imagenInput) {
        imagenInput.value = "";
    }
});
