let inputContraseña = document.getElementById("contraseña");
let contraseñaRepetida = document.getElementById("repitaContraseña");

inputContraseña.addEventListener("input", () =>{
    
    document.getElementById('seguridadContraseña').classList.remove('error');
    let contraseña = inputContraseña.value;
    let seguridadContraseña = 0;
    
    //Valoracion contraseñas segun contenido
    console.log(hasLowerLetter(contraseña));
    seguridadContraseña += hasLowerLetter(contraseña) ? 1 : 0;
    seguridadContraseña += hasUpperLetter(contraseña) ? 1 : 0;
    seguridadContraseña += hasDigit(contraseña) ? 1 : 0;
    seguridadContraseña += hasSpecialCharacter(contraseña) ? 2 : 0;
    
    //Valoracion contraseña segun longitud
    seguridadContraseña += Math.round(contraseña.length/4);

    document.getElementById("seguridadContraseña").textContent = (seguridadContraseña < 5) ? "Muy debil" :
                    (seguridadContraseña < 6) ? "Débil" :
                    (seguridadContraseña < 8) ? "Normal" :
                    (seguridadContraseña < 10) ? "Segura" :
                    "Muy segura";
    
    if (contraseña == '') {
        document.getElementById("seguridadContraseña").textContent = '';
        document.getElementById("seguridadContraseña").classList.remove('seguridad');
        contraseñaRepetida.disabled = true;
    }else{
        contraseñaRepetida.disabled = false;
        document.getElementById("seguridadContraseña").classList.add('seguridad');
    }
});

contraseñaRepetida.addEventListener("change", () => {
    let error = document.getElementById('coincidenciaContraseñas');
    if (contraseñaRepetida.value != contraseña.value) {
        error.textContent = 'Las contraseñas no coinciden';
        error.classList.add('error');
    } else {
        error.textContent = '';
        error.classList.remove('error');
    }
});

function hasUpperLetter(str) {
    return str.split('').some(item => 'QWERTYUIOPASDFGHJKLÑZXCVBNM'.includes(item));
}
function hasLowerLetter(str) {
    return str.split('').some(item => 'qwertyuiopasdfghjklñzxcvbnm'.includes(item));
}
function hasDigit(str) {
    return str.split('').some(item => '1234567890'.includes(item));
}
function hasSpecialCharacter(str) {
    return str.split('').some(item => '|@#€¬[]{}ç!"·$%&/()=?¿+-.,;:_*'.includes(item));
}