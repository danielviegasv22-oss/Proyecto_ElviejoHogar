/**
 * Vanilla JavaScript - El Viejo Hogar
 * Sin dependencias pesadas ni frameworks externos
 */

document.addEventListener('DOMContentLoaded', () => {
    console.log('El Viejo Hogar app initialized (Vanilla JS)');

    // Manejo del contador de carrito
    const contadorElem = document.querySelector('.contador');
    const botonesCarrito = document.querySelectorAll('.btn-carrito');

    let cartCount = parseInt(localStorage.getItem('cart_count') || '0', 10);
    
    function updateCartCounter() {
        if (contadorElem) {
            contadorElem.textContent = cartCount;
        }
    }

    updateCartCounter();

    botonesCarrito.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            cartCount++;
            localStorage.setItem('cart_count', cartCount);
            updateCartCounter();

            // Animación sutil de confirmación
            const originalText = btn.textContent;
            btn.textContent = '✓ ¡Agregado!';
            btn.style.backgroundColor = 'var(--color-secondary)';
            
            setTimeout(() => {
                btn.textContent = originalText;
                btn.style.backgroundColor = '';
            }, 1000);
        });
    });
});
