window.addEventListener('scroll', () => {
    const hero = document.querySelector('.innovation_hero_bg');
    if (window.scrollY > 100) {
        hero.classList.add('full-width');
    } else {
        hero.classList.remove('full-width');
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".animate-on-scroll");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target); // only animate once
            }
        });
    }, { threshold: 0.2 });

    elements.forEach((el) => observer.observe(el));
});



gsap.set(".inner_industries_container img", {
    scale: 2.5
});

gsap.to(".inner_industries_container img", {
    scale: 1,
    duration: 10,
    ease: "power2.inOut", // Smooth easing
    scrollTrigger: {
        trigger: ".inner_industries_container",
        start: "top 55%",
        end: "top 85%",
        pin: ".inner_industries_container",
        scrub: 8.5
    }
});



gsap.set(".inner_geographics img", {
    scale: 2.5
});

gsap.to(".inner_geographics img", {
    scale: 1,
    duration: 10,
    ease: "power2.inOut", // Smooth easing
    scrollTrigger: {
        trigger: ".inner_geographics",
        start: "top 55%",
        end: "top 85%",
        pin: ".inner_geographics",
        scrub: 8.5
    }
});



// Initialize a new Lenis instance for smooth scrolling
const lenis = new Lenis();

// Synchronize Lenis scrolling with GSAP's ScrollTrigger plugin
lenis.on('scroll', ScrollTrigger.update);

// Add Lenis's requestAnimationFrame (raf) method to GSAP's ticker
// This ensures Lenis's smooth scroll animation updates on each GSAP tick
gsap.ticker.add((time) => {
    lenis.raf(time * 1000); // Convert time from seconds to milliseconds
});

// Disable lag smoothing in GSAP to prevent any delay in scroll animations
gsap.ticker.lagSmoothing(0);