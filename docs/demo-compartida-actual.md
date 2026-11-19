# Demo actual compartida

Sesión del 2026-11-19. Enlace temporal:
https://theatre-hearing-msgstr-poem.trycloudflare.com

Servidor local existente en 8000 conservado. Entrada pública dedicada en
127.0.0.1:8003, PHP PID 24864; cloudflared PID 14772. Reutiliza la base
de demostración existente, sin migraciones ni siembra. No requiere Vite.
Depuración desactivada y cookies seguras solo en el proceso de exposición.

El router `tools/demo-share-router.php` admite portada, catálogo, fichas,
carro, video, imagen de marca, ilustraciones, CSS y JavaScript del catálogo.
Panel privado y checkout bloqueados; no se habilitaron pagos.

Verificación HTTPS: portada actual, catálogo con cinco productos, carro,
video MP4 completo, imagen de marca, cuatro ilustraciones SVG y JavaScript
responden 200. Panel, `.env` y checkout responden 404.
La revisión visual y reproducción en navegador quedan pendientes:
el host del navegador de herramientas no estuvo disponible.

Mantener el equipo encendido, conectado y sin suspensión mientras se usa.
El enlace cambia al recrear el túnel.

Para cerrar esta sesión en PowerShell, después de confirmar que los PID
siguen correspondiendo a estos procesos:

```powershell
Stop-Process -Id 14772
Stop-Process -Id 24864
```

Esto conserva el servidor local anterior y MySQL.
