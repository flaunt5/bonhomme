  <h2>Contact</h2>
  <form>
   <fieldset>
    <p>
     <label for="nom">Nom</label>
     <input id="nom" class="required" name="NOM" />
    </p>
    <p>
     <label for="prenom">Prénom</label>
     <input id="prenom" class="required" name="PRENOM" />
    </p>   
    <p>
     <label for="email">Email</label>
     <input id="email" class="required" type="email" name="EMAIL" />
    </p>   
    <p class="left">
     <label for="tel">Téléphone</label>
     <input id="tel" class="phone" type="tel" name="TEL" placeholder="XX.XX.XX.XX.XX" />
    </p>   
    <p class="left">
     <label for="mob">Mobile</label>
     <input id="mob" class="phone" type="tel" name="MOB" placeholder="XX.XX.XX.XX.XX" />
    </p> 
    <p class="center"><input type="submit" value="Ok" /></p>
   </fieldset>
  </form>  
  <div id="error"></div>
