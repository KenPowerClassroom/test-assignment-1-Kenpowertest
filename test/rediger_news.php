<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Rédiger une news</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <style type="text/css">
        h3, form
        {
            text-align:center;
        }
        </style>
    </head>
    
    <body>
<h3><a href="liste_news.php">Retour à la liste des news</a></h3>
<?php
mysql_connect("localhost", "root", "");
mysql_select_db("test");
if (isset($_GET['modifier_news'])) // Si on demande de modifier une news.
{
    // On protège la variable « modifier_news » pour éviter une faille SQL.
    $_GET['modifier_news'] = mysql_real_escape_string(htmlspecialchars($_GET['modifier_news']));
    // On récupère les informations de la news correspondante.
    $retour = mysql_query('SELECT * FROM news WHERE id=\'' . $_GET['modifier_news'] . '\'');
    $donnees = mysql_fetch_array($retour);
    
    // On place le titre et le contenu dans des variables simples.
    $titre = stripslashes($donnees['titre']);
    $description = stripslashes($donnees['contenu']);
    $id_news = $donnees['id']; // Cette variable va servir pour se souvenir que c'est une modification.
}
else // C'est qu'on rédige une nouvelle news.
{
    // Les variables $titre et $contenu sont vides, puisque c'est une nouvelle news.
    $titre = '';
    $description = '';
    $id_news = 0; // La variable vaut 0, donc on se souviendra que ce n'est pas une modification.
}
?>
<form action="liste_news.php" method="post">
<p>Titre : <input type="text" size="30" name="titre" value="<?php echo $titre; ?>" /></p>
<p>
    Contenu :<br />
    <textarea name="contenu" cols="50" rows="10">
    <?php echo $description; ?>
    </textarea><br />
    
    <input type="hidden" name="id_news" value="<?php echo $id_news; ?>" />
    <input type="submit" value="Envoyer" />
</p>
</form>
</body>
</html>