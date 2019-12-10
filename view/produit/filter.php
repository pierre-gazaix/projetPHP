<form method="post" action="">
    <fieldset>
        <legend>Trier par:</legend>
        <p>
            <label for="nom_id">Nom Produit</label>
            <input type="radio" name="attribut" value = "nomProduit" id="nom_id"/>
        </p>

        <input type='hidden' name='action' value='order'>
        <p>
            <input type="submit" value="Trier" />
        </p>
    </fieldset>
</form>
