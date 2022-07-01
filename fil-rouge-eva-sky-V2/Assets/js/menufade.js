// var tabs = document.querySelectorAll('.tabs a');
// var tab = document.querySelectorAll('.tab');

// function activeannule() {
//     for (var i = 0; i < tab.length; i++) {
//         tab[i].classList.remove('active');
//     }
// }

// function activeoff() {
//     for (var i = 0; i < tabs.length; i++) {
//         tabs[i].classList.remove('active');
//     }
// }

// for (var i = 0; i < tabs.length; i++) {
//     tabs[i].addEventListener('click', function(event) {
//         event.preventDefault();
//         const dataOpen = event.target.dataset.open;
//         activeannule();
//         activeoff();
//         event.target.classList.add('active');
//         document.querySelector('.${dataOpen}').classList.add('active');
//     });
// }

// var tabs = document.querySelectorAll('.tabs a');

// for (var i = 0; i < tabs.length; i++) {
//     tabs[i].addEventListener('click', function(event) {
//         event.preventDefault();
//         document.querySelector('.tab.active').classList.remove('active');
//         document.querySelector('.tabs a.active').classList.remove('active');
//         event.target.classList.add('active');
//         document.querySelector(`.${event.target.dataset.open}`).classList.add('active');
//     });
// }

// const links = document.querySelectorall('.tabs li');
// const contenu = document.querySelectorAll('.tab');

// function tabs() {

//     toggle = (targetId) => {
//         console.log(targetId);

//         contenu.forEach((elem) => {
//             elem.style.display = elem.id === targetId ? 'block' : 'none';
//             document.querySelector(`[data-target="${elem.id}"]`).classlist[elem.id === targetId ? 'add' : 'remove']('active');
//         });
//     }

//     links.forEach((link) => {
//         link.addEventListener('click', () => {
//             toggle(link.dataset.target);
//         });
//         if(link.className.includes('active')){
//             toggle(link.dataset.target);
//         }
//     })
// }

// tabs();

// const tabs = document.querySelector(".tabs");
// const tabButton = document.querySelectorAll(".tab-boutton");
// const contents = document.querySelectorAll(".content");

// tabs.onclick = e => {
//   const id = e.target.dataset.id;
//   if (id) {
//     tabButton.forEach(btn => {
//       btn.classList.remove("active");
//     });
//     e.target.classList.add("active");

//     contents.forEach(content => {
//       content.classList.remove("active");
//     });
//     const element = document.getElementById(id);
//     element.classList.add("active");
//   }
// }

function opentab(evt, nomtab) {
    var i, tabcontent, tablinks;
  
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(nomtab).style.display = "flex";
    evt.currentTarget.className += " active";
  }

  document.getElementById("active").click();


  


  

  