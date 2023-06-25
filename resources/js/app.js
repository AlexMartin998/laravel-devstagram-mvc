import Dropzone from "dropzone";

// // para q no se active basado en 1 css class, sino q le decimos manualmente
Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    // dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    maxFiles: 1,
    uploadMultiple: false,
});
