/*Para pantallas más pequeñas*/
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('#menu');
    const menu = document.querySelector('.menu');
    
    menuToggle.addEventListener('click', function () {
        menu.classList.toggle('open');
    });
});



document.addEventListener('DOMContentLoaded', (event) => {
    const textos = [
        "Nuestra misión es nutrir y deleitar, brindándote alimentos frescos y deliciosos que reflejan nuestro compromiso con tu salud y felicidad.",
        "Transformando cada comida en una experiencia memorable con ingredientes frescos y calidad inigualable, cuidando de tu salud y bienestar en cada bocado.",
        "Comprometidos con la excelencia, brindamos alimentos de la más alta calidad para tu bienestar y satisfacción en cada bocado."
    ];

    let textoIndex = 0;
    const textoElement = document.getElementById('carrusel-texto');

    function cambiarTexto() {
        // Ocultar el texto actual
        textoElement.classList.remove('fade-in');
        
        setTimeout(() => {
            // Cambiar el texto después de que la opacidad se haya reducido a 0
            textoIndex = (textoIndex + 1) % textos.length;
            textoElement.textContent = textos[textoIndex];
            
            // Mostrar el nuevo texto
            textoElement.classList.add('fade-in');
        }, 1000); // Espera 1 segundo para la transición de salida
    }

    // Inicialmente mostrar el texto
    textoElement.classList.add('fade-in');

    // Cambiar el texto cada 4 segundos
    setInterval(cambiarTexto, 7000);
}
);
