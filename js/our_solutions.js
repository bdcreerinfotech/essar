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





const firstAnchor = document.querySelector('a[href^="#"]');
if (firstAnchor) firstAnchor.classList.add('active');

const nav = document.querySelector('.solution_navigation');
const solutionSection = document.querySelector('.main-content');

window.addEventListener('scroll', () => {
  const offset = 250; // Adjust this for earlier/later fix point
  const rect = solutionSection.getBoundingClientRect();

  if (rect.top <= offset && rect.bottom > offset) {
    nav.classList.add('fixed');
    document.body.classList.add('solution-fixed');
  } else {
    nav.classList.remove('fixed');
    document.body.classList.remove('solution-fixed');
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




window.addEventListener('scroll', onScroll);
onScroll(); // Ensure active link is set correctly on page load