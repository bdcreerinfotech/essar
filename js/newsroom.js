// Tabs
const buttons = document.querySelectorAll('.tab-button');
const sections = document.querySelectorAll('.content-section');

buttons.forEach(button => {
  button.addEventListener('click', () => {
    buttons.forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');

    const targetId = button.dataset.target;

    sections.forEach(section => {
      if (section.id === targetId) {
        section.classList.add('active');
      } else {
        section.classList.remove('active');
      }
    });
  });
});

// Video Popup
document.querySelectorAll('.video-link').forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    const videoUrl = this.getAttribute('data-video-url');
    document.getElementById('videoFrame').src = videoUrl + '?autoplay=1';
    document.getElementById('videoModal').style.display = 'flex';
  });
});

function closeVideo() {
  document.getElementById('videoFrame').src = '';
  document.getElementById('videoModal').style.display = 'none';
}

// Animate on Scroll
let animateObserver;
function initAnimateObserver() {
  const elements = document.querySelectorAll('.animate-on-scroll');
  animateObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        animateObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  elements.forEach(el => animateObserver.observe(el));
}

// Animate Cards
let cardObserver;
function initCardObserver() {
  const cards = document.querySelectorAll('.card');

  cardObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        entry.target.style.transitionDelay = `${index * 100}ms`;
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.2 });

  cards.forEach(card => cardObserver.observe(card));
}

// Lenis + GSAP Scroll Smoothing
const lenis = new Lenis();
lenis.on('scroll', ScrollTrigger.update);
gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});
gsap.ticker.lagSmoothing(0);

// Infinite Scroll (appending .grid wrappers directly)
jQuery(document).ready(function ($) {
  initAnimateObserver?.();
  initCardObserver?.();

  let loading = false;

  let loadedIds = {
    post: typeof alreadyLoadedNewsIDs !== 'undefined' ? alreadyLoadedNewsIDs : [],
    video: [],
    download: []
  };

  $(window).on('scroll', function () {
    const activeSection = document.querySelector('.content-section.active');
    if (!activeSection) return;

    const postType = activeSection.getAttribute('data-type');
    const currentPage = parseInt(activeSection.getAttribute('data-page'), 10);
    const maxPages = parseInt(activeSection.getAttribute('data-max'), 10);

    if (!loading && currentPage < maxPages) {
      if (window.scrollY + window.innerHeight > activeSection.offsetTop + activeSection.offsetHeight - 100) {
        loading = true;

        $.ajax({
          url: newsroom_vars.ajax_url,
          type: 'POST',
          dataType: 'json',
          data: {
            action: 'load_more_newsroom',
            nonce: newsroom_vars.nonce,
            page: currentPage + 1,
            post_type: postType,
            exclude_ids: loadedIds[postType]
          },
          success: function (response) {
            if (response.success && response.data.content) {
              const tempDiv = document.createElement('div');
              tempDiv.innerHTML = response.data.content;

              const newGrids = tempDiv.querySelectorAll('.grid');
              newGrids.forEach(grid => {
                if (activeSection) {
                  activeSection.appendChild(grid);

                  const newCard = grid.querySelector('.card');
                  if (newCard) {
                    cardObserver?.observe(newCard);
                  }
                }
              });

              activeSection.setAttribute('data-page', currentPage + 1);
              if (Array.isArray(response.data.new_ids)) {
                loadedIds[postType] = loadedIds[postType].concat(response.data.new_ids);
              }
            }
            loading = false;
          },
          error: function () {
            console.log('Error loading more posts.');
            loading = false;
          }
        });
      }
    }
  });
});
