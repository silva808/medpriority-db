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
        console.log("sageee la mejor");
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
        xhr.send(JSON.stringify(data));
    });
});



$(document).ready(function() {
  // Attach click event handler to "Aplicar cambios" button
  $('.save-button').click(function() {
      var modalId = $(this).data('modal-id');
      
      // Gather updated user information from modal fields
      var idType = $('#' + modalId + ' [name=id_type]').val();
      var name = $('#' + modalId + ' [name=name]').val();
      var age = $('#' + modalId + ' [name=age]').val();
      var sex = $('#' + modalId + ' [name=sexmoneyfeelingsdie]').val();
      var address = $('#' + modalId + ' [name=address]').val();
      var phone = $('#' + modalId + ' [name=pickupyophonebaby]').val();
      var email = $('#' + modalId + ' [name=email]').val();
      var afi = $('#' + modalId + ' [name=afi]').val();
      var userId = $('#' + modalId + ' [name=id]').val();

      // Send AJAX POST request to update user information
      $.ajax({
          url: 'test.php',
          type: 'POST',
          dataType: 'json',
          data: {
              id_type: idType,
              name: name,
              age: age,
              sexmoneyfeelingsdie: sex,
              address: address,
              pickupyophonebaby: phone,
              email: email,
              afi: afi,
              id: userId
          },
          success: function(response) {
              // Update corresponding row in the table with new user data
              $('#' + modalId).modal('hide'); // Hide the modal if needed
              var row = $('#table_row_' + userId); // Assuming you have a unique ID for each table row
              row.find('td:nth-child(1)').text(response.id_usuario);
              row.find('td:nth-child(2)').text(response.nombre);
              row.find('td:nth-child(3)').text(response.edad);
              row.find('td:nth-child(4)').text(response.telefono);
              // Update other columns as needed
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
              // Handle error
          }
      });
  });
});


$.ajax({
  url: 'test.php',
  type: 'POST',
  dataType: 'json',
  data: {
      // Your data here
  },
  success: function(response) {
      console.log('AJAX request successful:', response);
      // Update table row or handle response as needed
  },
  error: function(xhr, status, error) {
      console.error('AJAX request failed:', error);
      // Handle error
      console.log('Response:', xhr.responseText); // Log the entire response
  }
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
