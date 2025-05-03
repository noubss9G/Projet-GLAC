<?php

class Utilisateur 
{
    private int $id_utilisateur;
    private string $courriel;
    private string $mot_de_passe;


    /**
     * Définir les attributs d'un utilisateur
     */
    public function DefinirId(int $p)
    {
        $this->id_utilisateur = $p;
    }

    public function DefinirCourriel(string $p)
    {
        $this->courriel = $p;
    }

    public function DefinirMdp(string $p)
    {
        $this->mot_de_passe = $p;
    }


    /**
     * Obtenir attributs d'utilisateur
     */
    public function ObtenirId()
    {
        return $this->id_utilisateur;
    }

    public function ObtenirCourriel()
    {
        return $this->courriel;
    }

    public function ObtenirMdp()
    {
        return $this->mot_de_passe;
    }
}