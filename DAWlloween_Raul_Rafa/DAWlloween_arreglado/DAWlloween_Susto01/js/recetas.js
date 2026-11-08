document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-receta').forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('aria-controls');
            const pasos = document.getElementById(targetId);
            if (pasos) {
                const hidden = pasos.hasAttribute('hidden');
                if (hidden) {
                    pasos.removeAttribute('hidden');
                    btn.setAttribute('aria-expanded', 'true');
                    btn.textContent = 'Ocultar receta';
                } else {
                    pasos.setAttribute('hidden', '');
                    btn.setAttribute('aria-expanded', 'false');
                    btn.textContent = 'Ver receta';
                }
            }
        });
    });
});