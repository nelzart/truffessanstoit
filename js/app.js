// Initiablisation JS de la librairie CSS Materialize.css
M.AutoInit();


//==========================================  SITE VERSION MOBILE && TABLET ==========================================
// ================== MOBILE MENU VERSION
// change les propriétés CSS du Burger menu quand on clique dessus pour afficher les liens. 
function burger() {
  let burger = document.getElementById('burger');
  let links = document.getElementById('links');
  let quit = document.getElementById('quit');
  burger.style.padding = '16px 16px 200vh 200vw';
  links.style.display = 'flex';
  quit.style.display = 'inline';
}

// premet de quitter le menu burger sur la version mobile. 
function quit() {
  let burger = document.getElementById('burger');
  let links = document.getElementById('links');
  let quit = document.getElementById('quit');
  burger.style.padding = '5px 5px 32px 32px';
  links.style.display = 'none';
  quit.style.display = 'none';
}

// //on récupère toutes les ancres ayant l'attribut targetDiv
// let ancres = document.querySelectorAll('[targetdiv]');
// // on lrécupere les attributs de la class menuPres
// let hiddenDivs = document.querySelectorAll('.menuPres');
// ancres.forEach( (ancre) => {
//   //pour chaque ancre on ajoute un event listener sur le click
//   ancre.addEventListener('click', (event) => {
//     //lors du click on récupère l'id de la cible de l'ancre
//     let targetDivId = event.target.getAttribute('targetdiv');
//     //on récupère ensuite la div cible via son id
//     let targetDiv = document.getElementById(targetDivId);
//     //on fait le traitement sur la div
//     // on lui demande d'enlever la class Hide 
//     targetDiv.classList.remove('hide');
//     // on récupère les autres divs, et on rajoute la class hide 
//     // si elle est différente de l'ancre
//     hiddenDivs.forEach(div => {
//       if (div.id != targetDiv.id){
//         div.classList.add('hide')
//       } 
//     })
//   })
// })

//on récupère les selecteurs pour les lier aux divs des paragraphes
const select = document.querySelector('select');
if (select) {
  select.addEventListener('change', (event) => displayAnchor(event.target.value));
}
function displayAnchor(id) {
  console.debug('displayAnchor: ' + id);
  const anchorTarget = document.getElementById(id);
  const menuElements = Array.from(document.getElementsByClassName('menuPres'));
  menuElements.forEach(menuElement => menuElement.classList.add('hide'));
  anchorTarget.classList.remove('hide');
}

//on récupère toutes les ancres ayant l'attribut targetDiv
let ancres = document.querySelectorAll('[targetdiv]');
ancres.forEach((ancre) => {
  let cible = ancre.getAttribute('targetdiv');
  ancre.addEventListener('click', () => displayAnchor(cible));
});

if (cible = ancres) {
  ancre.classList.add('active1');
}

//filtre les figure de classe effect-sarah selon un filtre de classe donné
function filterSelection(filter) {
  let elemList = document.getElementsByClassName("effect-sarah");
  //pour chaque element de classe effect-sarah
  for (var i = 0; i < elemList.length; i++) {
    // si la classe filtrée existe dans la liste de classe de l'element
    if (elemList[i].classList.contains(filter)) {
      //alors on retire la classe qui cache l'element
      elemList[i].classList.remove('hide')
    } else {
      //sinon on cache l'element
      elemList[i].classList.add('hide')
    }
    //si on affiche tout on retire le cache de tous les elements
    if (filter == "all") {
      elemList[i].classList.remove('hide');
    }
  }
}

//ajout d'un event listener de clic permettant le filtre sur les boutons de la page adoption
let btnContainer = document.getElementById("myBtnContainer");
let btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", (target) => {
    //on effectue le filtre avec l'id du bouton (chat, chien, nac ou all)
    filterSelection(target.target.id)
  })
}
