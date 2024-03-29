<form id="contact-form" class="form" action="" method="POST" accept-charset="utf-8">

    <!-- Settings -->
    <input type="hidden" name="access_key" value="fdacd6a8-2e18-40c0-9d31-3fd099bf7bef">
    <input type="hidden" name="from_name" value="GridBox 2.0">
    <input type="hidden" name="subject" value="Contacto con Web3Forms!">
    <input type="hidden" name="replyto" value="nico@nicowebsite.com" />
   
    <div class="field">
        <input type="text" name="name" placeholder="Nombre y Apellido" pattern="^[A-Za-z]+ [A-Za-z]+$" required />
        <div class="valid-msg">Debes colocar tu nombre y apellido</div>
    </div>

    <div class="field">
        <input type="email" name="email" placeholder="ejemplo@email.com" required />
        <div class="valid-msg">Debes colocar un correo válido</div>
    </div>

    <div class="field">
        <input type="tel" name="phone" placeholder="Teléfono" required minlength="9" maxlength="18" />
        <div class="valid-msg">Debes colocar un teléfono válido</div>
    </div>

    <div class="field">
        <textarea name="message" placeholder="Mensaje..." minlength="16"></textarea>
        <div class="valid-msg">Tu mensaje debe ser de mas de 16 caracteres.</div>
    </div>

    <div class="flex gap-2 md:gap-4">
        
        <!-- captcha -->
        <div class="relative flex md:w-25%">
            <div class="w-50%">
                <input type="text" id="captcha" value="" required disabled >
            </div>

            <div class="w-50%">
                <input type="text" id="captchaResult" placeholder="***" required>
            </div>
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

        <div id="result"></div>

    </div>
    
</form>


