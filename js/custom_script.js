ScrollTrigger.matchMedia({
  // Desktop
  "(min-width: 1025px)": function() {
    gsap.set(".scaleDown", {
      xPercent: -16.6,
      yPercent: 7.4,
      scale: 1.2
    });

    gsap.to(".scaleDown", {
      scale: 0.3753,
      ease: "power2.inOut",
      scrollTrigger: {
        trigger: ".container1",
        start: "top 45%",
        end: "top 85%",
        pin: ".container1",
        scrub: 2
      }
    });
  },

  // Tablet and below
  "(max-width: 1024px)": function() {
    gsap.set(".scaleDown", {
      xPercent: -13,
      yPercent: 0,
      scale: 1.1
    });

    gsap.to(".scaleDown", {
      scale: 0.2,
      ease: "power2.inOut",
      scrollTrigger: {
        trigger: ".container1",
        start: "top 50%",
        end: "top 90%",
        pin: ".container1",
        scrub: 2
      }
    });
  }
});



// gsap.set(".h-our-service-info-title img", {scale: 1.5});
// gsap.to(".h-our-service-info-title img", {scale: 1,duration:4, scrollTrigger: {
//   trigger: ".h-our-service-info-title",
//   start: "top 45%",
//   end: "top 85%",
//   pin: ".h-our-service-info-title",
//   scrub: 2.5 
// }})

gsap.set(".video-container video", {
  scale: 4.5
});

gsap.to(".video-container video", {
  scale: 0.75,
  duration: 4,
  ease: "power2.inOut", // Smooth ease for scroll-driven scale
  scrollTrigger: {
    trigger: ".video-container",
    start: "top 45%",
    end: "top 85%",
    pin: ".video-container",
    scrub: 8.5
  }
});
/* News section */
gsap.fromTo(".NR-section", 
  {
    opacity: 0,
    y: 100,
    rotateX: -45,
    transformPerspective: 1000,
  }, 
  {
    scrollTrigger: {
      trigger: ".NR-section",
      start: "top 80%",
      end: "top 30%",
      scrub: 2, // Set to true, 1, 2, etc. depending on how smooth/delayed you want
      toggleActions: "play none none reverse",
    },
    opacity: 1,
    y: 0,
    rotateX: 0,
    duration: 2,
    ease: "power2.out",
  }
);

gsap.fromTo(".h-our-service-section", 
  {
    opacity: 0,
    scale: 0.6,
    y: 100,
    transformPerspective: 1000,
    transformOrigin: "center center",
  }, 
  {
    scrollTrigger: {
      trigger: ".h-our-service-section",
      start: "top 85%",
      end: "top 40%",
      scrub: 1.5,
      toggleActions: "play none none reverse",
    },
    opacity: 1,
    scale: 1,
    y: 0,
    duration: 2,
    ease: "power4.out",
  }
);

gsap.fromTo(".EFE-video-area", 
  {
    opacity: 0,
    scale: 0.6,
    y: 100,
    transformPerspective: 1000,
    transformOrigin: "center center",
  }, 
  {
    scrollTrigger: {
      trigger: ".EFE-video-area",
      start: "top 85%",
      end: "top 40%",
      scrub: 1.5,
      toggleActions: "play none none reverse",
    },
    opacity: 1,
    scale: 1,
    y: 0,
    duration: 2,
    ease: "power4.out",
  }
);
gsap.fromTo(".Green-future-section", 
  {
    opacity: 0,
    scale: 0.6,
    y: 0,
    transformPerspective: 1000,
    transformOrigin: "center center",
  }, 
  {
    scrollTrigger: {
      trigger: ".Green-future-section",
      start: "top 85%",
      end: "top 40%",
      scrub: 1.5,
      toggleActions: "play none none reverse",
    },
    opacity: 1,
    scale: 1,
    y: 0,
    duration: 2,
    ease: "power4.out",
  }
);
gsap.fromTo(".footer-section", 
  {
    opacity: 0,
    scale: 0.6,
    y: 0,
    transformPerspective: 1000,
    transformOrigin: "center center",
  }, 
  {
    scrollTrigger: {
      trigger: ".footer-section",
      start: "top 85%",
      end: "top 40%",
      scrub: 1.5,
      toggleActions: "play none none reverse",
    },
    opacity: 1,
    scale: 1,
    y: 0,
    duration: 2,
    ease: "power4.out",
  }
);

gsap.fromTo("#homeSectionOne", 
  {
    opacity: 0,
    scale: 0.6,
    y: 0,
    transformPerspective: 1000,
    transformOrigin: "center center",
  }, 
  {
    scrollTrigger: {
      trigger: "#homeSectionOne",
      start: "top 85%",
      end: "top 40%",
      scrub: 4.5,
      toggleActions: "play none none reverse",
    },
    opacity: 1,
    scale: 1,
    y: 0,
    duration: 3.5,
    ease: "power4.out",
  }
);
/* News section */

gsap.set(".blog-img img", {
  scale: 2.5
});

gsap.to(".blog-img img", {
  scale: 1,
  duration: 10,
  ease: "power2.inOut", // Smooth easing
  scrollTrigger: {
    trigger: ".blog-img",
    start: "top 55%",
    end: "top 85%",
    pin: ".blog-img",
    scrub: 8.5
  }
});


gsap.to(".CB1 h3", {
  paddingTop: "155px",
  ease: "power1.out",
  scrollTrigger: {
    trigger: ".CB1",
    start: "top 40%",
    end: "top 20%", // longer scroll range
    scrub: 2 // slower, smoother follow
  }
});


gsap.to(".CB2 h3", {
  paddingTop: "110px",
  ease: "power1.out",
  scrollTrigger: {
    trigger: ".CB2",
    start: "top 40%",
    end: "top 20%", // longer scroll range
    scrub: 2 // slower, smoother follow
  }
});

gsap.to(".CB3 h3", {
  paddingTop: "62px",
  ease: "power1.out",
  scrollTrigger: {
    trigger: ".CB3",
    start: "top 40%",
    end: "top 20%", // longer scroll range
    scrub: 2 // slower, smoother follow
  }
});

gsap.to(".CB4 h3", {
  paddingTop: "30px",
  ease: "power1.out",
  scrollTrigger: {
    trigger: ".CB4",
    start: "top 40%",
    end: "top 20%", // longer scroll range
    scrub: 2 // slower, smoother follow
  }
});
  






    const items = document.querySelectorAll('.item');
    const center = document.getElementById('centerContent');
    let currentIndex = 0;

    function updateCenter(title, text, img) {
    center.innerHTML = `
        <div class="inner-center-area">
            <div class="icon">${img}</div>
            <h2>${title}</h2>
            <p>${text}</p>
        </div>
    `;
    }

    function setActive(index) {
    items.forEach((item, i) => {
        item.classList.toggle('active', i === index);
    });
    }

    // OnClick
    items.forEach((item, index) => {
    item.addEventListener('click', () => {
        const title = item.getAttribute('data-title');
        const text = item.getAttribute('data-text');
        const img = item.getAttribute('data-img');
        updateCenter(title, text, img);
        setActive(index);
        currentIndex = index;
    });
    });

    // Autoplay
    setInterval(() => {
    const item = items[currentIndex];
    const title = item.getAttribute('data-title');
    const text = item.getAttribute('data-text');
    const img = item.getAttribute('data-img');
    updateCenter(title, text, img);
    setActive(currentIndex);
    currentIndex = (currentIndex + 1) % items.length;
    }, 4000);



//  // Scroll to top
//   window.scrollTo(0, 0);

  // Animate loader out using GSAP
  gsap.to("#loader", {
    duration: 1,
    y: "-100%",
    ease: "power2.inOut",
    onComplete: () => {
      // Hide loader completely
      document.getElementById("loader").style.display = "none";

      // Show the main content
     //document.getElementById("content").style.visibility = "visible";
    }
  });

const header1 = document.getElementById('header1');

window.addEventListener('scroll', () => {
if (window.scrollY > 100) {
header1.classList.add('scrolled');
} else {
header1.classList.remove('scrolled');
}
});




//Home Page Banner Animation
const sectionTwoTL = gsap.timeline({
        scrollTrigger: {
            trigger: "#homeSectionTwo",
            toggleActions: "play none none none",
        },
        ease: Sine.easeNone,
    });
    sectionTwoTL.addLabel("start").from("#homeSectionTwo .bannertitle h2", {
        delay: 0.5,
        y: 20,
        ClipPath: "inset(100% 0% 0%)",
        ease: Sine.easeOut,
        opacity: 0,
        duration: 0.8,
        stagger: {
            amount: 0.2
        },
    }).from("#homeSectionTwo .bannertopslide .paragraph", {
        delay: -0.2,
        y: -40,
        duration: 0.8,
        opacity: 0,
        ease: Sine.easeOut,
        stagger: {
            amount: 0.2
        },
    }).from("#homeSectionTwo .bannertopslide .story-button ", {
        delay: -0.2,
        y: -40,
        duration: 0.8,
        opacity: 0,
        ease: Sine.easeOut,
        stagger: {
            amount: 0.2
        },
    }).addLabel("end");


        
    //Home About Section2 Animation
    const sectionOneTL = gsap.timeline({
        scrollTrigger: {
        trigger: "#homeSectionOne",
        toggleActions: "play none none none",
        },
        ease: Sine.easeNone,
    });
    sectionOneTL.addLabel("start").from("#homeSectionOne .bannertitle", {
        delay: 0.9,
        y: 10,
        ClipPath: "inset(0% 0% 100%)",
        ease: Sine.easeOut,
        opacity: 0,
        duration: 0.8,
        stagger: {
            amount: 0.2
        },
    }).from("#homeSectionOne .bannertitle .ab-paragraph", {
        delay: -0.1,
        ease: Sine.easeOut,
        scale: 1,
        duration: 0.8,
        stagger: {
            amount: 0.5
        },
    }).addLabel("end");


    //About Left logo Image Animation          
    let revealContainersLeft = document.querySelectorAll(".imagerevealLeft");

        revealContainersLeft.forEach((container) => {
        let image = container.querySelector("img");

        gsap.timeline({
            scrollTrigger: {
            trigger: container,
            toggleActions: "play none none reverse",
            }
        })
        .set(container, { autoAlpha: 1 })
        .from(container, {
            xPercent: 100, // container slides in from the left
            duration: 2.2,
            ease: "power3.out",
        })
        .from(image, {
            xPercent: -100, // image slides in from the right
            scale: 1.15,
            duration: 2.2,
            ease: "power3.out",
        }, "<");
        });


    //CHART TEXT ANIMATION
    const divThreeTL = gsap.timeline({
        scrollTrigger: {
            trigger: "#homeSectionThree",
            toggleActions: "play none none play",
        },
        ease: Sine.easeNone,
    });
    divThreeTL.addLabel("start").from("#homeSectionThree .count-box", {
        delay: 0.5,
        y: 20,
        ClipPath: "inset(0% 0% 100%)",
        ease: Sine.easeOut,
        opacity: 0,
        duration: 0.8,
        stagger: {
            amount: 0.2
        },
    }).from("#homeSectionThree .count-box .chart-txt", {
        delay: -0.6,
        y: 40,
        duration: 0.8,
        opacity: 0,
        ease: Sine.easeOut,
        stagger: {
            amount: 0.2
        },
    }).addLabel("end");
    


     //Why ESSAR Energy ANIMATION
     const sectionFourTL = gsap.timeline({
    scrollTrigger: {
        trigger: "#homeSectionFour",
        toggleActions: "play none none none",
    },
});

  /*   sectionFourTL
        .addLabel("start")
        .from("#homeSectionFour .WEF-title", {
            delay: 0.5,
            x: -40, // slide in from left
            clipPath: "inset(0% 100% 0% 0%)", // optional: animates from the left
            ease: "sine.out",
            opacity: 0,
            duration: 0.8,
            stagger: {
                amount: 0.2
            },
        })
        .from("#homeSectionFour .WEF-title h3", {
            delay: -0.6,
            x: -60, // deeper left slide
            duration: 0.8,
            opacity: 0,
            ease: "sine.out",
            stagger: {
                amount: 0.2
            },
        })
    .addLabel("end"); */
  






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






  const sections = [
    {
      header: document.getElementById('toggleText1'),
      content: document.getElementById('content1'),
      image: document.getElementById('image1')
    },
    {
      header: document.getElementById('toggleText2'),
      content: document.getElementById('content2'),
      image: document.getElementById('image2')
    },
    {
      header: document.getElementById('toggleText3'),
      content: document.getElementById('content3'),
      image: document.getElementById('image3')
    },
    {
      header: document.getElementById('toggleText4'),
      content: document.getElementById('content4'),
      image: document.getElementById('image4')
    }
  ];

  currentIndex = (currentIndex + 1) % sections.length;

  function closeAll() {
    sections.forEach(({ content, image, header }) => {
      content.classList.remove('open');
      image.classList.remove('visible');
      header.classList.remove('active');
    });
  }

  function openSection(index) {
    closeAll();
    sections[index].content.classList.add('open');
    sections[index].image.classList.add('visible');
    sections[index].header.classList.add('active');
    currentIndex = index; // Keep autoplay in sync
  }

  // Initial open on page load
  window.addEventListener('load', () => {
    openSection(0); // First section active
  });

  // Click listeners
  sections.forEach((section, index) => {
    section.header.addEventListener('click', () => {
      const isOpen = section.content.classList.contains('open');
      if (!isOpen) {
        openSection(index);
      } else {
        closeAll(); // Toggle close
      }
    });
  });

  // Autoplay logic
  function autoplaySections() {
    let nextIndex = (currentIndex + 0) % sections.length;
    openSection(nextIndex);
  }

  //setInterval(autoplaySections, 4000);