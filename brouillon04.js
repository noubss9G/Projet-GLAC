<ul>
	<li id="taille-mdp"></li>
	<li id="min-mdp"></li>
	<li id="maj-mdp"></li>
	<li id="chiffre-mdp"></li>
</ul>

$("#mot_de_passe").on("keyup", function () {
    //Si la valeur n'est pas vide
    if ($(this).val() != "") {
        let taille = $("#taille-mdp");
        taille.children().remove();
        taille.text("");
        let min = $("#min-mdp");
        min.children().remove();
        min.text("");
        let maj = $("#maj-mdp");
        maj.children().remove();
        maj.text("");
        let digit = $("#chiffre-mdp");
        digit.children().remove();
        digit.text("");
        //Vérifie qu'il y a au moins 8 caractères
        if (/^(.{8,})/.test($(this).val())) {
            taille.append('<i class="fas fa-check-circle is-font-primary"></i> Au moins 8 caractères. (' + $(this).val().length + '/8)');
        } else {
            taille.append('<i class="fas fa-times-circle is-font-danger"></i> Au moins 8 caractères. (' + $(this).val().length + '/8)');
        }
        //Vérification du chiffre
        if (/^(?=.*\d)/.test($(this).val())) {
            digit.append('<i class="fas fa-check-circle is-font-primary"></i> Au moins 1 chiffre.');
        } else {
            digit.append('<i class="fas fa-times-circle is-font-danger"></i> Au moins 1 chiffre.');
        }
        //Vérification de la minuscule
        if (/^(?=.*[a-z])/.test($(this).val())) {
            min.append('<i class="fas fa-check-circle is-font-primary"></i> Au moins 1 caractère en minuscule.');
        } else {
            min.append('<i class="fas fa-times-circle is-font-danger"></i> Au moins 1 caractère en minuscule.');
        }
        //Vérification de la majuscule
        if (/^(?=.*[A-Z])/.test($(this).val())) {
            maj.append('<i class="fas fa-check-circle is-font-primary"></i> Au moins 1 caractère en majuscule.');
        } else {
            maj.append('<i class="fas fa-times-circle is-font-danger"></i> Au moins 1 caractère en majuscule.');
        }
    } 
});

if (/^(.{8,})/.test($(this).val())) {
	taille.append('<i class="fas fa-check-circle is-font-primary"></i> Au moins 8 caractères. (' + $(this).val().length + '/8)');
} else {
	taille.append('<i class="fas fa-times-circle is-font-danger"></i> Au moins 8 caractères. (' + $(this).val().length + '/8)');
}

if (/^(?=.*\d)/.test($(this).val())) {
	digit.append('<i class="fas fa-check-circle is-font-primary"></i> Au moins 1 chiffre.');
 } else {
	digit.append('<i class="fas fa-times-circle is-font-danger"></i> Au moins 1 chiffre.');
 }

 if (/^(?=.*[a-z])/.test($(this).val())) {
	min.append('<i class="fas fa-check-circle is-font-primary"></i> Au moins 1 caractère en minuscule.');
 } else {
	min.append('<i class="fas fa-times-circle is-font-danger"></i> Au moins 1 caractère en minuscule.');
 }
 
 if (/^(?=.*[A-Z])/.test($(this).val())) {
	maj.append('<i class="fas fa-check-circle is-font-primary"></i> Au moins 1 caractère en majuscule.');
 } else {
	maj.append('<i class="fas fa-times-circle is-font-danger"></i> Au moins 1 caractère en majuscule.');
 }

 