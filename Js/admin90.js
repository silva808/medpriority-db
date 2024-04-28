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
      console.log("menu");
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
      console.log("uwuwuwu");
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

//   // const valorant = document.getElementById("sage");
//   const valorant = document.querySelectorAll('[id^="sage"]');

//   // valorant.addEventListener("click", function(){
//   //   console.log("sage la mejor");
//   // })

//   valorant.forEach(button => {
//     button.addEventListener("click", function(){
//         console.log("sage la mejor");
//     });
// });

// -----------------------UPDATE USERS WHEN CLICK ON BUTTON-------------------------

// Iterate over all buttons with id starting with "sage"

const valorant = document.querySelectorAll('[id^="sage"]');
  // ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑

// Attach click event listener to each button
valorant.forEach(button => {
    button.addEventListener("click", function(){
        // Get the modal id associated with this button
        console.log("sage");
        const modalId = this.getAttribute('data-modal-id');
        
        // Find all input fields within the modal
        const modal = document.getElementById(modalId);
        const inputs = modal.querySelectorAll('input');

        // Prepare data object to send via AJAX
        const data = {};
        inputs.forEach(input => {
            data[input.name] = input.value;
        });

        // Send AJAX request to update user data
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "test.php", true);
        console.log(data);
        alert('Data Updated');
        xhr.send(JSON.stringify(data));
    });
});

// -------------------------------------------

  const guardarButton = document.getElementById("guardar-button");
  
  guardarButton.addEventListener("click", function() {
      // Gather data from input fields
      console.log("hlaaa");
      const idNumber = document.querySelector('input[name="doc_id-number"]').value;
      const name = document.querySelector('input[name="doc_name"]').value;
      const age = document.querySelector('input[name="doc_age"]').value;
      const phoneNumber = document.querySelector('input[name="doc_phone-number"]').value;
      const email = document.querySelector('input[name="doc_email"]').value;
      const sex = document.querySelector('input[name="doc_sex"]').value;
      // You can add more fields as needed
      
      // Prepare data object to send via AJAX
      const datos = {
          idNumber: idNumber,
          name: name,
          age: age,
          phoneNumber: phoneNumber,
          email: email,
          sex: sex
          // Add more fields if needed
      };
      
      // Send AJAX request to save data
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "new.php", true);
      xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
              // Handle response from server
              console.log(xhr.responseText);
              console.log(datos);
              // Optionally, display a success message or update UI
          }
      };
      xhr.send(JSON.stringify(datos));
  });


  // ------------------------------------------PACIENTES---------

  const valo = document.getElementById("paciente-nuevo");
  
  valo.addEventListener("click", function() {
      // Gather data from input fields
      console.log("bru");
      const pat_docType = document.querySelector('select[name="pat-id-type"]').value;
      const pat_idNumber = document.querySelector('input[name="pat_id-number"]').value;
      const pat_name = document.querySelector('input[name="pat_name"]').value;
      const pat_age = document.querySelector('input[name="pat_age"]').value;
      const pat_phoneNumber = document.querySelector('input[name="pat_phone-number"]').value;
      const pat_email = document.querySelector('input[name="pat_email"]').value;
      const pat_sex = document.querySelector('input[name="pat_sex"]').value;
      const pat_afiliation = document.querySelector('select[name="pat-afi"]').value;
      // You can add more fields as needed
      
      // Prepare data object to send via AJAX
      const daticos = {
          pat_idNumber: pat_idNumber,
          pat_name: pat_name,
          pat_age: pat_age,
          pat_phoneNumber: pat_phoneNumber,
          pat_email: pat_email,
          pat_sex: pat_sex,
          pat_docType: pat_docType,
          pat_afiliation: pat_afiliation
          // Add more fields if needed
      };
      
      // Send AJAX request to save data
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "new_patient.php", true);
      xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
              // Handle response from server
              console.log(xhr.responseText);
              console.log(daticos);
              // Optionally, display a success message or update UI
          }
      };
      xhr.send(JSON.stringify(daticos));
  });








  // ---------------------------UPDATE MODAL APPLY BUTTON-----------------------------
  // -----------------------------NOT WORKING YET-------------------------------------

  // // valores default (datos en db)
  // var initialValues = {
  //   tipo_documento: "<?php echo htmlspecialchars($ff['tipo_documento'])?>",
  //   numero_documento: "<?php echo htmlspecialchars($ff['id_usuario'])?>",
  //   nombre: "<?php echo htmlspecialchars($ff['nombre'])?>",
  //   edad: "<?php echo htmlspecialchars($ff['edad'])?>",
  //   sexo: "<?php echo htmlspecialchars($ff['genero'])?>",
  //   direccion: "<?php echo htmlspecialchars($ff['direccion'])?>",
  //   telefono: "<?php echo htmlspecialchars($ff['telefono'])?>",
  //   correo_electronico: "<?php echo htmlspecialchars($ff['correo'])?>",
  //   tipo_afiliacion: "<?php echo htmlspecialchars($ff['tipo_afiliacion'])?>"
  // };

  // // inputs
  // var tipoDocumentoInput = document.getElementById('id_type_modal_1');
  // var numeroDocumentoInput = document.getElementById('[id^="id_"]');
  // var nombreInput = document.getElementById('[id^="name_"]');
  // var edadInput = document.getElementById('[id^="age_"]');
  // var sexoInput = document.getElementById('[id^="sexmoneyfeelingsdie_"]');
  // var direccionInput = document.getElementById('[id^="address_"]');
  // var telefonoInput = document.getElementById('[id^="pickupyophonebaby_"]');
  // var correoElectronicoInput = document.getElementById('[id^="email_"]');
  // var tipoAfiliacionInput = document.getElementById('[id^="afi_"]');

  // // si detecta cambio en los inputs activa la funcion enable

  // tipoDocumentoInput.addEventListener('input', enableSaveButton);
  // numeroDocumentoInput.addEventListener('input', enableSaveButton);
  // nombreInput.addEventListener('input', enableSaveButton);
  // edadInput.addEventListener('input', enableSaveButton);
  // sexoInput.addEventListener('input', enableSaveButton);
  // direccionInput.addEventListener('input', enableSaveButton);
  // telefonoInput.addEventListener('input', enableSaveButton);
  // correoElectronicoInput.addEventListener('input', enableSaveButton);
  // tipoAfiliacionInput.addEventListener('input', enableSaveButton);

  // //enable button
  // function enableSaveButton() {
  //   var saveButton = document.querySelectorAll('[id^="sage"]');
  //   saveButton.disabled = (
  //       tipoDocumentoInput.value === initialValues.tipo_documento &&
  //       numeroDocumentoInput.value === initialValues.numero_documento &&
  //       nombreInput.value === initialValues.nombre &&
  //       edadInput.value === initialValues.edad &&
  //       sexoInput.value === initialValues.sexo &&
  //       direccionInput.value === initialValues.direccion &&
  //       telefonoInput.value === initialValues.telefono &&
  //       correoElectronicoInput.value === initialValues.correo_electronico &&
  //       tipoAfiliacionInput.value === initialValues.tipo_afiliacion
  //   );
  // }
