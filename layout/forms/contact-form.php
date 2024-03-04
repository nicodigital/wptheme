<form id="contact-form" class="form" action="" method="POST" accept-charset="utf-8">

    <!-- Settings -->
    <input type="hidden" name="access_key" value="fdacd6a8-2e18-40c0-9d31-3fd099bf7bef">
    <input type="hidden" name="from_name" value="GridBox 2.0">
    <input type="hidden" name="subject" value="Contacto con Web3Forms!">
    <input type="hidden" name="replyto" value="nico@nicowebsite.com" />

    <div class="field">
        <input type="text" name="name" placeholder="Nombre y Apellido" pattern="^[A-Za-z]+ [A-Za-z]+$" required />
    </div>

    <div class="field">
        <input type="email" name="email" placeholder="ejemplo@email.com" required />
    </div>

    <div class="field">
        <input type="tel" name="phone" placeholder="Teléfono" required minlength="9" maxlength="18" />
    </div>

    <div class="field">
        <textarea name="message" placeholder="Mensaje..." minlength="16"></textarea>
    </div>

    <button type="submit" disabled class="mt-2">
        <span class="flex align-center">
            <span class="loader mr-1"></span>
            <span class="txt">
                Enviar
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m2 21l21-9L2 3v7l15 2l-15 2z" />
                </svg>
            </span>
        </span>
    </button>

</form>