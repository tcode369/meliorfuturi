//var offer = gsap.timeline({repeat: -1, repeatDelay: 1});
var mobAttached = false;
var deskAttached = false;
var offer = gsap.timeline();
offer.add(gsap.from(".hydra", {duration: 2, opacity: 0}));
offer.add(gsap.from(".work", {opacity: 0}));
//offer.add(gsap.from(".work li", {opacity: 0.3, xPercent:-100}));
offer.add(gsap.from(".svg path, .svg rect", {duration:1,stagger: 0.02, drawSVG: "100% live"}));


const button = document.querySelectorAll(".work li");
const desc = document.querySelectorAll(".desc");
const hero = document.querySelector('.hydra');
let noEL;
let ai = false;

["click", "touch"].forEach(
	event => button[0].addEventListener(event, (e) => {
	if (!ai) {
		var info = gsap.timeline();
		info.to(button[1], { duration:0.01, display:"flex", ease:"none"});
		info.to(button[1], { duration: .01, opacity:1, paddingTop:"5rem", paddingBottom:"5rem", ease:"circ.in"});
		ai=true;}
	else {
		var info = new gsap.timeline();
		info.to(button[1], { duration:.25, opacity:0, paddingTop:"0", paddingBottom:"0", ease:"expo.in"});
		info.to(button[1], { duration:.1, display:"none"});
		ai=false;
		}

}));


window.addEventListener('mousemove', (e) => {
  const { clientX, clientY } = e;
  const x = Math.round((clientX / window.innerWidth)*5);
  const y = Math.round((clientY / window.innerHeight)*5);		
    
  gsap.to(hero, {
    rotationY:x,
    rotationX:y,
    ease:Power4.out,
    //translateY:"-50%",
    transformPerspective:500,
    transformOrigin:"center",
    svgOrigin: "50 50"
  });

});

checkWidth();
function checkWidth() {
  try{
    var $wwidth = window.innerWidth;
    var $wheight = window.innerHeight;
    if ($wwidth <= 768 || $wheight < 450) {noEL = 1}
    else noEL = 2;
  } catch(err) {
      console.log(err);
    }
}
md();
function md()  {
	if (noEL === 1) {
		  gsap.to(hero, {translateY:"none"});
		} 
	else {
			gsap.to(hero, {translateY:"-50%"});
			}
	}

window.addEventListener('resize', _.throttle((e) => {
  checkWidth(); 
  md();
}, 100), true);