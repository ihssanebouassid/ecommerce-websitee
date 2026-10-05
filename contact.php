<?php 
include 'header.php'; ?>
<div class="contact-container"> 
    <h1>Contactez-nous</h1>
    <p class="contact-text">
        Une question ? Un problème ? Envoyez-nous un message.</p>
    <form class="contact-form" method="POST">
        <input type="text" name="nom" placeholder="Votre nom" required>
        <input type="email" name="email" placeholder="Votre email" required>
        <textarea name="message" placeholder="Votre message..." required></textarea>
        <button type="submit">
            Envoyer
        </button>
    </form>
</div>
</body>
</html>