$('#butonlo').on('click', function() {

    Swal.fire({
        title: "¿Estas seguro de irte?",
        text: "Recuerda que puedes iniciar sesión cuando quieras :)",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Estoy seguro ",
        cancelButtonText: "Quiero iniciar sesión ",
      })
      .then((result) => {
        if(result.value){
            window.location.href = "config/logout.php";
        }
      });
      

})