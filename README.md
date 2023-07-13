# CTF Web Serveur - LFI/RFI et gestionnaire de Flux FTP

## Présentation du CTF 
**ID** 1 dans **les CTFs de Cyrhades**


Récupérez le FLAG de validation qui se trouve dans le fichier ./flag.txt en exploitant 
une faille LFI/RFI et le gestionnaire de flux FTP.


Dans ce challenge l'objectif est de réussir à soumettre une backdoor en PHP en passant par le formulaire "Nous rejoindre".

A partir de la faille LFI récupérez les informations d'authentification au serveur FTP (mais où sont stockées ces informations d'après vous ?) et une fois trouvé, utilisez les avec le gestionnaire de flux FTP en exploitant votre backdoor.


## Aperçu
![infos/capture.jpg](infos/capture.jpg)


-----------

## Installation manuel
Vous n'utilisez pas l'application **les CTFs de Cyrhades** ? C'est dommage !
Mais voici comment installer ce CTF manuellement :

> git clone https://github.com/Hack-Oeil/PHP_LFI_RFI_WRAPPER_FTP.git

> cd PHP_LFI_RFI_WRAPPER_FTP && docker compose up

