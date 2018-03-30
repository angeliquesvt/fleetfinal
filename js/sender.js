$(document).ready(function () {
    /**
     * 3 - Envoie du formulaire de contact
     */
    $('#besoin').on('submit', function (e) {
        e.preventDefault();
        var prenom = $('#first_name').val()
        var nom = $('#last_name').val()
        var message = $('#textarea1').val()
        var email = $('#email').val()
        var poste = $('#poste').val()
        var usermail = $('#usermail').val()

        var envoiphp = {'prenom': prenom,'nom': nom,'poste': poste,'message': message, 'email': email, 'usermail': usermail}
        console.log(envoiphp)
        $.ajax({
            dataType: 'json',
            url: 'send.php',
            type: 'POST',
            data: envoiphp,
            success: function () {
              //  $('.popup').show();
            }
        })
    })
    /**
     * Fin de l'envoie du formulaire de contact
     */
})
