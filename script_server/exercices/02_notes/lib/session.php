<?php
/**
 *  Script de démarrage de session
 */

// On vérifie si une session n'existe pas déjà
if (session_status() != PHP_SESSION_ACTIVE) {
    // On démarre la session
    session_start();
}