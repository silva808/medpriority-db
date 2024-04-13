// -----------------------------------ACCORDION MENU-----------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    setupAccordion("mainDiv1");
    setupAccordion("mainDiv2");
});
  function setupAccordion(mainDivSelector) {
    const mainDiv = document.getElementById(mainDivSelector);
    const divs = mainDiv.querySelectorAll(".manage");
  
    divs[0].classList.add("active");
  
    divs[0].addEventListener("click", function () {
      for (let i = 1; i < divs.length; i++) {
        toggleAccordion(divs[i]);
      }
    });
  
    function toggleAccordion(div) {
      div.classList.toggle("active");
    }
  }

  // --------------------------------------- MODAL ------------------------------

  const openModalButton  = document.querySelectorAll('[data-modal-target]')
  const closeModalButton  = document.querySelectorAll('[data-close-button]')
  const overlay = document.getElementById('overlay')

  openModalButton.forEach(button => {
    button.addEventListener('click', () => {
      const modal = document.querySelector(button.dataset.modalTarget)
      openModal(modal)
    })
  })

  // overlay.addEventListener('click', () => {
  //   const modals = document.querySelectorAll('.modal.active')
  //   modals.forEach(modal => {
  //     closeModal(modal)
  //   })
  // })

  // ↑↑↑↑↑↑↑↑↑↑
  // when click on overlay (background) it closes the modal

  closeModalButton.forEach(button => {
    button.addEventListener('click', () => {
      const modal = button.closest('.modal')
      closeModal(modal)
    })
  })

  function openModal(modal) {
    // if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
  }

  function closeModal(modal) {
    // if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
  }

  // -------------------------test button---------------------

  const valorant = document.getElementById("sage");

  valorant.addEventListener("click", function(){
    console.log("sage la mejor");
  })

  // ---------------------------UPDATE MODAL BUTTON-----------------------------

  //valores default (datos en db)
  var initialValues = {
    tipo_documento: "<?php echo htmlspecialchars($ff['tipo_documento'])?>",
    numero_documento: "<?php echo htmlspecialchars($ff['id_usuario'])?>",
    nombre: "<?php echo htmlspecialchars($ff['nombre'])?>",
    edad: "<?php echo htmlspecialchars($ff['edad'])?>",
    sexo: "<?php echo htmlspecialchars($ff['genero'])?>",
    direccion: "<?php echo htmlspecialchars($ff['direccion'])?>",
    telefono: "<?php echo htmlspecialchars($ff['telefono'])?>",
    correo_electronico: "<?php echo htmlspecialchars($ff['correo'])?>",
    tipo_afiliacion: "<?php echo htmlspecialchars($ff['tipo_afiliacion'])?>"
  };

  // inputs
  var tipoDocumentoInput = document.getElementById('id_type');
  var numeroDocumentoInput = document.getElementById('id');
  var nombreInput = document.getElementById('name');
  var edadInput = document.getElementById('age');
  var sexoInput = document.getElementById('sexmoneyfeelingsdie');
  var direccionInput = document.getElementById('address');
  var telefonoInput = document.getElementById('pickupyophonebaby');
  var correoElectronicoInput = document.getElementById('email');
  var tipoAfiliacionInput = document.getElementById('afi');

  // si detecta activa el enable
  tipoDocumentoInput.addEventListener('input', enableSaveButton);
  numeroDocumentoInput.addEventListener('input', enableSaveButton);
  nombreInput.addEventListener('input', enableSaveButton);
  edadInput.addEventListener('input', enableSaveButton);
  sexoInput.addEventListener('input', enableSaveButton);
  direccionInput.addEventListener('input', enableSaveButton);
  telefonoInput.addEventListener('input', enableSaveButton);
  correoElectronicoInput.addEventListener('input', enableSaveButton);
  tipoAfiliacionInput.addEventListener('input', enableSaveButton);

  //enable button
  function enableSaveButton() {
    var saveButton = document.getElementById('sage');
    saveButton.disabled = (
        tipoDocumentoInput.value === initialValues.tipo_documento &&
        numeroDocumentoInput.value === initialValues.numero_documento &&
        nombreInput.value === initialValues.nombre &&
        edadInput.value === initialValues.edad &&
        sexoInput.value === initialValues.sexo &&
        direccionInput.value === initialValues.direccion &&
        telefonoInput.value === initialValues.telefono &&
        correoElectronicoInput.value === initialValues.correo_electronico &&
        tipoAfiliacionInput.value === initialValues.tipo_afiliacion
    );
  }
