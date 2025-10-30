// Datos de ejemplo de paquetes de viaje
    const paquetes = [
        { destino: "Jujuy", imagen: "jujuy.jpg", precio: 120000 },
        { destino: "Bariloche", imagen: "bariloche.jpg", precio: 150000 },
        { destino: "Cataratas del Iguazú", imagen: "cataratas de iguazu.jpg", precio: 135000 },
        { destino: "Santiago de Chile", imagen: "santiagodechile.jpg", precio: 163000 },
        { destino: "Sao Paulo", imagen: "Saopablo.jpg", precio: 178000 },
        { destino: "Estambul", imagen: "estambul.jpg", precio: 350000 },
        { destino: "Madrid", imagen: "madrid.jpg", precio: 300000 },
        { destino: "Hong Kong", imagen: "hongkong.jpg", precio: 375000 },
        { destino: "Miami", imagen: "miami.jpg", precio: 225000 },
        { destino: "Cancun", imagen: "cancun.jpg", precio: 247000 }
    ];

    let actual = 0;
    const paqueteDiv = document.getElementById('paquete');
    // Carrito de compras: {indicePaquete: cantidad}
    let carrito = {};

    function mostrarPaquete(idx) {
        const p = paquetes[idx];
        const cantidad = carrito[idx] || 0;
        paqueteDiv.innerHTML = `
            <img src="${p.imagen}" alt="${p.destino}" style="max-width:300px; display:block; margin:auto; border-radius:10px;">
            <h2>Viaje a ${p.destino}</h2>
            <p><strong>Precio: $${p.precio.toLocaleString()}</strong></p>
            <label>Cantidad: <input type='number' min='1' value='${cantidad || 1}' id='cantidadViaje' style='width:60px;'></label>
            <button id='agregarCarrito'>Agregar al carrito</button>
            <p style='color:green;' id='agregadoMsg'></p>
        `;
        document.getElementById('agregarCarrito').onclick = function() {
            const cant = parseInt(document.getElementById('cantidadViaje').value);
            if (cant > 0) {
                carrito[idx] = (carrito[idx] || 0) + cant;
                document.getElementById('agregadoMsg').textContent = `Agregado ${cant} viaje(s) a ${p.destino}`;
            }
        };
    }

    document.getElementById('prev').addEventListener('click', function() {
        actual = (actual - 1 + paquetes.length) % paquetes.length;
        mostrarPaquete(actual);
    });
    document.getElementById('next').addEventListener('click', function() {
        actual = (actual + 1) % paquetes.length;
        mostrarPaquete(actual);
    });

    // Mostrar el primer paquete al cargar
    mostrarPaquete(actual);

    // Botón para comprar todos los viajes
    document.getElementById('comprarTodo').addEventListener('click', function() {
        let resumen = '';
        let total = 0;
        for (const idx in carrito) {
            const cantidad = carrito[idx];
            const p = paquetes[idx];
            resumen += `<li>${cantidad} x ${p.destino} ($${(p.precio * cantidad).toLocaleString()})</li>`;
            total += p.precio * cantidad;
        }
        if (total === 0) {
            alert('No has seleccionado ningún viaje.');
            return;
        }
        const html = `<h2>Resumen de compra</h2><ul>${resumen}</ul><h3>Total: $${total.toLocaleString()}</h3>`;
        // Mostrar resumen en un modal simple
        const modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100vw';
            modal.style.height = '100vh';
            modal.style.background = 'rgba(0,0,0,0.7)';
            modal.style.display = 'flex';
            modal.style.alignItems = 'center';
            modal.style.justifyContent = 'center';
            modal.innerHTML = `<div style='background:#fff; padding:30px; border-radius:10px; min-width:300px; text-align:center;'>${html}<br><button id='cerrarModal'>Cerrar</button></div>`;
            document.body.appendChild(modal);
            document.getElementById('cerrarModal').onclick = function() {
                document.body.removeChild(modal);
            };
        });