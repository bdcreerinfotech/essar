

// document.addEventListener("DOMContentLoaded", function () {
//     const sections = document.querySelectorAll('.fade-in-up');

//     const observer = new IntersectionObserver((entries, observer) => {
//       entries.forEach(entry => {
//         if (entry.isIntersecting) {
//           entry.target.classList.add('animate');
//           observer.unobserve(entry.target); // Only trigger once
//         }
//       });
//     }, { threshold: 0.1 });

//     sections.forEach(section => observer.observe(section));
//   });


// document.addEventListener("DOMContentLoaded", function () {
//   const el = document.querySelector('.industries_infomation_title');
//   const observer = new IntersectionObserver((entries, observer) => {
//     entries.forEach(entry => {
//       if (entry.isIntersecting) {
//         el.classList.add('animate');
//         observer.unobserve(el);
//       }
//     });
//   }, { threshold: 0.2 });

//   observer.observe(el);
// });



gsap.set(".TBG img", {
  scale: 1.2
});

gsap.to(".TBG img", {
  scale: 1,
  duration: 10,
  ease: "power2.inOut", // Smooth easing
  scrollTrigger: {
    trigger: ".TBG",
    start: "top 65%",
    end: "top 85%",
    pin: ".TBG",
    scrub: 8.5
  }
});

gsap.set(".TBG1 img", {
  scale: 1.2
});

gsap.to(".TBG1 img", {
  scale: 1,
  duration: 10,
  ease: "power2.inOut", // Smooth easing
  scrollTrigger: {
    trigger: ".TBG1",
    start: "top 55%",
    end: "top 85%",
    pin: ".TBG1",
    scrub: 8.5
  }
});


gsap.set(".TBG2 img", {
  scale: 1.2
});

gsap.to(".TBG2 img", {
  scale: 1,
  duration: 10,
  ease: "power2.inOut", // Smooth easing
  scrollTrigger: {
    trigger: ".TBG2",
    start: "top 55%",
    end: "top 85%",
    pin: ".TBG2",
    scrub: 8.5
  }
});


gsap.set(".TBG3 img", {
  scale: 1.2
});

gsap.to(".TBG3 img", {
  scale: 1,
  duration: 10,
  ease: "power2.inOut", // Smooth easing
  scrollTrigger: {
    trigger: ".TBG3",
    start: "top 55%",
    end: "top 85%",
    pin: ".TBG3",
    scrub: 8.5
  }
});

gsap.set(".TBG4 img", {
  scale: 1.2
});

gsap.to(".TBG4 img", {
  scale: 1,
  duration: 10,
  ease: "power2.inOut", // Smooth easing
  scrollTrigger: {
    trigger: ".TBG4",
    start: "top 55%",
    end: "top 85%",
    pin: ".TBG4",
    scrub: 8.5
  }
});


gsap.set(".TBG5 img", {
  scale: 1.2
});

gsap.to(".TBG5 img", {
  scale: 1,
  duration: 10,
  ease: "power2.inOut", // Smooth easing
  scrollTrigger: {
    trigger: ".TBG5",
    start: "top 55%",
    end: "top 85%",
    pin: ".TBG5",
    scrub: 8.5
  }
});


function smoothScrollTo(targetY, duration = 600) {
  const startY = window.pageYOffset;
  const distance = targetY - startY;
  const startTime = performance.now();

  function easeInOutQuad(t) {
    return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
  }

  function animateScroll(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const ease = easeInOutQuad(progress);
    window.scrollTo(0, startY + (distance * ease));

    if (progress < 1) {
      requestAnimationFrame(animateScroll);
    }
  }

  requestAnimationFrame(animateScroll);
}

const headerOffset = 100;

const anchors = document.querySelectorAll('a[href^="#"]');
let sections1 = [];

function updateSections() {
  sections1 = Array.from(anchors)
    .map(anchor => {
      const id = anchor.getAttribute('href').slice(1);
      const el = document.getElementById(id);
      return el ? { id, el, anchor } : null;
    })
    .filter(item => item !== null);
}


anchors.forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    const targetId = this.getAttribute('href').slice(1);
    const targetElement = document.getElementById(targetId);

    if (targetElement) {
      e.preventDefault();
      const elementY = targetElement.getBoundingClientRect().top + window.pageYOffset;
      const offsetY = elementY - headerOffset;

      smoothScrollTo(offsetY);

      anchors.forEach(link => link.classList.remove('active'));
      this.classList.add('active');
    }
  });
});

function onScroll() {
  const scrollPosition = window.scrollY + headerOffset + 1;

  let found = false;

  sections1.forEach(({ el, anchor }) => {
    const top = el.getBoundingClientRect().top + window.scrollY;
    const bottom = top + el.offsetHeight;

    if (scrollPosition >= top && scrollPosition < bottom) {
      anchors.forEach(link => link.classList.remove('active'));
      anchor.classList.add('active');
      found = true;
    }
  });

  // Edge case for bottom
  if (!found && (window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    const last = sections1[sections1.length - 1];
    anchors.forEach(link => link.classList.remove('active'));
    last.anchor.classList.add('active');
  }
}




const nav = document.querySelector('.solution_navigation');
const solutionSection = document.querySelector('.main-content');

window.addEventListener('scroll', () => {
  const offset = 250;
  const rect = solutionSection.getBoundingClientRect();

  if (rect.top <= offset && rect.bottom > offset) {
    nav.classList.add('fixed');
  } else {
    nav.classList.remove('fixed');
  }
});



// Watch for when nav becomes fixed, then trigger onScroll
let navWasFixed = false;

window.addEventListener('scroll', () => {
  const offset = 250;
  const rect = solutionSection.getBoundingClientRect();
  const nowFixed = rect.top <= offset && rect.bottom > offset;

  if (nowFixed) {
    nav.classList.add('fixed');
    document.body.classList.add('solution-fixed');

    if (!navWasFixed) {
      updateSections();  // ← recalculate section positions now
      onScroll();        // ← trigger scroll check now
      navWasFixed = true;
    }
  } else {
    nav.classList.remove('fixed');
    document.body.classList.remove('solution-fixed');
    navWasFixed = false;
  }

  onScroll(); // keep active link in sync
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


AOS.init({
  duration: 1200,
})

window.addEventListener('scroll', onScroll);
onScroll(); // Ensure active link is set correctly on page load