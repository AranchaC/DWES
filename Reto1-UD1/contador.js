// Verifica si existe una entrada en el almacenamiento 
//local para el contador de visitas.
if (localStorage.getItem('visitas')) {
    // Si existe, obtén el valor actual y aumenta en 1.
    let visitas = parseInt(localStorage.getItem('visitas'));
    visitas++;
    
    // Actualiza el valor en el almacenamiento local.
    localStorage.setItem('visitas', visitas);

    // Muestra el valor en la página.
    document.getElementById('contador').textContent = visitas;
} else {
    // Si no existe, crea una entrada en el almacenamiento local 
    //con el valor 1.
    localStorage.setItem('visitas', 1);

    // Muestra 1 en la página.
    document.getElementById('contador').textContent = 1;
}
