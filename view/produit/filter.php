<form method="post" action="">
        <legend>Trier par</legend>
    <p>
        <label>Sans tri</label>
        <input type="radio" name="attribut" value = "sansTri" id="st_id"/>
    </p>

    <p>
        <label>Nom Produit</label>
        <input type="radio" name="attribut" value = "nomProduit" id="nom_id"/>
    </p>

    <p>
        <label>Prix</label>
        <input type="radio" name="attribut" value = "prix" id="p_id"/>
    </p>
    <input type='hidden' name='action' value='order'>

    <p>
        <input type="submit" value="Trier" />
    </p>
</form>
