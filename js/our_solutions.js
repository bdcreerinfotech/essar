// Make ScrollTrigger available for use in GSAP animations
gsap.registerPlugin(ScrollTrigger);

// Select the HTML elements needed for the animation
const scrollSection = document.querySelectorAll(".scroll-section");

scrollSection.forEach((section) => {
  const wrapper = section.querySelector(".wrapper");
  const items2 = wrapper.querySelectorAll(".item_saf");

  // Initialize
  let direction = null;

  if (section.classList.contains("vertical-section")) {
    direction = "vertical";
  } else if (section.classList.contains("horizontal-section")) {
    direction = "horizontal";
  }

  initScroll(section, items2, direction);
});

function initScroll(section, items2, direction) {
  // Initial states
  items2.forEach((item, index) => {
    if (index !== 0) {
      direction == "horizontal"
        ? gsap.set(item, { xPercent: 100 })
        : gsap.set(item, { yPercent: 100 });
    }
  });

  const timeline = gsap.timeline({
    scrollTrigger: {
      trigger: section,
      pin: true,
      start: "top top",
      end: () => `+=${items2.length * 100}%`,
      scrub: 1,
      invalidateOnRefresh: true
      // markers: true,
    },
    defaults: { ease: "none" }
  });
  items2.forEach((item, index) => {
    timeline.to(item, {
      scale: 0.9,
      borderRadius: "30px"
    });

    direction == "horizontal"
      ? timeline.to(
        items2[index + 1],
        {
          xPercent: 0
        },
        "<"
      )
      : timeline.to(
        items2[index + 1],
        {
          yPercent: 0
        },
        "<"
      );
  });
}


window.addEventListener("scroll", function () {
  const verticalSection = document.querySelector(".vertical-section");
  const headerSection = document.querySelector(".headersection");

  const verticalSectionTop = verticalSection.getBoundingClientRect().top;

  // Add class to .headersection when .vertical-section is at the top
  if (verticalSectionTop === 0) {
    headerSection.classList.add("hide");
  } else {
    headerSection.classList.remove("hide");
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

document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll(".card");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        // Optional: Add stagger delay
        entry.target.style.transitionDelay = `${index * 100}ms`;
        entry.target.classList.add("visible");
      } else {
        entry.target.classList.remove("visible"); // Remove for re-trigger on scroll
      }
    });
  }, {
    threshold: 0.2
  });

  cards.forEach(card => observer.observe(card));
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
