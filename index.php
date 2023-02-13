<?php
/**
 * 1. Le dossier SQL contient l'export de ma table user.
 * 2. Trouvez comment importer cette table dans une des bases de données que vous avez créées, si vous le souhaitez
 * vous pouvez en créer une nouvelle pour cet exercice.
 * 3. Assurez vous que les données soient bien présentes dans la table.
 * 4. Créez votre objet de connexion à la base de données comme nous l'avons vu
 * 5. Insérez un nouvel utilisateur dans la base de données user
 * 6. Modifiez cet utilisateur directement après avoir envoyé les données ( on imagine que vous vous êtes trompé )
 */

// TODO Votre code ici.
try {
    $server = "localhost";
    $user ="root";
    $password ="";
    $db = 'test2';

    $con = new PDO ("mysql:host=$server; dbname=$db", $user, $password );

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connexion OK';

    $con->beginTransaction();

    $insert = 'INSERT INTO user (nom, prenom, rue, numero, code_postal, ville, pays, mail) VALUES ';

    $sql = $insert . "('Deboudt', 'Damien', '54 rue albert 1er', 54, 02500, 'Hirson', 'France', 'dam.deb@sfr.fr')";

    $con->exec($sql);

    $con->commit();
}
catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
    $con->rollBack();
;}

echo $con->lastInsertId();


/**
 * Théorie
 * --------
 * Pour obtenir l'ID du dernier élément inséré en base de données, vous pouvez utiliser la méthode: $bdd->lastInsertId()
 *
 * $result = $bdd->execute();
 * if($result) {
 *     $id = $bdd->lastInsertId();
 * }
 */