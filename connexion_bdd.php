<?php
	// on crée uen connexion à la base de données sqlite qui est date.sqlite
	$mysqlClient = new PDO('sqlite:' . __DIR__ . '/data.sqlite');
	// on n'affiche pas les erreurs pour éviter les problèmes de sécurité
	$mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
