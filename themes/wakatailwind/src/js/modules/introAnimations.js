import { gsap } from "gsap";
//import { MotionPathPlugin } from "gsap/MotionPathPlugin";

//gsap.registerPlugin(MotionPathPlugin);

function launchIntro() {
    var tl = gsap.timeline({ repeat: 2, repeatDelay: 3 });
    // gsap.set("#c_fond", { transformOrigin: "50% 50%" });
    // gsap.set("#obj2", { xpercent: -50, yPercent: -50, transformOrigin: "50% 50%" }); trait

    tl.to("#trait", {
        duration: 1,
        opacity: 0,
        ease: "power1.inOut",
        immediateRender: true,
    }, "+=3");
    tl.to("#points", {
        duration: 2,
        opacity: 0,
        ease: "power1.inOut",
        immediateRender: true,
    }, "-=1");
    tl.to("#s_icones", {
        duration: 2,
        opacity: 0,
        ease: "power1.inOut",
        immediateRender: true,
    }, "-=2");
    tl.to("#trait_notilac", {
        duration: 1,
        opacity: 1,
        ease: "power1.inOut",
        immediateRender: true,
    }, "-=0.5");
    tl.to("#notilac_shem", {
        duration: 0.5,
        opacity: 1,
        ease: "power1.inOut",
        immediateRender: true,
    });
    tl.play();
}

export { launchIntro }