<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Liste des restaurants</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <style type="text/css">
        h2, th, td
        {
            text-align:center;
        }
        table
        {
            border-collapse:collapse;
            border:2px solid black;
            margin:auto;
        }
        th, td
        {
            border:1px solid black;
        }
        </style>
    </head>
    
    <body>
 
<h2><a href="rediger.php">Ajouter une news</a></h2>
<?php
mysql_connect("localhost", "root", "");
mysql_select_db("Poupipou");
//-----------------------------------------------------
// Vérification 1 : est-ce qu'on veut poster une news ?
//-----------------------------------------------------
if (isset($_POST['nom_resto']) AND isset($_POST['description']))
{
    $titre = addslashes($_POST['nom_resto']);
    $contenu = addslashes($_POST['description']);
    // On vérifie si c'est une modification de news ou non.
    if ($_POST['id_news'] == 0)
    {
        // Ce n'est pas une modification, on crée une nouvelle entrée dans la table.
         mysql_query("INSERT INTO restaurant (id, nom_resto, description, date_creation) VALUES(''," . $titre . "', '" . $contenu . "', '" . time() . "')")
    or die("MySQL : ". mysql_error());

    }
    else
    {
        // On protège la variable "id_news" pour éviter une faille SQL.
        $_POST['id_news'] = addslashes($_POST['id_news']);
        // C'est une modification, on met juste à jour le titre et le contenu.
        mysql_query("UPDATE restaurant SET nom_resto='" . $titre . "', description='" . $contenu . "' WHERE id='" . $_POST['id_news'] . "'");
    }
}
 
//--------------------------------------------------------
// Vérification 2 : est-ce qu'on veut supprimer une news ?
//--------------------------------------------------------
if (isset($_GET['supprimer'])) // Si l'on demande de supprimer une news.
{
    // Alors on supprime la news correspondante.
    // On protège la variable « id_news » pour éviter une faille SQL.
    $_GET['supprimer'] = addslashes($_GET['supprimer']);
    mysql_query('DELETE FROM restaurant WHERE id=\'' . $_GET['supprimer'] . '\'');
}
?>
<table><tr>
<th>Modifier</th>
<th>Supprimer</th>
<th>Titre</th>
<th>Date</th>
</tr>
<?php
$retour = mysql_query('SELECT * FROM restaurant ORDER BY id DESC');
while ($donnees = mysql_fetch_array($retour)) // On fait une boucle pour lister les news.
{
?>
<tr>
<td><?php echo '<a href="rediger.php?modifier=' . $donnees['id'] . '">'; ?>Modifier</a></td>
<td><?php echo '<a href="liste.php?supprimer=' . $donnees['id'] . '">'; ?>Supprimer</a></td>
<td><?php echo stripslashes($donnees['nom_resto']); ?></td>
<td><?php echo date('d/m/Y', $donnees['date_creation']); ?></td>
</tr>
<?php
} // Fin de la boucle qui liste les news.
?>
</table>
</body>
</html>