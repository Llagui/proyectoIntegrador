let inputContraseña = document.getElementById("contraseña");
let contraseñaRepetida = document.getElementById("repitaContraseña");

inputContraseña.addEventListener("input", () => {

    document.getElementById('seguridadContraseña').classList.remove('error');
    let contraseña = inputContraseña.value;
    let seguridadContraseña = 0;

    //Valoracion contraseñas segun contenido
    seguridadContraseña += hasLowerLetter(contraseña) ? 1 : 0;
    seguridadContraseña += hasUpperLetter(contraseña) ? 1 : 0;
    seguridadContraseña += hasDigit(contraseña) ? 1 : 0;
    seguridadContraseña += hasSpecialCharacter(contraseña) ? 2 : 0;

    //Valoracion contraseña segun longitud
    seguridadContraseña += Math.round(contraseña.length / 4);

    document.getElementById("seguridadContraseña").textContent = (seguridadContraseña < 5) ? "Muy débil" :
        (seguridadContraseña < 7) ? "Débil" :
            (seguridadContraseña < 9) ? "Normal" :
                (seguridadContraseña < 11) ? "Segura" :
                    "Muy segura";

    document.getElementById("seguridadContraseña").style.backgroundColor = (seguridadContraseña < 5) ? "Red" :
        (seguridadContraseña < 7) ? "Crimson" :
            (seguridadContraseña < 9) ? "OrangeRed" :
                (seguridadContraseña < 11) ? "SeaGreen" :
                    "ForestGreen";

    if (contraseña == '') {
        document.getElementById("seguridadContraseña").textContent = '';
        document.getElementById("seguridadContraseña").classList.remove('seguridad');
        contraseñaRepetida.disabled = true;
    } else {
        contraseñaRepetida.disabled = false;
        document.getElementById("seguridadContraseña").classList.add('seguridad');
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