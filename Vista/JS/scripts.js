function limpiar(){
    document.logeo.reset();
    document.email.reset();
    document.registro.reset();
}

function enviar(event){
    event.preventDefault();
    Swal.fire({
        title: 'Input email address',
        input: 'email',
        inputLabel: 'Your email address',
        inputPlaceholder: 'Enter your email address'
    }).then((result) => {
        if(result.value){
            Swal.fire('Se ha enviado el codigo de recuperacion al correo electronico registrado');
            setTimeout(() => {
                console.log(email);
                window.location.href = 'http://localhost/Pets/';
                document.email.submit(email);
            }, 3000);
        }
        else{
            window.location = '../index.php';
            return false;
        }
    });
}