// Initiablisation JS de la librairie CSS Materialize.css
M.AutoInit();

// document.addEventListener('DOMContentLoaded', function() {
//   var elems = document.querySelectorAll('.collapsible');
//   var instances = M.Collapsible.init(elems, options);
// });







//==========================================  SITE VERSION MOBILE && TABLET ==========================================
// ================== MOBILE MENU VERSION
// change les propriétés CSS du Burger menu quand on clique dessus pour afficher les liens. 
function burger(){
    let burger = document.getElementById('burger');
    let links = document.getElementById('links');
    let quit = document.getElementById('quit');
    burger.style.padding = '16px 16px 200vh 200vw';
    links.style.display = 'flex';
    quit.style.display = 'inline';
  }  

// premet de quitter le menu burger sur la version mobile. 
function quit(){
  let burger = document.getElementById('burger');
  let links = document.getElementById('links');
  let quit = document.getElementById('quit');
  burger.style.padding = '5px 5px 32px 32px';
  links.style.display = 'none';
  quit.style.display = 'none';
}  

  //on récupère toutes les ancres ayant l'attribut targetDiv
  let ancres = document.querySelectorAll('[targetdiv]');
  // on lrécupere les attributs de la class menuPres
  let hiddenDivs = document.querySelectorAll('.menuPres');
  ancres.forEach( (ancre) => {
    //pour chaque ancre on ajoute un event listener sur le click
    ancre.addEventListener('click', (event) => {
      //lors du click on récupère l'id de la cible de l'ancre
      let targetDivId = event.target.getAttribute('targetdiv');
      //on récupère ensuite la div cible via son id
      let targetDiv = document.getElementById(targetDivId);
      //on fait le traitement sur la div
      // on lui demande d'enlever la class Hide 
      targetDiv.classList.remove('hide');
      // on récupère les autres divs, et on rajoute la class hide 
      // si elle est différente de l'ancre
      hiddenDivs.forEach(div => {
        if (div.id != targetDiv.id){
          div.classList.add('hide')
        } 
      })
    })
  })

  ancres.forEach( (ancre) => {
    //pour chaque ancre on ajoute un event listener sur le click
    ancre.addEventListener('change', (event) => {
      //lors du click on récupère l'id de la cible de l'ancre
      let targetDivId = event.target.getAttribute('targetdiv');
      //on récupère ensuite la div cible via son id
      let targetDiv = document.getElementById(targetDivId);
      //on fait le traitement sur la div
      // on lui demande d'enlever la class Hide 
      targetDiv.classList.remove('hide');
      // on récupère les autres divs, et on rajoute la class hide 
      // si elle est différente de l'ancre
      hiddenDivs.forEach(div => {
        if (div.id != targetDiv.id){
          div.classList.add('hide')
        } 
      })
    })
  })

//   function myFunction() {
//   var x = ancres.addEventListener("mySelect");
//   document.getAttribute("menu") = "You selected: " + x;
// }