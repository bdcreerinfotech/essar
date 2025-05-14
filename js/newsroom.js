jQuery(document).ready(function ($) {
  // Tab switching
  const buttons = document.querySelectorAll('.tab-button');
  const sections = document.querySelectorAll('.content-section');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      buttons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');

      const targetId = button.dataset.target;
      sections.forEach(section => {
        section.classList.toggle('active', section.id === targetId);
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

  window.closeVideo = function () {
    document.getElementById('videoFrame').src = '';
    document.getElementById('videoModal').style.display = 'none';
  };

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

  initAnimateObserver?.();
  initCardObserver?.();

  // Infinite Scroll
  let loading = false;

  let loadedIds = newsroom_vars.loaded_ids || {
    post: [],
    video: [],
    download: []
  };

  $(window).on('scroll', function () {
    const activeSection = document.querySelector('.content-section.active');
    if (!activeSection) return;

    let postType = activeSection.getAttribute('data-type');
    if (postType === 'news') postType = 'post';

    const currentPage = parseInt(activeSection.getAttribute('data-page'), 10);
    const maxPages = parseInt(activeSection.getAttribute('data-max'), 10);

    if (!loading && currentPage < maxPages) {
      const scrollTriggerPoint = activeSection.offsetTop + activeSection.offsetHeight - 100;

      if (window.scrollY + window.innerHeight > scrollTriggerPoint) {
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
            exclude_ids: loadedIds[postType] || []
          },
          success: function (response) {
            if (response.success && response.data.content) {
              const tempDiv = document.createElement('div');
              tempDiv.innerHTML = response.data.content;

              const newGrids = tempDiv.querySelectorAll('.grid');
              newGrids.forEach(grid => {
                activeSection.appendChild(grid);
                const newCard = grid.querySelector('.card');
                if (newCard) {
                  cardObserver?.observe(newCard);
                }
              });

              activeSection.setAttribute('data-page', currentPage + 1);

              if (!Array.isArray(loadedIds[postType])) {
                loadedIds[postType] = [];
              }

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

function closeVideo() {
  const modal = document.getElementById('videoModal');
  const iframe = document.getElementById('videoFrame');
  iframe.src = '';
  modal.style.display = 'none';
}

document.querySelectorAll('.video-link').forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    const videoUrl = this.getAttribute('data-video-url');
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('videoFrame');
    iframe.src = videoUrl + '?autoplay=1';
    modal.style.display = 'flex';
  });
});
