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
            end: () => `+=${items2.length * 150}%`,
            scrub: 1,
            invalidateOnRefresh: true
            // markers: true,
        },
        defaults: { ease: "none" }
    });
    items2.forEach((item, index) => {
        timeline.to(item, {
            scale: 0.9,
            borderRadius: "10px"
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

const openPopupButtons = document.querySelectorAll('.open-popup');
const closePopupButtons = document.querySelectorAll('.close-popup');
const popups = document.querySelectorAll('.popup');

// Function to open a popup
openPopupButtons.forEach(button => {
    button.addEventListener('click', () => {
        const targetId = button.getAttribute('data-target');
        const targetPopup = document.getElementById(targetId);
        targetPopup.style.display = 'flex';
        const popupContent = targetPopup.querySelector('.popup-content');
        popupContent.classList.remove('hides'); // Ensure it's not in the slide-down state
    });
});

// Function to close a popup with slide-down animation
closePopupButtons.forEach(button => {
    button.addEventListener('click', () => {
        const popup = button.closest('.popup');
        const popupContent = popup.querySelector('.popup-content');
        popupContent.classList.add('hides'); // Add the slide-down class
        setTimeout(() => {
            popup.style.display = 'none'; // Hide popup after animation
        }, 500); // Match the animation duration
    });
});

// Close popup when clicking outside the content
window.addEventListener('click', (event) => {
    popups.forEach(popup => {
        if (event.target === popup) {
            const popupContent = popup.querySelector('.popup-content');
            popupContent.classList.add('hides');
            setTimeout(() => {
                popup.style.display = 'none';
            }, 500);
        }
    });
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