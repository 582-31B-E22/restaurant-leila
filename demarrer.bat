REM Démarrer le serveur MySQL
start /b E:\logiciels\mysql\bin\mysqld.exe
REM Démarrer une instance du serveur de test PHP pour déployer l'appli Web PHPMyAdmin
start /b E:\logiciels\php\php.exe -S 127.0.0.255:8080 -t E:\logiciels\phpmyadmin
REM Démarrer une instance séparée du serveur de test PHP pour déployer l'appli du dossier courant
start /b E:\logiciels\php\php.exe -S 127.0.0.10:9000
REM Accéder à PHPMyAdmin avec le browser Web par défaut
start http://127.0.0.255:8080/
REM Accéder à l'appli dans le dossier courant avec le browser Web par défaut
start http://127.0.0.10:9000/