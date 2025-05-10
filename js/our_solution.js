
window.addEventListener('scroll', () => {
    const hero = document.querySelector('.innovation_hero_bg');
    if (window.scrollY > 100) {
        hero.classList.add('full-width');
    } else {
        hero.classList.remove('full-width');
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


window.addEventListener('DOMContentLoaded', () => {
    const rawSections = [
        {
            header: document.getElementById('toggleText5'),
            content: document.getElementById('content5'),
            image: document.getElementById('image5')
        },
        {
            header: document.getElementById('toggleText6'),
            content: document.getElementById('content6'),
            image: document.getElementById('image6')
        },
        {
            header: document.getElementById('toggleText7'),
            content: document.getElementById('content7'),
            image: document.getElementById('image7')
        },
        {
            header: document.getElementById('toggleText8'),
            content: document.getElementById('content8'),
            image: document.getElementById('image8')
        }
    ];

    // Filter out any sections where an element is missing
    const sections = rawSections.filter(
        s => s.header && s.content && s.image
    );

    if (sections.length === 0) return; // nothing to initialize

    let currentIndex = 0;

    function closeAll() {
        sections.forEach(({ content, image, header }) => {
            if (content.classList.contains('open')) {
                content.style.height = content.scrollHeight + 'px';
                requestAnimationFrame(() => {
                    content.style.height = '0px';
                    content.style.opacity = 0;
                });
                content.addEventListener('transitionend', function handler() {
                    content.classList.remove('open');
                    content.style.height = '';
                    content.style.opacity = '';
                    content.removeEventListener('transitionend', handler);
                });
            }

            image.classList.remove('visible');
            header.classList.remove('active');
        });
    }

    function openSection(index) {
        closeAll();

        const { content, image, header } = sections[index];
        content.classList.add('open');
        content.style.height = 'auto';
        const fullHeight = content.scrollHeight + 'px';
        content.style.height = '0px';
        content.style.opacity = 0;

        requestAnimationFrame(() => {
            content.style.height = fullHeight;
            content.style.opacity = 1;
        });

        image.classList.add('visible');
        header.classList.add('active');
        currentIndex = index;
    }

    function autoplaySections() {
        const nextIndex = (currentIndex + 1) % sections.length;
        openSection(nextIndex);
    }

    // Initial open
    openSection(0);

    // Click listeners
    sections.forEach((section, index) => {
        section.header.addEventListener('click', () => {
            if (!section.content.classList.contains('open')) {
                openSection(index);
            }
        });
    });

    // Start autoplay
    // setInterval(autoplaySections, 4000);
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




document.addEventListener("DOMContentLoaded", function () {
    const left = document.querySelector(".left_innovation");
    const right = document.querySelector(".right_inno_text");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animate-visible");
            } else {
                entry.target.classList.remove("animate-visible");
            }
        });
    }, { threshold: 0.2 });

    left.classList.add("animate-left");
    right.classList.add("animate-right");

    observer.observe(left);
    observer.observe(right);
});



document.addEventListener("DOMContentLoaded", function () {
    const boxes = document.querySelectorAll(".solution_box");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const left = entry.target.querySelector(".Left_solution_area");
            const right = entry.target.querySelector(".Right_solution_area");

            if (entry.isIntersecting) {
                left.classList.add("animate-visible");
                right.classList.add("animate-visible");
            } else {
                left.classList.remove("animate-visible");
                right.classList.remove("animate-visible");
            }
        });
    }, { threshold: 0.2 });

    boxes.forEach(box => {
        const left = box.querySelector(".Left_solution_area");
        const right = box.querySelector(".Right_solution_area");

        left.classList.add("animate-left");
        right.classList.add("animate-right");

        observer.observe(box);
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const section = document.querySelector('.why-essar-enery-section');

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                observer.unobserve(entry.target); // Trigger only once
            }
        });
    }, { threshold: 0.1 });

    if (section) {
        observer.observe(section);
    }
});